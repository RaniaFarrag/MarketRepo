<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\FnrcoQuotationRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyNeed;
use App\Models\Country;
use App\Models\FnrcoQuotation;
use App\Models\FnrcoQuotationRequest;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use function GuzzleHttp\Promise\all;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;



class FnrcoQuotationRepository implements FnrcoQuotationRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $fnrco_quotation_model;

    public function __construct(FnrcoQuotation $fnrcoQuotation)
    {
        $this->fnrco_quotation_model = $fnrcoQuotation;
    }


     /** View All FnrcoQuotations */
     public function index($company_id , $mother_company_id){
        return $this->fnrco_quotation_model::where('company_id' , $company_id)
            ->with(['company' , 'fnrcoQuotationsRequest'])->paginate(20);
    }


    /** Store FnrcoQuotation */
    public function store($request)
    {
        $validated = $request->validate([
            'Contract_period' => 'required',
            'Quotation_No' => 'required',
            'item.*.category' => 'required',
        ]);

        $fnrco_Quotation = $this->fnrco_quotation_model::create([
            'ref_no' => $request->ref_no,
            'attn' => $request->attn,
            'telephone' => $request->telephone,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'Quotation_No' => $request->Quotation_No,
            'Contract_period' => $request->Contract_period,
            'saudization' => $request->saudization,
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($request->item as $item) {
            $fnrco_Quotation->fnrcoQuotationsRequest()->create([
                'category' => $item['category'],
                'quantity' => $item['quantity'],
                'nationality' => $item['nationality'],
                'salary' => $item['salary'],
                'Food_allowance' => $item['Food_allowance'],
                'Fnrco_charge' => $item['Fnrco_charge'],
                'iqama_visa' => $item['iqama_visa'],
                'admin_fees' => $item['admin_fees'],
                'value_per_employee_month' => $item['value_per_employee_month'],
                'total_value_per_month' => $item['total_value_per_month'],
                'fnrco_quotation_id' => $fnrco_Quotation->id,
            ]);
        }
        
        $this->addLog(auth()->id() , $fnrco_Quotation->id , 'FnrcoQuotation' , 'تم اضافة عرض اسعار لشركة فناركو ' , 'New Fnrco Quotation has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('companyQuotation.index' , [$request->company_id , $request->mother_company_id]));
    }


    /** Submit Edit CompanyQuotation */
    public function update($request , $fnrco_quotation){
        $validated = $request->validate([
            'Contract_period' => 'required',
            'Quotation_No' => 'required',
            'item.*.category' => 'required',
        ]);
        $fnrco_quotation->update([
            'ref_no' => $request->ref_no,
            'attn' => $request->attn,
            'telephone' => $request->telephone,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'Quotation_No' => $request->Quotation_No,
            'Contract_period' => $request->Contract_period,
            'saudization' => $fnrco_quotation->saudization,
            'company_id' => $fnrco_quotation->company_id,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($request->item as $item) {
            FnrcoQuotationRequest::updateOrCreate(
                ['fnrco_quotation_requests.id' => $item['request_id']],
                [
                    'category' => $item['category'],
                    'quantity' => $item['quantity'],
                    'nationality' => $item['nationality'],
                    'salary' => $item['salary'],
                    'Food_allowance' => $item['Food_allowance'],
                    'Fnrco_charge' => $item['Fnrco_charge'],
                    'iqama_visa' => $item['iqama_visa'],
                    'admin_fees' => $item['admin_fees'],
                    'value_per_employee_month' => $item['value_per_employee_month'],
                    'total_value_per_month' => $item['total_value_per_month'],
                    'fnrco_quotation_id' => $fnrco_quotation->id,    
                ]
            );
        }

        $this->addLog(auth()->id() , $fnrco_quotation->id , 'FnrcoQuotation' , 'تم تعديل عرض اسعار لشركة فناركو ' , 'New Fnrco Quotation has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('companyQuotation.index' , [$fnrco_quotation->company_id , $request->mother_company_id]));

    }


    /** Delete CompanyNeed */
    public function destroy($quotation_id , $mother_company_id){
        Alert::success('warning', trans('dashboard.Are You Sure ?'));
        $fnrco_quotation = $this->fnrco_quotation_model::findOrFail($quotation_id);
        $fnrco_quotation->delete();
        $fnrco_quotation->FnrcoQuotationsRequest()->delete();
        $fnrco_quotation->fnrcoAgreement()->delete();

        $this->addLog(auth()->id() , $fnrco_quotation->id , 'FnrcoQuotation' , 'تم حذف عرض اسعار لشركة فناركو ' , 'Fnrco Quotation has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('companyQuotation.index' , [$fnrco_quotation->company_id , $mother_company_id]));
    }

}
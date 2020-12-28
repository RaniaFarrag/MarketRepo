<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\LinrcoQuotationRepositoryInterface;
use App\Models\Company;
use App\Models\CompanyNeed;
use App\Models\Country;
use App\Models\LinrcoQuotation;
use App\Models\LinrcoQuotationRequest;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;



class LinrcoQuotationRepository implements LinrcoQuotationRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $linrco_Quotation_model;

    public function __construct(LinrcoQuotation $linrcoQuotation)
    {  
        $this->linrco_Quotation_model = $linrcoQuotation;
    }


    /** View All CompanyQuotations */
    public function index($company_id , $mother_company_id){
        return $this->linrco_Quotation_model::where('company_id' , $company_id)
            ->with(['company' , 'linrcoQuotationsRequest'])->paginate(20);
    }


    /** Store CompanyQuotation */
    public function store($request)
    {
        $validated = $request->validate([
            'Quotation_No' => 'required',
        ]);
        $linrco_Quotation = $this->linrco_Quotation_model::create([
            'ref_no' => $request->ref_no,
            'attn' => $request->attn,
            'telephone' => $request->telephone,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'Quotation_No' => $request->Quotation_No,
            'saudization' => $request->saudization,
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($request->item as $item) {
            $linrco_Quotation->linrcoQuotationsRequest()->create([
                'trade' => $item['trade'],
                'gender' => $item['gender'],
                'educational_qualification' => $item['educational_qualification'],
                'quantity' => $item['quantity'],
                'nationality' => $item['nationality'],
                'salary' => $item['salary'],
                'RECRUITMENT_CHARGES_PER_CANDIDATE' => $item['RECRUITMENT_CHARGES_PER_CANDIDATE'],
                'VISA_PROCESSING_CHARGES_PER_CANDIDATE' => $item['VISA_PROCESSING_CHARGES_PER_CANDIDATE'],
            ]);
        }
        
        $this->addLog(auth()->id() , $linrco_Quotation->id , 'LinrcoQuotation' , 'تم اضافة عرض اسعار شركة ' , 'New Linrco Quotation has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('companyQuotation.index' , [$request->company_id , $request->mother_company_id]));
    }


    /** Submit Edit CompanyQuotation */
    public function update($request , $linrco_quotation){
        $validated = $request->validate([
            'Quotation_No' => 'required',
        ]);
        $linrco_quotation->update([
            'ref_no' => $request->ref_no,
            'attn' => $request->attn,
            'telephone' => $request->telephone,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'Quotation_No' => $request->Quotation_No,
            'saudization' => $request->saudization,
            'company_id' => $linrco_quotation->company_id,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($request->item as $item) {
            // dd($linrco_quotation->id);
            LinrcoQuotationRequest::updateOrCreate(
                ['linrco_quotation_requests.id' => $item['request_id']],
                [
                    'linrco_quotation_id' => $linrco_quotation->id,
                    'trade' => $item['trade'],
                    'gender' => $item['gender'],
                    'educational_qualification' => $item['educational_qualification'],
                    'quantity' => $item['quantity'],
                    'nationality' => $item['nationality'],
                    'salary' => $item['salary'],
                    'RECRUITMENT_CHARGES_PER_CANDIDATE' => $item['RECRUITMENT_CHARGES_PER_CANDIDATE'],
                    'VISA_PROCESSING_CHARGES_PER_CANDIDATE' => $item['VISA_PROCESSING_CHARGES_PER_CANDIDATE'],                    
                ]
            );
        }

        $this->addLog(auth()->id() , $linrco_quotation->id , 'LinrcoQuotation' , 'تم تعديل عرض اسعار شركة ' , 'New Linrco Quotation has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('companyQuotation.index' , [$linrco_quotation->company_id , $request->mother_company_id]));

    }


    /** Delete CompanyNeed */
    public function destroy($quotation_id , $mother_company_id){
        Alert::success('warning', trans('dashboard.Are You Sure ?'));
        $linrco_quotation = $this->linrco_Quotation_model::findOrFail($quotation_id);
        $linrco_quotation->delete();
        $linrco_quotation->linrcoQuotationsRequest()->delete();

        $this->addLog(auth()->id() , $linrco_quotation->id , 'company_needs' , 'تم حذف عرض اسعار لشركة ليناركو ' , 'Linrco Quotation has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('companyQuotation.index' , [$linrco_quotation->company_id , $mother_company_id]));
    }

}
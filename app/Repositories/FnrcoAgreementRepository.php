<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\FnrcoAgreementRepositoryInterface;
use App\Models\FnrcoAgreement;
use App\Models\FnrcoQuotation;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use function GuzzleHttp\Promise\all;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class FnrcoAgreementRepository implements FnrcoAgreementRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $fnrco_Quotation_model;
    protected $fnrco_Agreement_model;

    public function __construct(FnrcoQuotation $fnrcoQuotation , FnrcoAgreement $fnrcoAgreement)
    {  
        $this->fnrco_Quotation_model = $fnrcoQuotation;
        $this->fnrco_Agreement_model = $fnrcoAgreement;
    }

    /** View All Agreements Of Company */
    public function index($company_id , $mother_company_id){
        return $this->fnrco_Agreement_model::where('company_id' , $company_id)->with('fnrcoQuotation')->paginate(20);
    }

    public function update($request , $fnrco_agreement){
        //dd($fnrco_agreement);
        $fnrco_agreement->update([
//           'fnrco_quotation_id' => $fnrco_agreement->fnrco_quotation_id,
//           'company_id' => $fnrco_agreement->company_id,
//           'user_id' => $fnrco_agreement->fnrco_quotation_id,
           'cr_date' => $request->cr_date,
           'hr_system' => $request->hr_system,
           'signing_by' => $request->signing_by,
           'by_as' => $request->by_as,
           'address_en' => $request->address_en,
           'address_ar' => $request->address_ar,
           'phone' => $request->phone,
           'fax' => $request->fax,
           'mailing_address' => $request->mailing_address,
           'postal_code' => $request->postal_code,
        ]);

        $this->addLog(auth()->id() , $fnrco_agreement->id , 'FnrcoAgreement' , 'تم تعديل عقد توظيف لشركة فناركو ' , 'Fnrco Agreement has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('openFnrcoAgreement' , [$fnrco_agreement->id]));
    }

    // Save Agreement Of Quotation
    public function convertFnrcoquotationToAgreement($quotation_id){

        $quotation = $this->fnrco_Quotation_model::findOrFail($quotation_id);

        return $this->fnrco_Agreement_model::create([
           'fnrco_quotation_id' =>$quotation_id,
           'company_id' =>$quotation->company_id,
           'user_id' =>Auth::user()->id,
        ]);
    }

    public function destroy($fnrco_agreement, $mother_company_id)
    {
        $fnrco_agreement->delete();

        $this->addLog(auth()->id() , $fnrco_agreement->id , 'FnrcoAgreement' , 'تم حذف عقد توظيف لشركة فناركو ' , 'Fnrco Agreement has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('companyQuotation.index' , [$fnrco_agreement->company_id , $mother_company_id]));
    }

}
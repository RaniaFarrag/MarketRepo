<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\LinrcoAgreementRepositoryInterface;
use App\Models\LinrcoAgreement;
use App\Models\LinrcoQuotationRequest;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use function GuzzleHttp\Promise\all;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class LinrcoAgreementRepository implements LinrcoAgreementRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $linrco_Agreement_model;

    public function __construct(LinrcoAgreement $linrcoAgreement)
    {  
        $this->linrco_Agreement_model = $linrcoAgreement;
    }


    /** View All LinrcoAgreements */
    public function index($company_id , $mother_company_id){
        return $this->linrco_Agreement_model::where('company_id' , $company_id)->paginate(20);
    }


    /** Store LinrcoAgreement */
    public function store($request)
    {
        $linrco_Agreement_model = $this->linrco_Agreement_model::create([
            'date' => $request->date,
            'cr' => $request->cr,
            'company_address' => $request->company_address,
            'phone' => $request->phone,
            'mail_box' => $request->mail_box,
            'postal_code' => $request->postal_code,
            'email' => $request->email,
            'company_representative' => $request->company_representative,
//            'position' => $request->position,
//            'duration_of_commitment' => $request->duration_of_commitment,
//            'payment_of_fees' => $request->payment_of_fees,
//            'service_implementation_fee' => $request->service_implementation_fee,
//            'the_notice_period' => $request->the_notice_period,
            'data_flow' => $request->data_flow,

            'healthcare_fee_ar' => $request->healthcare_fee_ar,
            'healthcare_visa_fee_ar' => $request->healthcare_visa_fee_ar,
            'healthcare_fee_en' => $request->healthcare_fee_en,
            'healthcare_visa_fee_en' => $request->healthcare_visa_fee_en,

            'whitecollar_fee_ar' => $request->whitecollar_fee_ar,
            'whitecollar_visa_fee_ar' => $request->whitecollar_visa_fee_ar,
            'whitecollar_fee_en' => $request->whitecollar_fee_en,
            'whitecollar_visa_fee_en' => $request->whitecollar_visa_fee_en,

            'bluecollar_fee_ar' => $request->bluecollar_fee_ar,
            'bluecollar_visa_fee_ar' => $request->bluecollar_visa_fee_ar,
            'bluecollar_fee_en' => $request->bluecollar_fee_en,
            'bluecollar_visa_fee_en' => $request->bluecollar_visa_fee_en,

            'labor_fee_ar' => $request->labor_fee_ar,
            'labor_visa_fee_ar' => $request->labor_visa_fee_ar,
            'labor_fee_en' => $request->labor_fee_en,
            'labor_visa_fee_en' => $request->labor_visa_fee_en,

            'referred_candidates_fee_ar' => $request->referred_candidates_fee_ar,
            'referred_candidates_visa_fee_ar' => $request->referred_candidates_visa_fee_ar,
            'referred_candidates_fee_en' => $request->referred_candidates_fee_en,
            'referred_candidates_visa_fee_en' => $request->referred_candidates_visa_fee_en,

            'linrco_email' => $request->linrco_email,
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
        ]);

        
        $this->addLog(auth()->id() , $linrco_Agreement_model->id , 'LinrcoAgreement' , 'تم اضافة عقد توظيف لشركة ليناركو ' , 'New Linrco Agreement has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('CompanyAgreement.index' , [$request->company_id , $request->mother_company_id]));
    }


    /** Submit Edit LinrcoAgreement */
    public function update($request , $linrcoAgreement){

        $linrcoAgreement->update([
            'date' => $request->date,
            //'company_name' => $request->company_name,
            'cr' => $request->cr,
            'company_address' => $request->company_address,
            'phone' => $request->phone,
            'mail_box' => $request->mail_box,
            'postal_code' => $request->postal_code,
            'email' => $request->email,
            'company_representative' => $request->company_representative,
//            'position' => $request->position,
//            'duration_of_commitment' => $request->duration_of_commitment,
//            'payment_of_fees' => $request->payment_of_fees,
//            'service_implementation_fee' => $request->service_implementation_fee,
//            'the_notice_period' => $request->the_notice_period,
            'data_flow' => $request->data_flow,

            'healthcare_fee_ar' => $request->healthcare_fee_ar,
            'healthcare_visa_fee_ar' => $request->healthcare_visa_fee_ar,
            'healthcare_fee_en' => $request->healthcare_fee_en,
            'healthcare_visa_fee_en' => $request->healthcare_visa_fee_en,

            'whitecollar_fee_ar' => $request->whitecollar_fee_ar,
            'whitecollar_visa_fee_ar' => $request->whitecollar_visa_fee_ar,
            'whitecollar_fee_en' => $request->whitecollar_fee_en,
            'whitecollar_visa_fee_en' => $request->whitecollar_visa_fee_en,

            'bluecollar_fee_ar' => $request->bluecollar_fee_ar,
            'bluecollar_visa_fee_ar' => $request->bluecollar_visa_fee_ar,
            'bluecollar_fee_en' => $request->bluecollar_fee_en,
            'bluecollar_visa_fee_en' => $request->bluecollar_visa_fee_en,

            'labor_fee_ar' => $request->labor_fee_ar,
            'labor_visa_fee_ar' => $request->labor_visa_fee_ar,
            'labor_fee_en' => $request->labor_fee_en,
            'labor_visa_fee_en' => $request->labor_visa_fee_en,

            'referred_candidates_fee_ar' => $request->referred_candidates_fee_ar,
            'referred_candidates_visa_fee_ar' => $request->referred_candidates_visa_fee_ar,
            'referred_candidates_fee_en' => $request->referred_candidates_fee_en,
            'referred_candidates_visa_fee_en' => $request->referred_candidates_visa_fee_en,

            'linrco_email' => $request->linrco_email,
            'company_id' => $linrcoAgreement->company_id,
            'user_id' => Auth::user()->id,
        ]);

        $this->addLog(auth()->id() , $linrcoAgreement->id , 'LinrcoAgreement' , 'تم تعديل عقد توظيف لشركة ليناركو ' , 'Linrco Agreement has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('CompanyAgreement.index' , [$linrcoAgreement->company_id , $request->mother_company_id]));
    }


    /** Delete LinrcoAgreement */
    public function destroy($linrcoAgreement , $mother_company_id){

        $linrcoAgreement->delete();

        $this->addLog(auth()->id() , $linrcoAgreement->id , 'LinrcoAgreement' , 'تم حذف عقد توظيف لشركة ليناركو ' , 'Linrco Agreement has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('CompanyAgreement.index' , [$linrcoAgreement->company_id , $mother_company_id]));
    }

}
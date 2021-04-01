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
use App\Models\FnrcoFlatRedAgreement;
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
        $data = [];
        $data['agreement_readyman_power'] = $this->fnrco_Agreement_model::where('company_id' , $company_id)->with('fnrcoQuotation')->paginate(10);
        $data['agreement_flatRed'] = FnrcoFlatRedAgreement::where('company_id' , $company_id)->with('fnrcoFlatRedQuotation')->get();
        return $data;
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

           'mol' => $request->mol,
           'location' => $request->location,
           'agreement_num' => $request->agreement_num,
           'agreement_issue_date' => $request->agreement_issue_date,
           'agreement_expiry_date' => $request->agreement_expiry_date,

           'work_hours' => $request->work_hours,
           'work_hours_ar' => $request->work_hours_ar,

           'work_days' => $request->work_days,
           'work_days_en' => $request->work_days_en,

           'work_hours_weekly' => $request->work_hours_weekly,
           'work_hours_weekly_ar' => $request->work_hours_weekly_ar,

           'first_party' => $request->first_party,
           'first_party_en' => $request->first_party_en,

           'second_party' => $request->second_party,
           'second_party_en' => $request->second_party_en,
        ]);

        $this->addLog(auth()->id() , $fnrco_agreement->id , 'FnrcoAgreement' , 'تم تعديل عقد توظيف لشركة فناركو ' , 'Fnrco Agreement has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('openFnrcoAgreement' , [$fnrco_agreement->id]));
    }

    // Save Agreement Of Quotation
    public function convertFnrcoquotationToAgreement($quotation_id){

        $quotation = $this->fnrco_Quotation_model::findOrFail($quotation_id);

        return $this->fnrco_Agreement_model::create([
           'work_hours' =>8,
           'work_hours_ar' =>"ثمانية",
           'work_days' =>"ستة",
           'work_days_en' =>6,
           'work_hours_weekly' =>48,
           'work_hours_weekly_ar' =>"ثمانية و أربعون",
           'work_hours_weekly' =>48,
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

    /*********************************************FNRCO VISA FlatRed Agreements**********************************************/

    public function convertFnrcoFlatRedQuotationToAgreement($quotation){
        //dd($quotation->id);
        $flatred_agreement =  FnrcoFlatRedAgreement::create([
            'work_hours' =>8,
            'work_hours_ar' =>"ثمانية",
            'work_days' =>"ستة",
            'work_days_en' =>6,
            'work_hours_weekly' =>48,
            'work_hours_weekly_ar' =>"ثمانية و أربعون",
            'work_hours_weekly' =>48,
            'contract_validity' =>24,
            'contract_validity_ar' =>"عامان",
            'contract_validity_en' =>"2 years",

            'flatred_quotation_id' => $quotation->id,
            'company_id' => $quotation->company_id,
            'user_id' =>Auth::user()->id,
        ]);
        $notes = "1. Contracts Period : 24 Months.
2. Initial Mobilization Air Ticket by SECOND PARTY.
3. Vacation Pay &End of Service (EOSB) Will be settled by First Party before the departure of the candidate after receiving full Payment from the Second Party.
4. Any variation in the above End of Service rate will be adjusted as actual.
5. E-Wakala will be issued after receiving the deposit amount.
6. First Party will provide Iqama,Gosi(Basic + HRA), Medical Insurance, Payroll Fee & ATM Card, Vacation Pay, Final Exit Air ticket, EOSB & Exit Re-entry charges";

        $general_terms = "1. In case of split arrival of candidates, if the candidates arrive after 15th of month, their payroll will be settled by second party and will be adjusted in subsequent month.
2. Profession change shall be considered as per MOL regulations.";

        $recruitment_procedure = "1. Any certificate attestation (if required for the stamping of visa or as a legal obligation to stamp the visa) shall be borne by employee or by SECOND PARTY";

        $post_recruiment_procedure = "1. If the second party is main contractor or sub-contractor of a specific project, then SECOND Party shall provide a detailed report for which the expatriate labor are recruited.
2. Medical for Iqama shall be undertaken by SECOND PARTY from any CCHI approved clinics/hospitals. Such valid medical report to be submitted by SECOND PARTY within three (3) working days upon arrival of each employee.";

        $payment_default = "1. If the second party defaults in agreed payment terms, first party has the authority to demobilize all employees without any further notice.";

        $flatred_agreement->agreementFlatRedAnnexure()->create([
            'flatred_agreement_id' => $flatred_agreement->id,
            'notes' => json_encode(explode("\r\n" , $notes)),
            'general_terms' => json_encode(explode("\r\n" , $general_terms)),
            'recruitment_procedure' => json_encode(explode("\r\n" , $recruitment_procedure)),
            'post_recruiment_procedure' => json_encode(explode("\r\n" , $post_recruiment_procedure)),
            'payment_default' => json_encode(explode("\r\n" , $payment_default)),
        ]);
    }

    public function updateFlatRedAgreement($request , $flatred_agreement){
        $flatred_agreement->update([
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

            'mol' => $request->mol,
            'location' => $request->location,
            'agreement_num' => $request->agreement_num,
            'agreement_issue_date' => $request->agreement_issue_date,
            'agreement_expiry_date' => $request->agreement_expiry_date,

            'work_hours' => $request->work_hours,
            'work_hours_ar' => $request->work_hours_ar,

            'work_days' => $request->work_days,
            'work_days_en' => $request->work_days_en,

            'work_hours_weekly' => $request->work_hours_weekly,
            'work_hours_weekly_ar' => $request->work_hours_weekly_ar,

            'first_party' => $request->first_party,
            'first_party_en' => $request->first_party_en,

            'second_party' => $request->second_party,
            'second_party_en' => $request->second_party_en,
            'date' => $request->date,
        ]);

        $flatred_agreement->agreementFlatRedAnnexure()->update([
            //'flatred_agreement_id' => $flatred_agreement->id,
            'notes' => json_encode(explode("\r\n" , $request->notes)),
            'general_terms' => json_encode(explode("\r\n" , $request->general_terms)),
            'recruitment_procedure' => json_encode(explode("\r\n" , $request->recruitment_procedure)),
            'post_recruiment_procedure' => json_encode(explode("\r\n" , $request->post_recruiment_procedure)),
            'payment_default' => json_encode(explode("\r\n" , $request->payment_default)),

            'second_address' => $request->second_address,
            'second_location' => $request->second_location,

            'second_project_representative_name' => $request->second_project_representative_name,
            'second_project_representative_designation' => $request->second_project_representative_designation,
            'second_project_representative_contact_num' => $request->second_project_representative_contact_num,
            'second_project_representative_email' => $request->second_project_representative_email,

            'second_account_representative_name' => $request->second_project_representative_name,
            'second_account_representative_designation' => $request->second_account_representative_designation,
            'second_account_representative_contact_num' => $request->second_account_representative_contact_num,
            'second_account_representative_email' => $request->second_account_representative_email,

            'second_bank_name_beneficiary' => $request->second_bank_name_beneficiary,
            'second_bank_name' => $request->second_bank_name,
            'second_bank_branch' => $request->second_bank_branch,
            'second_bank_type_account' => $request->second_bank_type_account,
            'second_bank_account_num' => $request->second_bank_account_num,
            'second_bank_iban_num' => $request->second_bank_iban_num,

            'hr_name' => $request->hr_name,
            'hr_designation' => $request->hr_designation,
            'finance_name' => $request->finance_name,
            'finance_designation' => $request->finance_designation,
            'approved_by_name' => $request->approved_by_name,
            'approved_by_designation' => $request->approved_by_designation,
        ]);

        $this->addLog(auth()->id() , $flatred_agreement->id , 'FnrcoFlatRedAgreement' , 'تم تعديل عقد توظيف عمالة جاهزة لشركة فناركو ' , 'Fnrco FlatRed Agreement has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('open_FlatRedAgreement' , [$flatred_agreement->id]));

    }

    public function deleteflatRedAgreement($flatred_agreement , $mother_company_id){
        $flatred_agreement->delete();
        $flatred_agreement->agreementFlatRedAnnexure()->delete();

        $this->addLog(auth()->id() , $flatred_agreement->id , 'Fnrco FlatRedAgreement' , 'تم حذف عقد توظيف فيزا لشركة فناركو ' , 'Fnrco FlatRed Agreement has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('companyQuotation.index' , [$flatred_agreement->company_id , $mother_company_id]));
    }


}
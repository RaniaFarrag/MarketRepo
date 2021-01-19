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
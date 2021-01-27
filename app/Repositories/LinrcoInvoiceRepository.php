<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\LinrcoInvoiceRepositoryInterface;
use App\Models\LinrcoInvoice;
use App\Models\LinrcoInvoiceRequest;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use function GuzzleHttp\Promise\all;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class LinrcoInvoiceRepository implements LinrcoInvoiceRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $linrco_invoice_model;

    public function __construct(LinrcoInvoice $linrcoinvoice)
    {  
        $this->linrco_invoice_model = $linrcoinvoice;
    }


    /** View One LinrcoInvoive */
    public function index($agreement_id , $mother_company_id){
        return $this->linrco_invoice_model::where('linrco_agreement_id' , $agreement_id)->with('company' , 'user')->get();
    }


    /** Store LinrcoAgreement */
    public function store($request)
    {
        $linrco_invoice = $this->linrco_invoice_model::create([
            'date' => $request->date,
            'client_code' => $request->client_code,
            'agreement_no' => $request->agreement_no,
            'internal_contact' => $request->internal_contact,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'customer_vat_no' => $request->customer_vat_no,
            'linrco_agreement_id' => $request->linrco_agreement_id,
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($request->item as $item) {
            $linrco_invoice->LinrcoInvoiceRequest()->create([
                'particulars' => $item['particulars'],
                'recruitment_fee' => $item['recruitment_fee'],
                'visa_processing_fee' => $item['visa_processing_fee'],
                'total_before_tax' => $item['recruitment_fee'] + $item['visa_processing_fee'],
                'tax' => ($item['tax'] / 100) * ($item['recruitment_fee'] + $item['visa_processing_fee']),
                'total_amount_after_tax' => (($item['tax'] / 100) * ($item['recruitment_fee'] + $item['visa_processing_fee'])) +
                                            ($item['recruitment_fee'] + $item['visa_processing_fee']),
            ]);
        }

        $this->addLog(auth()->id() , $linrco_invoice->id , 'LinrcoInvoice' , 'تم اضافة فاتورة للعقد رقم  ' , 'New Linrco Voice for contract');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('companyInvoice.index' , [$request->linrco_agreement_id , $request->mother_company_id]));
    }


    /** Submit Edit LinrcoAgreement */
    public function update($request , $linrco_invoice){

        $linrco_invoice->update([
            'date' => $request->date,
            'client_code' => $request->client_code,
            'agreement_no' => $request->agreement_no,
            'internal_contact' => $request->internal_contact,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'customer_vat_no' => $request->customer_vat_no,
            'linrco_agreement_id' => $request->linrco_agreement_id,
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($request->item as $item) {
            $linrco_invoice->LinrcoInvoiceRequest()->updateOrCreate(
                ['linrco_invoice_requests.id' => $item['request_id']],
                [
                    'particulars' => $item['particulars'],
                    'recruitment_fee' => $item['recruitment_fee'],
                    'visa_processing_fee' => $item['visa_processing_fee'],
                    'total_before_tax' => $item['recruitment_fee'] + $item['visa_processing_fee'],
                    'tax' => ($item['tax'] / 100) * ($item['recruitment_fee'] + $item['visa_processing_fee']),
                    'total_amount_after_tax' => (($item['tax'] / 100) * ($item['recruitment_fee'] + $item['visa_processing_fee'])) +
                        ($item['recruitment_fee'] + $item['visa_processing_fee']),
                ]
            );
        }

        $this->addLog(auth()->id() , $linrco_invoice->id , 'LinrcoInvoice' , 'تم تعديل فاتورة رقم في شركة ليناركو  ' , 'Linrco Invoice has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('companyInvoice.index' , [$request->linrco_agreement_id , $request->mother_company_id]));
    }


    /** Delete LinrcoAgreement */
    public function destroy($linrco_invoice , $mother_company_id){

        $linrco_invoice->delete();

        $this->addLog(auth()->id() , $linrco_invoice->id , 'LinrcoInvoice' , 'تم حذف فاتورة رقم  ' , 'Linrco Invoice has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('companyInvoice.index' , [$linrco_invoice->linrco_agreement_id , $mother_company_id]));
    }

    public function uploadInvoice($request , $linrco_invoice){
        $file_invoice = $this->verifyAndStoreFile($request , 'file');
        $linrco_invoice->update(['file' => $file_invoice]);

        Alert::success('success', trans('dashboard.uploaded successfully'));
        return redirect(route('companyInvoice.index' , [$linrco_invoice->linrco_agreement_id , $request->mother_company_id]));
    }

}
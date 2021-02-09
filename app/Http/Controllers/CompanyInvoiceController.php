<?php

namespace App\Http\Controllers;

use Alkoumi\LaravelArabicTafqeet\Tafqeet;
use App\Interfaces\LinrcoInvoiceRepositoryInterface;
use App\Models\Company;
use App\Models\LinrcoAgreement;
use App\Models\LinrcoInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class CompanyInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $LinrcoInvoiceRepositoryInterface;
    protected $fnrcoInvoiceRepositoryinterface;

    public function __construct(LinrcoInvoiceRepositoryInterface $linrcoInvoiceRepositoryInterface)
    {
        $this->LinrcoInvoiceRepositoryInterface = $linrcoInvoiceRepositoryInterface;
        //$this->fnrcoInvoiceRepositoryinterface = $fnrcoQuotationRepositoryinterface;
    }

    public function index($agreement_id , $mother_company_id)
    {
        if ($mother_company_id == 1) {
            $linrco_invoices = $this->LinrcoInvoiceRepositoryInterface->index($agreement_id , $mother_company_id);
            $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company')->first();
//            dd($linrco_invoice->company->name);
            return view('system.invoices.linrco.index')->with(['linrco_invoices' => $linrco_invoices , 'agreement_id' => $agreement_id,
                'mother_company_id' => $mother_company_id , 'linrco_agreement' => $linrco_agreement]);
        }
        elseif ($mother_company_id == 2){
//            $fnrco_quotations = $this->fnrcoQuotationRepositoryinterface->index($agreement_id , $mother_company_id);
//            return view('system.invoices.fnrco.index')->with(['fnrco_quotations' => $fnrco_quotations ,
//                'mother_company_id' => $mother_company_id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($agreement_id , $mother_company_id)
    {
        $linrco_agreement = LinrcoAgreement::where('id' , $agreement_id)->with('company')->first();
        if ($mother_company_id == 1){
            return view('system.invoices.linrco.create')->with([
                'linrco_agreement' => $linrco_agreement ,'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){
//            return view('system.invoices.fnrco.create')->with([
//                'company_id' => $company_id , 'mother_company_id' => $mother_company_id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->mother_company_id == 1){
            return $this->LinrcoInvoiceRepositoryInterface->store($request);
        }
        elseif ($request->mother_company_id == 2){
            //return $this->fnrcoQuotationRepositoryinterface->store($request);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($invoice_id , $mother_company_id)
    {
        if ($mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::where('id' , $invoice_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->first();
            return view('system.invoices.linrco.edit')->with([
                'linrco_invoice'=>$linrco_invoice ,'mother_company_id' => $mother_company_id]);
        }
        elseif ($mother_company_id == 2){

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $invoice_id)
    {
        if ($request->mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::where('id' , $invoice_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->first();
            return $this->LinrcoInvoiceRepositoryInterface->update($request , $linrco_invoice);
        }
        elseif ($request->mother_company_id == 2){

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($invoice_id , $mother_company_id)
    {
        if ($mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::where('id' , $invoice_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->first();
            return $this->LinrcoInvoiceRepositoryInterface->destroy($linrco_invoice , $mother_company_id);
        }
        elseif ($mother_company_id == 2){

        }
    }

    public function convertToWords($num){
        //$num = 346,5
        $ones = array(
            0 =>"ZERO",
            1 => "ONE",
            2 => "TWO",
            3 => "THREE",
            4 => "FOUR",
            5 => "FIVE",
            6 => "SIX",
            7 => "SEVEN",
            8 => "EIGHT",
            9 => "NINE",
            10 => "TEN",
            11 => "ELEVEN",
            12 => "TWELVE",
            13 => "THIRTEEN",
            14 => "FOURTEEN",
            15 => "FIFTEEN",
            16 => "SIXTEEN",
            17 => "SEVENTEEN",
            18 => "EIGHTEEN",
            19 => "NINETEEN",
            "014" => "FOURTEEN"
        );
        $tens = array(
            0 => "ZERO",
            1 => "TEN",
            2 => "TWENTY",
            3 => "THIRTY",
            4 => "FORTY",
            5 => "FIFTY",
            6 => "SIXTY",
            7 => "SEVENTY",
            8 => "EIGHTY",
            9 => "NINETY"
        );
        $hundreds = array(
            "HUNDRED",
            "THOUSAND",
            "MILLION",
            "BILLION",
            "TRILLION",
            "QUARDRILLION"
        ); /*limit t quadrillion */
        $num = number_format($num,2,".",",");
//        dd($num);
        $num_arr = explode(".",$num);  // [0]=>346 , [1]=>50

        $wholenum = $num_arr[0];  //346
        $decnum = $num_arr[1];    //50

        $whole_arr = array_reverse(explode(",",$wholenum)); //[0]=>346
        // dd($whole_arr);
        krsort($whole_arr,1);   //true
        $rettxt = "";

        foreach($whole_arr as $key => $i){
            dd($whole_arr);
            //346
            //dd(substr($i,0,1));  //3
            while(substr($i,0,1)=="0"){
                $i=substr($i,1,5);
            }

            if($i < 20){
//                dd($ones[$i]);
                /* echo "getting:".$i; */
                $rettxt .= $ones[$i];
            }elseif($i < 100){
                if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)];
                if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)];
            }else{
                if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
                if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)];
                if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)];
            }
            if($key > 0){
                $rettxt .= " ".$hundreds[$key]." ";
            }
        }
        if($decnum > 0){
            $rettxt .= " Ryal saudia and ";
            if($decnum < 20){
                $rettxt .= $ones[$decnum];
            }elseif($decnum < 100){
                $rettxt .= $tens[substr($decnum,0,1)];
                $rettxt .= " ".$ones[substr($decnum,1,1)];
            }
        }
        return $rettxt;
    }

    public function convert($num){
        $decones = array(
            '0' => '',
            '01' => "One",
            '02' => "Two",
            '03' => "Three",
            '04' => "Four",
            '05' => "Five",
            '06' => "Six",
            '07' => "Seven",
            '08' => "Eight",
            '09' => "Nine",
            10 => "Ten",
            11 => "Eleven",
            12 => "Twelve",
            13 => "Thirteen",
            14 => "Fourteen",
            15 => "Fifteen",
            16 => "Sixteen",
            17 => "Seventeen",
            18 => "Eighteen",
            19 => "Nineteen"
        );
        $ones = array(
            0 => " ",
            1 => "One",
            2 => "Two",
            3 => "Three",
            4 => "Four",
            5 => "Five",
            6 => "Six",
            7 => "Seven",
            8 => "Eight",
            9 => "Nine",
            10 => "Ten",
            11 => "Eleven",
            12 => "Twelve",
            13 => "Thirteen",
            14 => "Fourteen",
            15 => "Fifteen",
            16 => "Sixteen",
            17 => "Seventeen",
            18 => "Eighteen",
            19 => "Nineteen"
        );
        $tens = array(
            0 => "",
            2 => "Twenty",
            3 => "Thirty",
            4 => "Forty",
            5 => "Fifty",
            6 => "Sixty",
            7 => "Seventy",
            8 => "Eighty",
            9 => "Ninety"
        );
        $hundreds = array(
            "Hundred",
            "Thousand",
            "Million",
            "Billion",
            "Trillion",
            "Quadrillion"
        ); //limit t quadrillion
        $num = number_format($num,2,".",",");
        $num_arr = explode(".",$num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",",$wholenum));
        krsort($whole_arr);
        $rettxt = "";
//        dd($whole_arr);
        foreach($whole_arr as $key => $i){
            if($i < 20){
                //dd($ones[$i]);
                $rettxt .= $ones[$i];
            }
            elseif($i < 100){
                $rettxt .= $tens[substr($i,0,1)];
                $rettxt .= " ".$ones[substr($i,1,1)];
            }
            else{
                $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
                $rettxt .= " ".$tens[substr($i,1,1)];
                $rettxt .= " ".$ones[substr($i,2,1)];
            }
            if($key > 0){
                $rettxt .= " ".$hundreds[$key]." ";
            }
        }
        $rettxt = $rettxt." Ryal saudia";

        if($decnum > 0){
            $rettxt .= " and ";
            if($decnum < 20){
                $rettxt .= $decones[$decnum];
            }
            elseif($decnum < 100){
                $rettxt .= $tens[substr($decnum,0,1)];
                $rettxt .= " ".$ones[substr($decnum,1,1)];
            }
            $rettxt = $rettxt." helalat/s";
        }
        return $rettxt;
    }

    public function printLinrcoinvoice($invoice_id , $mother_company_id){
        if ($mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::where('id' , $invoice_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->first();
            $total_before_tax = $linrco_invoice->LinrcoInvoiceRequest->sum('total_before_tax');
            $total_tax = $linrco_invoice->LinrcoInvoiceRequest->sum('tax');
            $total_amount_after_tax = $linrco_invoice->LinrcoInvoiceRequest->sum('total_amount_after_tax');
            //dd($total_amount_after_tax);
            $totalInArabic = Tafqeet::inArabic($total_amount_after_tax);

            $totalInEnglish_array = explode('.' , $total_amount_after_tax);
            $totalInEnglish_Ryials = $totalInEnglish_array[0];

            $inWords = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
            number_format($totalInEnglish_Ryials, 0, '.', ',');
            $totalInEnglish_Ryials = $inWords->format($totalInEnglish_Ryials);

            if(count($totalInEnglish_array) > 1){
                $totalInEnglish_halala = $totalInEnglish_array[1];

                number_format($totalInEnglish_halala, 0, '.', ',');
                $totalInEnglish_halala = $inWords->format($totalInEnglish_halala);
                $totalInEnglish = $totalInEnglish_Ryials. ' Riyals and ' . $totalInEnglish_halala . ' halala';
            }

            else{
                $totalInEnglish = $totalInEnglish_Ryials. ' Riyals';
            }



            //$totalInEnglish = $this->convert(12000);
            //dd($totalInEnglish);

            $pdf = Pdf::loadView('system.invoices.linrco.linrco_invoice_pdf' ,compact('linrco_invoice' , 'total_before_tax' ,
                'total_tax' , 'total_amount_after_tax' , 'totalInArabic' , 'totalInEnglish'));
        }
        elseif ($mother_company_id == 2){

        }

        $output = $pdf->output();

        return new \Illuminate\Http\Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'filename' => "linrco_invoice.pdf'"]);
    }



    public function viewAllinvoices($company_id , $mother_company_id){
        $company = Company::findOrFail($company_id);
        if ($mother_company_id == 1){
            $linrco_invoices = LinrcoInvoice::where('company_id' , $company_id)->with('LinrcoInvoiceRequest' , 'linrcoAgreement' , 'company' , 'user')->get();
            return view('system.invoices.linrco.view_all')->with(['linrco_invoices' => $linrco_invoices , 'company'=>$company ,
                'mother_company_id' => $mother_company_id]);
        }
    }

    public function uploadInvoice(Request $request){
        if($request->mother_company_id == 1){
            $linrco_invoice = LinrcoInvoice::findOrFail($request->linrco_invoice_id);
            return $this->LinrcoInvoiceRepositoryInterface->uploadInvoice($request , $linrco_invoice);
        }
    }

//    public function downloadInvoice($file_name){
//        return response()->file('storage/images/' . $file_name);
//    }

}

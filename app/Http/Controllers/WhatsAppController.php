<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Traits\logTrait;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    use LogTrait;
    protected $company_model;

    public function __construct(Company $company)
    {
        $this->company_model = $company;
    }


    public function sendWhatsappMessages(Request $request){
        $companies = $this->company_model::whereNotNull('whatsapp')->with(['sector' , 'subSector'])->orderBy('created_at', 'desc')->paginate(20);

        return view('system.whatsapp.view')->with('companies' , $companies);

    }
}

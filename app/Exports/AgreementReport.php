<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;


class AgreementReport implements FromView ,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $reports;

    public function __construct($agreement_reports)
    {
        $this->agreement_reports= $agreement_reports;
    }



    public function view(): View
    {
        return view('system.agreement_contract.agreement_report_excel', ['agreement_reports' => $this->agreement_reports]);
    }
}

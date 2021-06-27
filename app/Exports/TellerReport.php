<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;


class TellerReport implements FromView ,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $reports;

    public function __construct($teller_reports)
    {
        $this->teller_reports = $teller_reports;
    }



    public function view(): View
    {
        return view('system.teller_report.teller_report_excel', ['teller_reports' => $this->teller_reports]);
    }
}

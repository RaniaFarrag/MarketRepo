<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;


class RequestsReport implements FromView ,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $reports;

    public function __construct($requests_report)
    {
        $this->requests_report = $requests_report;
    }



    public function view(): View
    {
        return view('system.company_requests.requests_report_excel', ['requests_report' => $this->requests_report]);
    }
}

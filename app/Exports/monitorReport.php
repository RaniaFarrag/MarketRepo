<?php

namespace App\Exports;

use App\Company_sales_lead_report;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class monitorReport implements FromView ,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $ids = [];

    public function __construct($logs = array())
    {
        $this->logs = $logs;
    }


    public function view(): View
    {
        return view('system.reports.monitorReportExcel', ['logs' => $this->logs]);
    }



}

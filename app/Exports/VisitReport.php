<?php

namespace App\Exports;

use App\Models\Company_sales_lead_report;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VisitReport implements FromView ,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $reports;

    public function __construct($reports = array())
    {
        $this->reports = $reports;
    }


    public function view(): View
    {
        return view('system.reports.visitReportExcel', ['reports' => $this->reports]);
    }



}

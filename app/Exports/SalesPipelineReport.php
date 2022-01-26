<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;


class SalesPipelineReport implements FromView ,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $reports;

    public function __construct($sales_pipeline_report)
    {
        $this->sales_pipeline_report = $sales_pipeline_report;
    }



    public function view(): View
    {
        return view('system.sales_pipline.sales_pipeline_report_excel', ['sales_pipeline_report' => $this->sales_pipeline_report]);
    }
}

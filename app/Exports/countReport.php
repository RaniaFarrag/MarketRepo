<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;


class countReport implements FromView ,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $reports;

    public function __construct($data_counts = array() , $representative_name , $sum_added , $sum_visited ,
                                $salary , $daily_visits)
    {
        $this->data_counts = $data_counts;
        $this->representative_name = $representative_name;
        $this->sum_added = $sum_added;
        $this->sum_visited = $sum_visited;
        $this->salary = $salary;
        $this->daily_visits = $daily_visits;
//        $this->chart_array1 = $chart_array1;
//        $this->chart_array2 = $chart_array2;
    }



    public function view(): View
    {
        return view('system.companies_visits_count.counts_ReportExcel', ['data_counts' => $this->data_counts , 'representative_name' => $this->representative_name ,
            'sum_added' => $this->sum_added ,'sum_visited' => $this->sum_visited ,'salary' => $this->salary ,
            'daily_visits' => $this->daily_visits
            //, 'chart_array1'=>$this->chart_array1 ,
            //'chart_array2'=>$this->chart_array2
        ]);
    }
}

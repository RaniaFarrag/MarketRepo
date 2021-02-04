<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class representativeReport implements FromView ,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $ids = [];

    public function __construct($companies = array() ,$rep, $confirm_connected , $confirm_interview , $confirm_need , $confirm_contract , $count_meetings)
    {
        $this->companies = $companies;
        $this->rep = $rep;
        $this->confirm_connected = $confirm_connected;
        $this->confirm_interview = $confirm_interview;
        $this->confirm_need = $confirm_need;
        $this->confirm_contract = $confirm_contract;
        $this->count_meetings = $count_meetings;
    }


    public function view(): View
    {
        return view('system.reports.rep_ReportExcel', ['companies' => $this->companies , 'rep'=>$this->rep, 'confirm_connected'=>$this->confirm_connected ,
            'confirm_interview'=>$this->confirm_interview , 'confirm_need'=>$this->confirm_need , 'confirm_contract'=>$this->confirm_contract ,
            'count_meetings'=>$this->count_meetings]);
    }



}

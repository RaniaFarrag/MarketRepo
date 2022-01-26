<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;


class ManagersReport implements FromView ,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $reports;

    public function __construct($manager , $manager_salary , $manager_rest_salary , $manager_agreement_closed,
                                $manager_total_orders, $users = array() , $manager_name)
    {
        $this->manager = $manager;
        $this->manager_salary = $manager_salary;
        $this->manager_rest_salary = $manager_rest_salary;
        $this->manager_agreement_closed = $manager_agreement_closed;
        $this->manager_total_orders = $manager_total_orders;
        $this->users = $users;
        $this->manager_name = $manager_name;
    }



    public function view(): View
    {
        return view('system.managers_report.managers_ReportExcel', ['manager' => $this->manager , 'manager_salary' => $this->manager_salary ,
            'manager_rest_salary' => $this->manager_rest_salary ,'manager_agreement_closed' => $this->manager_agreement_closed ,
            'manager_total_orders' => $this->manager_total_orders ,'users'=>$this->users, 'manager_name' => $this->manager_name
        ]);
    }
}

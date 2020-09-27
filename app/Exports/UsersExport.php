<?php

namespace App\Exports;
use App\RepCompany;
use App\marking_companies;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
class UsersExport implements  FromView , ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */  use Exportable;
    protected $rep_id;

    public function __construct(int $rep_id)
    {
        $this->rep_id = $rep_id;
    }

    public function view(): View
    {
        $users = RepCompany::query();

        $users = $users->where('rep_id',$this->rep_id)
            ->with('company')
            ->get();

        return view('system.report.usersExcel', [
            'users' =>$users
        ]);
        // return User::all();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface salesReportRepositoryInterface
{

    public function index($request , $all = null);

//    public function show($request ,  $company_id , $mother_company_id , $all = null);
    public function show($company , $mother_company_id);

    public function store($request , $company);


    //1/4/2021
    public function visitReport($request);

    public function getSalesReportdetails($report_id);

    public function updateCompanySalesTeamReports($request , $report);
}

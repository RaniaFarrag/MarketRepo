<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface LinrcoNeedRepositoryInterface
{

    /** View All CompanyNeed */
    public function index($company_id);

    /** Get Employee Types */
    public function getEmployeementtypes($sector_id);

    /** Create CompanyNeed */
    public function create();

    /** Store CompanyNeed */
    public function store($request);

    /** Submit Edit CompanyNeed */
    public function update($request , $linrco_need);

    /** Delete CompanyNeed */
    public function destroy($need_id , $mother_company_id);

}
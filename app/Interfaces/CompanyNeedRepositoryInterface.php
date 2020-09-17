<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface CompanyNeedRepositoryInterface
{

    /** View All CompanyNeed */
    public function index($company_id);

    /** Get Employee Types */
    public function getEmployeementtypes($sector_id);

    /** Create CompanyNeed */
    public function create($company_id);

    /** Store CompanyNeed */
    public function store($request);

    /** Submit Edit CompanyNeed */
    public function update($request , $companyNeed);

    /** Delete CompanyNeed */
    public function destroy($companyNeed);

}
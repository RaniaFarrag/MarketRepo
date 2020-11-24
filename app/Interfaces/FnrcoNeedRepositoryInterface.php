<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface FnrcoNeedRepositoryInterface
{

    /** View All FnrcoNeed */
    public function index($company_id);

    /** Get Employee Types */
    public function getEmployeementtypes($sector_id);

    /** Create FnrcoNeed */
    public function create($company_id);

    /** Store FnrcoNeed */
    public function store($request);

    /** Submit Edit FnrcoNeed */
    public function update($request , $companyNeed);

    /** Delete FnrcoNeed */
    public function destroy($companyNeed);

}
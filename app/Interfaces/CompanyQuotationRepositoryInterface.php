<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface CompanyQuotationRepositoryInterface
{

    /** View All CompanyQuotation */
    public function index($company_id);

    /** Get Employee Types */
    public function getEmployeementtypes($sector_id);

    /** Create CompanyQuotation */
    public function create($company_id);

    /** Store CompanyQuotation */
    public function store($request);

    /** Submit Edit CompanyQuotation */
    public function update($request , $companyQuotation);

    /** Delete CompanyQuotation */
    public function destroy($companyQuotation);

}
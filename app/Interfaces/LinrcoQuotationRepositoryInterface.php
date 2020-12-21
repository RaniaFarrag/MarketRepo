<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface LinrcoQuotationRepositoryInterface
{

    public function index($company_id , $mother_company_id);

    public function store($request);

    public function update($request , $companyNeed);

    public function destroy($companyNeed);

}
<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface LinrcoInvoiceRepositoryInterface
{
    public function index($agreement_id , $mother_company_id);

    public function store($request);

    public function update($request , $linrco_invoice);

    public function destroy($linrco_invoice , $mother_company_id);

    public function uploadInvoice($request , $linrco_invoice);

}
<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface FnrcoQuotationRepositoryInterface
{
    public function index($company_id , $mother_company_id);

    public function store($request);

    public function update($request , $fnrco_quotation);

    public function destroy($quotation_id , $mother_company_id);

    /*********************************************Fnrco VISA FlatRed Quotations**********************************************/

    public function storeVisaFlatredQuotation($request);

    public function updateVisaFlatredQuotation($request , $fnrco_flat_red_quotation);

    public function deleteVisaFlatredQuotation($quotation_id , $mother_company_id);

}
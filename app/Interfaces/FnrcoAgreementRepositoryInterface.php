<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface FnrcoAgreementRepositoryInterface
{
    public function index($company_id , $mother_company_id);

    public function convertFnrcoquotationToAgreement($quotation_id);

    public function update($request , $fnrco_agreement);

    public function destroy($fnrco_agreement , $mother_company_id);

    /*********************************************FNRCO VISA FlatRed Agreements**********************************************/

    public function convertFnrcoFlatRedQuotationToAgreement($quotation);

    public function updateFlatRedAgreement($request , $flatred_agreement);

    public function deleteflatRedAgreement($flatred_agreement , $mother_company_id);


}
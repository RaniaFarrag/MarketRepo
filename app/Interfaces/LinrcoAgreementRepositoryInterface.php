<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface LinrcoAgreementRepositoryInterface
{
    public function index($company_id);

    public function store($request);

    public function update($request , $linrcoAgreement);

    public function destroy($linrcoAgreement);

}
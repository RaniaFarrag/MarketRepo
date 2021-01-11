<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface LinrcoUndertakingRepositoryInterface
{
    public function index($company_id , $mother_company_id);

    public function store($request);

    public function update($request , $linrco_undertaking);

    public function destroy($linrco_undertaking , $mother_company_id);

}
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

    /** View All Company Need */
    public function index($company_id);

    /** Get Employee Types */
    public function getEmployeementtypes($sector_id);

    /** Create Company Need */
    public function create($company_id);

    /** Store Company Need */
    public function store($request);

    /** Show One Company Need */
    public function show($company);

    /** Submit Edit Company Need */
    public function update($request , $companyNeed);

    /** Delete Company Need */
    public function destroy($company);


    /** Confirm Connected */
    public function confirmConnected($company_id);

//    /** Cancel Confirm Connected */
//    public function cancelConfirmConnected($company_id);

    /** Confirm Interview */
    public function confirmInterview($company_id);

    /** Confirm Need */
    public function confirmNeed($company_id);

    /** Confirm Contract */
    public function confirmContract($company_id);





}
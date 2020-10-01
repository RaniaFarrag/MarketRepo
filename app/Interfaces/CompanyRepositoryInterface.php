<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface CompanyRepositoryInterface
{

    /** View All companies */
    public function index($request);

    /** Create Company */
    public function create();

    /** Store Company */
    public function store($request);

    /** Show One Company */
    public function show($company);

    /** Edit Company */
    public function edit($company);

    /** Submit Edit Company */
    public function update($request , $company);

    /** Delete Company */
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

    /** companies Reports */
    public function companiesReports($request);

    /** Send Email To Company */
    public function sendEmail($request);

}

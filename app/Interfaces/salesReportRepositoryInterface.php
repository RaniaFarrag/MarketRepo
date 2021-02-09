<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface salesReportRepositoryInterface
{

    public function index($request , $all = null);

    public function show($request , $all = null);

    public function store($request);

}

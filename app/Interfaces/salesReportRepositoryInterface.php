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

    /** View All Sectors */
    public function index($request , $all = null);

    /** Store Sector */
    public function store($request);

}
<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface SectorRepositoryInterface
{

    /** View All Sectors */
    public function index();

    /** Store Sector */
    public function store($request);


    /** Submit Edit Sector */
    public function update($request , $sector);

    /** Delete Sector */
    public function destroy($sector);

}
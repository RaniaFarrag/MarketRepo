<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface SubSectorRepositoryInterface
{

    /** View Sub-Sectors Of Specific Sector */
    public function index($sector_id);

    /** Store Sub-Sector */
    public function store($request);


    /** Submit Edit Sub-Sector */
    public function update($request , $subSector);

    /** Delete Sub-Sector */
    public function destroy($subSector);

}
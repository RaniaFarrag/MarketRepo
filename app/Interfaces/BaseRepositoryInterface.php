<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface BaseRepositoryInterface
{

    /********************************* Manage Sectors *****************************/

    /** Add Sector */
    public function addSector($request);

    /** View All sectors */
    public function getAllsectors();

    /** Edit Sector Form */
    public function editSectorform($sector_id);

    /** Edit Sector */
    public function editSector($request , $sector_id);

    /** Delete Sector */
    public function deleteSector($sector_id);

    /********************************* Manage Sub-Sectors *****************************/

    /** Get All Sub-sectors Of Specific Sector */
    public function getSubsectorOfsector($sector_id);

    /** Add Sub Sector To Specific Sector */
    public function addSubsector($request);





}
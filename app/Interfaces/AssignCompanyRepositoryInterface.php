<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:57 PM
 */

namespace App\Interfaces;


interface AssignCompanyRepositoryInterface
{

    /** Assign Company To Representative Form */
    public function assignCompanyToRepresentativeForm();

    /** Get Fetch Companies Based On Country ,City, Sector And Sub-sector */
    public function fetchCompanyData($request);

    /** Submit Assign Company To Representative */
    public function submitAssignCompanyToRepresentative($request);

}
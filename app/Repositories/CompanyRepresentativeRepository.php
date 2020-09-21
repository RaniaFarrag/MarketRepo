<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\CompanyRepresentativeRepositoryInterface;
use App\Models\City;
use App\Models\Country;
use App\Models\Sector;
use App\Models\SubSector;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use App\User;
use Carbon\Carbon;
use DateTime;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


class CompanyRepresentativeRepository implements CompanyRepresentativeRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $country_model;
    protected $city_model;
    protected $sector_model;
    protected $sub_sector_model;
    protected $user_model;


    public function __construct(User $user ,Country $country , City $city , Sector $sector , SubSector $subSector)
    {
        $this->country_model = $country;
        $this->city_model = $city;
        $this->sector_model = $sector;
        $this->sub_sector_model = $subSector;
        $this->user_model = $user;
    }

    /** Assign Company To Representative Form */
    public function assignCompanyToRepresentative(){
        $data = array();
        $data['representatives'] = $this->user_model::where();
        $data['sectors'] = $this->sector_model::all();
        $data['countries'] = $this->country_model::all();
        $data['sectors'] = $this->sector_model::all();
    }



}
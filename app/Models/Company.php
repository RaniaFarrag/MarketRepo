<?php

namespace App\Models;

use App\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use Translatable;
    use SoftDeletes;

    protected $translatedAttributes = ['name'];
    protected $fillable = [
        'id' ,
        'logo' ,
        'first_business_card' ,
        'second_business_card' ,
        'third_business_card'  ,
        'whatsapp' ,
        'phone' ,
        'sector_id' ,
        'sub_sector_id' ,
        'country_id' ,
        'city_id' ,
        'district' ,
        'location' ,
        'branch_number' ,
        'num_of_employees' ,
        'website' ,
        'email' ,
        'linkedin' ,
        'twitter' ,

        'company_representative_name' ,
        'company_representative_job_title',
        'company_representative_job_mobile',
        'company_representative_job_phone',
        'company_representative_job_email',

        'hr_director_job_name',
        'hr_director_job_email',
        'hr_director_job_mobile',
        'hr_director_job_phone',
        'hr_director_job_whatsapp',

        'contract_manager_name',
        'contract_manager_email',
        'contract_manager_mobile',
        'contract_manager_phone',
        'contract_manager_whatsapp',

        'notes',
        'user_id',
        'client_status',
        'client_status_user_id',

        'evaluation_status',
        'evaluation_status_user_id',
        'confirm_connected',
        'confirm_connected_user_id',
        'confirm_interview',
        'confirm_interview_user_id',
        'confirm_need',
        'confirm_need_user_id',
        'confirm_contract',
        'confirm_contract_user_id',
    ];

    protected $dates = ['deleted_at'];

    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    public function subSector(){
        return $this->belongsTo(SubSector::class);
    }

    public function companyDesignatedcontacts(){
        return $this->hasMany(CompanyDesignatedContact::class);
    }

    public function companyMeetings(){
        return $this->hasMany(CompanyMeeting::class);
    }

    public function companyNeeds(){
        return $this->hasMany(CompanyNeed::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function representative(){
        return $this->belongsTo(User::class , 'representative_id' , 'id');
    }
}

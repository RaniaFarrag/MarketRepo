<?php

namespace App\Models;

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

        'notes',
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
}

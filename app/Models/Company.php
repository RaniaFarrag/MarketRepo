<?php

namespace App\Models;

use App\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    use Translatable;
    use SoftDeletes;

    protected $translatedAttributes = ['name'];
    protected $fillable = [
        //'id' ,
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

        'ecn' ,
        'cr' ,
        'ksa_branch' ,

        'company_representative_name' ,
        'company_representative_title',
        'company_representative_mobile',
        'company_representative_phone',
        'company_representative_email',

        'hr_director_name',
        'hr_director_email',
        'hr_director_mobile',
        'hr_director_phone',
        'hr_director_whatsapp',
        'hr_director_linkedin',

        'contract_manager_name',
        'contract_manager_email',
        'contract_manager_mobile',
        'contract_manager_phone',
        'contract_manager_whatsapp',
        'contract_manager_linkedin',

        'notes',
        'user_id',
        'client_status',
        'client_status_user_id',
        'representative_id',

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
        'created_at',
        'updated_at',
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

    public function assigned_to(){
        return $this->belongsTo(User::class,'user_id'); //change user_id to rep_id after migration
    }

    /** Changed */
    public function representative(){
        return $this->belongsToMany(User::class)->withPivot(['mother_company_id','client_status',
            'client_status_user_id','evaluation_status','evaluation_status_user_id','confirm_connected'
            ,'confirm_connected_user_id','confirm_interview','confirm_interview_user_id','confirm_need' ,
            'confirm_need_user_id' , 'confirm_contract' , 'confirm_contract_user_id'])->whereNull('company_user.deleted_at');
//        return $this->belongsToMany(User::class , 'company_user' , 'user_id' , 'company_id')
//            ->where('mother_company_id' , 1);
    }

    /** Changed */
    public function evaluator(){
        return $this->belongsToMany(User::class,'company_user' ,'evaluation_status_user_id');
    }

    /** Changed */
    public function confirm_connected_user(){
        return $this->belongsToMany(User::class,'company_user' ,'confirm_connected_user_id' , 'user_id');
    }

    /** Changed */
    public function confirm_interview_user(){
        return $this->belongsToMany(User::class,'company_user' ,'confirm_interview_user_id');
    }

    /** Changed */
    public function confirm_need_user(){
        return $this->belongsToMany(User::class,'company_user' ,'confirm_need_user_id');
    }

    /** Changed */
    public function confirm_contract_user(){
        return $this->belongsToMany(User::class,'company_user' ,'confirm_contract_user_id');
    }

    /** Changed */
    public function client_status_user(){
        return $this->belongsToMany(User::class,'company_user' ,'client_status_user_id' , 'user_id');
    }


    /** NEW */
    /** NEW */
    /** NEW */
    /** NEW */
    /** NEW */


    public function salesLeadReports(){
        return $this->hasMany(Company_sales_lead_report::class);
    }
}

<?php

namespace App;

use App\Models\Company;
use App\Models\Company_sales_lead_report;
use App\Models\CompanyMeeting;
use App\Models\CompanyRequest;
use App\Models\Log;
use App\Models\MotherCompany;
use App\Models\Sector;
use App\Models\UserSalary;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'name_en' , 'email', 'password', 'active' , 'parent_id' , 'mother_company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function motherCompany(){
        return $this->belongsTo(MotherCompany::class , 'mother_company-id' , 'id');
    }

    public function companyMeetings(){
        return $this->hasMany(CompanyMeeting::class);
    }

    /** Crated By */
    public function companies(){
        return $this->hasMany(Company::class,'user_id');
    }

    public function sectors(){
        return $this->belongsToMany(Sector::class);
    }

    public function childs()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    public function parent(){
        return $this->belongsTo(User::class , 'parent_id', 'id');
    }

    public function assignedCompanies(){
        return $this->belongsToMany(Company::class)->withPivot(['mother_company_id','client_status',
            'client_status_user_id','evaluation_status','evaluation_status_user_id','confirm_connected'
        ,'confirm_connected_user_id','confirm_interview','confirm_interview_user_id','confirm_need' ,
            'confirm_need_user_id' , 'confirm_contract' , 'confirm_contract_user_id'])->whereNull('company_user.deleted_at');
    }


    public function logs(){
        return $this->hasMany(Log::class);
    }

    public function company_sales_lead_report(){
        return $this->hasMany(Company_sales_lead_report::class);
    }

    public function userSalary(){
        return $this->hasOne(UserSalary::class);
    }

    public function companyRequests(){
        return $this->hasMany(CompanyRequest::class);
    }
}

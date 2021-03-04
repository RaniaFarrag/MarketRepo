<?php

namespace App\Models;

use App\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUser extends Model
{

    protected $table = "company_user";
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id' ,
        'user_id' ,
        'mother_company_id' ,
        'client_status'  ,
        'client_status_user_id' ,
        'evaluation_status' ,
        'evaluation_status_user_id' ,
        'confirm_connected' ,
        'confirm_connected_user_id' ,
        'confirm_interview' ,
        'confirm_interview_user_id' ,
        'confirm_need' ,
        'confirm_need_user_id' ,
        'confirm_contract' ,
        'confirm_contract_user_id' ,
    ];


    public function evaluator(){
        return $this->belongsTo(User::class,'evaluation_status_user_id');
    }

    public function confirmConnect(){
        return $this->belongsTo(User::class,'confirm_connected_user_id');
    }

    public function confirmInterview(){
        return $this->belongsTo(User::class,'confirm_interview_user_id');
    }

    public function confirmNeed(){
        return $this->belongsTo(User::class,'confirm_connected_user_id');
    }
    public function confirmContract(){
        return $this->belongsTo(User::class,'confirm_contract_user_id');
    }

    public function client_status_user(){
        return $this->belongsTo(User::class,'client_status_user_id' , 'id');
    }

    public function evaluation_status_user(){
        return $this->belongsTo(User::class,'evaluation_status_user_id' , 'id');
    }

     public function company(){
        return $this->belongsTo(Company::class , 'company_id');
     }

    public function representative(){
        return $this->belongsTo(User::class,'user_id' , 'id');
    }
}

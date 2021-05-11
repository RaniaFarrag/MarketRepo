<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mockery\Matcher\Not;

class CompanyRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'user_id',
        'company_user_id',
        'mother_company_id',
        'request_type',
        'quantity',
        'date',
    ];

    protected $dates = ['deleted_at'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function motherCompany(){
        return $this->belongsTo(MotherCompany::class);
    }

    public function companyUser(){
        return $this->belongsTo(CompanyUser::class);
    }

    public function notes(){
        return $this->hasMany(Note::class , 'company_request_id' , 'id');
    }
}

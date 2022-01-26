<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SalesPipeline extends Model
{
    protected $fillable = [
        'company_id',
        'user_id',
        'company_user_id',
        'mother_company_id',
        'contract_status',
        'date',
        'total_volume',
        'contract_type',
    ];

    public function history(){
        return $this->hasMany(SalesPipelineHistory::class);
    }

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
}

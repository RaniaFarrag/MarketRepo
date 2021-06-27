<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgreementReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'user_id',
        'mother_company_id',
        'contract_status',
        'date',
        'feedback',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function motherCompany(){
        return $this->belongsTo(MotherCompany::class);
    }
}

<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class FnrcoQuotation extends Model
{
    protected $fillable = [
        'ref_no',
        'attn',
        'telephone',
        'mobile',
        'email',
        'Quotation_No',
        'Contract_period',
        'saudization',
        'company_id',
        'user_id',
    ];

    public function fnrcoQuotationsRequest(){
        return $this->hasMany(FnrcoQuotationRequest::class);
    }

    public function fnrcoAgreement(){
        return $this->hasOne(FnrcoAgreement::class , 'fnrco_quotation_id' , 'id');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

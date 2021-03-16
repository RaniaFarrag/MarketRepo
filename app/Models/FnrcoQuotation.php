<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FnrcoQuotation extends Model
{

    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

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

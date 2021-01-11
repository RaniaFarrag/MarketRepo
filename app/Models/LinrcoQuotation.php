<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LinrcoQuotation extends Model
{
    protected $fillable = [
        'ref_no',
        'attn',
        'telephone',
        'mobile',
        'email',
        'Quotation_No',
        'saudization',
        'company_id',
        'user_id',
    ];

    public function linrcoQuotationsRequest(){
        return $this->hasMany(LinrcoQuotationRequest::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
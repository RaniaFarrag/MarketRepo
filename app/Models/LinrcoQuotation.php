<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinrcoQuotation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ref_no',
        'attn',
        'telephone',
        'mobile',
        'email',
        'Quotation_No',
        'terms_ar',
        'terms_en',
        'saudization',
        'company_id',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

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

<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FnrcoAgreement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fnrco_quotation_id',
        'company_id',
        'user_id',
        'cr_date',
        'hr_system',
        'signing_by',
        'by_as',
        'address_en',
        'address_ar',
        'phone',
        'fax',
        'mailing_address',
        'postal_code',
    ];

    protected $dates = ['deleted_at'];

    public function fnrcoQuotation(){
        return $this->belongsTo(FnrcoQuotation::class , 'fnrco_quotation_id' , 'id');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

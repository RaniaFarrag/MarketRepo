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

        'mol',
        'location',
        'agreement_num',
        'agreement_issue_date',
        'agreement_expiry_date',

        'work_hours',
        'work_hours_ar',

        'work_days',
        'work_days_en',

        'work_hours_weekly',
        'work_hours_weekly_ar',

        'first_party',
        'first_party_en',

        'second_party',
        'second_party_en',
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

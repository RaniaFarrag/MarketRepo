<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FnrcoFlatRedAgreement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'flatred_quotation_id',
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

        'contract_validity',
        'contract_validity_ar',
        'contract_validity_en',

        'first_party',
        'first_party_en',

        'second_party',
        'second_party_en',
        'date',
    ];

    protected $dates = ['deleted_at'];

    public function fnrcoFlatRedQuotation(){
        return $this->belongsTo(FnrcoFlatRedQuotation::class , 'flatred_quotation_id' , 'id');
    }

    public function agreementFlatRedAnnexure(){
        return $this->hasOne(FnrcoFlatRedAgreementAnnexure::class , 'flatred_agreement_id' , 'id');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

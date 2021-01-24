<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LinrcoAgreement extends Model
{
    protected $fillable = [
        'date',
        'agreement_no',
        'company_name',
        'cr',
        'company_address_en',
        'phone',
        'mail_box',
        'postal_code',
        'email',
        'company_representative_en',
        'company_representative_ar',
//        'duration_of_commitment',
//        'payment_of_fees',
//        'service_implementation_fee',
//        'the_notice_period',

        'data_flow',

        'healthcare_fee_ar',
        'healthcare_visa_fee_ar',
        'healthcare_fee_en',
        'healthcare_visa_fee_en',

        'whitecollar_fee_ar',
        'whitecollar_visa_fee_ar',
        'whitecollar_fee_en',
        'whitecollar_visa_fee_en',

        'bluecollar_fee_ar',
        'bluecollar_visa_fee_ar',
        'bluecollar_fee_en',
        'bluecollar_visa_fee_en',

        'labor_fee_ar',
        'labor_visa_fee_ar',
        'labor_fee_en',
        'labor_visa_fee_en',

        'referred_candidates_fee_ar',
        'referred_candidates_visa_fee_ar',
        'referred_candidates_fee_en',
        'referred_candidates_visa_fee_en',

        'company_address_ar',
        'company_id',
        'user_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function linrcoInvoice(){
        return $this->hasOne(LinrcoInvoice::class , 'linrco_agreement_id' , 'id');
    }


}

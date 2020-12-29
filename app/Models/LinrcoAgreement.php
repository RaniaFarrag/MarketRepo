<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LinrcoAgreement extends Model
{
    protected $fillable = [
        'date',
        'company_name',
        'cr',
        'company_address',
        'phone',
        'mail_box',
        'postal_code',
        'email',
        'company_representative',
        'position',

        'duration_of_commitment',
        'payment_of_fees',
        'service_implementation_fee',
        'the_notice_period',
        'linrco_email',
        'company_id',
        'user_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}

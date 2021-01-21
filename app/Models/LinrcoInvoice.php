<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinrcoInvoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'invoice_no',
        'date',
        'agreement_no',
        'internal_contact',
        'telephone',
        'email',
        'linrco_agreement_id',
        'company_id',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function LinrcoInvoiceRequest(){
        return $this->hasMany(LinrcoInvoiceRequest::class);
    }

    public function linrcoAgreement(){
        return $this->belongsTo(LinrcoAgreement::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

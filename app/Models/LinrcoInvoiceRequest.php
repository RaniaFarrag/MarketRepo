<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinrcoInvoiceRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'particulars',
        'recruitment_fee',
        'visa_processing_fee',
        'total_before_tax',
        'tax',
        'total_amount_after_tax',
        'linrco_invoice_id',
    ];
    protected $dates = ['deleted_at'];

    public function linrcoInvoice(){
        return $this->belongsTo(LinrcoInvoice::class);
    }
}

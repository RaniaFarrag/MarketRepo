<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinrcoInvoiceRequest extends Model
{
    protected $fillable = [
        'particulars',
        'recruitment_fee',
        'visa_processing_fee',
        'total_before_tax',
        'tax',
        'total_amount_after_tax',
        'linrco_invoice_id',
    ];

    public function linrcoInvoice(){
        return $this->belongsTo(LinrcoInvoice::class);
    }
}

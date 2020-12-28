<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinrcoQuotationRequest extends Model
{
    protected $fillable = [
        'trade',
        'gender',
        'educational_qualification',
        'quantity',
        'nationality',
        'salary',
        'RECRUITMENT_CHARGES_PER_CANDIDATE',
        'VISA_PROCESSING_CHARGES_PER_CANDIDATE',
        'linrco_quotation_id',
    ];   

    public function linrcoQuotation(){
        return $this->belongsTo(LinrcoQuotation::class);
    }

    public function country(){
        return $this->belongsTo(Country::class , 'nationality' , 'id');
    }

}

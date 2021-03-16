<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinrcoQuotationRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'trade',
        'gender',
        'educational_qualification',
        'quantity',
        'nationality',
        'salary',
        'RECRUITMENT_CHARGES_PER_CANDIDATE',
        'VISA_PROCESSING_CHARGES_PER_CANDIDATE',
        'other_allowance',
        'linrco_quotation_id',
    ];

    protected $dates = ['deleted_at'];

    public function linrcoQuotation(){
        return $this->belongsTo(LinrcoQuotation::class);
    }

    public function country(){
        return $this->belongsTo(Country::class , 'nationality' , 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FnrcoFlatRedQuotationRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category',
        'visa_category_available',
        'visa_category_arabic',
        'quantity',
        'nationality',
        'salary',
        'Food_allowance',
        'Fnrco_charge',
        'iqama_visa',
        'admin_fees',
        'value_per_employee_month',
        'total_value_per_month',
        'flatred_quotation_id',
    ];

    protected $dates = ['deleted_at'];

    public function fnrcoFlatredQuotation(){
        return $this->belongsTo(FnrcoFlatRedQuotation::class , 'flatred_quotation_id' , 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class , 'nationality' , 'id');
    }
}

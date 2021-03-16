<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FnrcoQuotationRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category',
        'quantity',
        'nationality',
        'salary',
        'Food_allowance',
        'Fnrco_charge',
        'iqama_visa',
        'admin_fees',
        'value_per_employee_month',
        'total_value_per_month',
        'fnrco_quotation_id',
    ];

    protected $dates = ['deleted_at'];

    public function fnrcoQuotation(){
        return $this->belongsTo(FnrcoQuotation::class);
    }

    public function country(){
        return $this->belongsTo(Country::class , 'nationality' , 'id');
    }
}

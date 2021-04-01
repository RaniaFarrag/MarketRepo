<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company_sales_lead_report extends Model
{
    use SoftDeletes;

    protected $fillable =['id' ,'company_id' , 'cat_of_req','brochurs_status',
        'quanity','type_of_serves',
        'client_feeback','remarks',
        'updates','nextFollowUp','visit_date',
        'statue','user_id',
        'created_at' , 'updated_at'
        ];

    protected $dates = ['deleted_at'];

    public function company(){
        return $this->belongsTo(Company::class );
    }

    public function user(){
        return $this->belongsTo(User::class );
    }
}

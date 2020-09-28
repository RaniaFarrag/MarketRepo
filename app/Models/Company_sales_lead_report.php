<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company_sales_lead_report extends Model
{
    protected $fillable =['cat_of_req','brochurs_status','quanity','type_of_serves','client_feeback','remarks','updates','nextFollowUp',
        'statue','user_id','company_id',
        ];

    public function company(){
        return $this->belongsTo(Company::class );
    }

    public function user(){
        return $this->belongsTo(User::class );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;

    protected $fillable = ['company_request_id' , 'teller_id','feedback' , 'note' , 'date' ,'next_follow_date' , 'request_status'];
    protected $dates = ['deleted_at'];

    public function companyRequest(){
        return $this->belongsTo(CompanyRequest::class , 'company_request_id' , 'id');
    }

}

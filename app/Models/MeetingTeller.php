<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeetingTeller extends Model
{
    use SoftDeletes;

    protected $fillable = ['representative_id' , 'user_id' , 'company_id' , 'mother_company_id'
        , 'date_call' , 'time_call' , 'feedback' , 'date_meeting' , 'time_meeting'];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function representative(){
        return $this->belongsTo(User::class,'representative_id');
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }
}

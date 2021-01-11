<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LinrcoUndertaking extends Model
{
    protected $fillable = [
        'date',
        'linrco_representative',
        'linrco_cr',
        'linrco_mail_box',
        'company_representative',
        'company_cr',
        'company_id',
        'user_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

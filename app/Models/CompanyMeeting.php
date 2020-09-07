<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyMeeting extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date',
        'time',
        'company_id',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}

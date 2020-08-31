<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyMeeting extends Model
{
    protected $fillable = [
        'date',
        'time',
        'company_id',
        'by_user',
    ];
}

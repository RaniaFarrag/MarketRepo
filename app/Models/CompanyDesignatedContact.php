<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDesignatedContact extends Model
{
    protected $fillable = [
        'name',
        'job_title',
        'mobile',
        'linkedin',
        'whatsapp',
        'email',
        'company_id',
    ];
}

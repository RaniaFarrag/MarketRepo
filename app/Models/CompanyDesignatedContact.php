<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDesignatedContact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'job_title',
        'mobile',
        'citizenship',
        'linkedin',
        'whatsapp',
        'email',
        'company_id',
    ];

    protected $dates = ['deleted_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinrcoQuotation extends Model
{
    protected $fillable = [
        'attn',
        'telephone',
        'mobile',
        'email',
        'company_id',
        'user_id',
        ];
}

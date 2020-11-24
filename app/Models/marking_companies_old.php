<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class marking_companies_old extends Model
{
    protected $table = "companies_old";

    public function images(){
        return $this->hasMany(company_images::class , 'company_id');
    }
}

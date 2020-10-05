<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class company_images extends Model
{
    protected $table = "company_images";

    public function company(){
        return $this->belongsTo(marking_companies_old::class);
    }
}

<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use Translatable;

    protected $translatedAttributes = ['name'];

    protected $dates = ['deleted_at'];
}

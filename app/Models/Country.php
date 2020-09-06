<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Translatable;

    protected $translatedAttributes = ['name'];
    protected $fillable = ['code','id'];

}

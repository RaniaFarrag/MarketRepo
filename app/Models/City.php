<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;

    protected $translatedAttributes = ['name'];
    protected $fillable = ['code' , 'country_id'];

}

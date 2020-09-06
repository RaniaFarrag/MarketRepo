<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;

    protected $translatedAttributes = ['name'];
    protected $fillable = ['id' , 'code' , 'country_id'];

}

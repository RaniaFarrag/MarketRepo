<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use Translatable;

    protected $fillable = ['user_id' , 'model_id' , 'model_name'];
    protected $translatedAttributes = ['content'];
}

<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use Translatable;
    use SoftDeletes;

    protected $translatedAttributes = ['name'];
    protected $fillable = ['code','id'];
    protected $dates = ['deleted_at'];

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function cities(){
        return $this->hasMany(City::class);
    }

}

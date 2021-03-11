<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use Translatable;
    use SoftDeletes;


    protected $translatedAttributes = ['name'];
    protected $fillable = ['id' , 'code' , 'country_id'];
    protected $dates = ['deleted_at'];

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

}

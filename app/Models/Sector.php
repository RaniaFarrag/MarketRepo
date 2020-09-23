<?php

namespace App\Models;

use App\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use Translatable;
    use SoftDeletes;

    protected $fillable = ['id'];
    protected $translatedAttributes = ['name'];
    protected $dates = ['deleted_at'];


    public function subSectors(){
        return $this->hasMany(SubSector::class);
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }



}

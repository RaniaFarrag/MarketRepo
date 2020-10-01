<?php

namespace App\Models;

use App\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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


    public static function all($columns = Array())
    {
        if (Auth::user()->hasRole('Sales Manager') || Auth::user()->hasRole('Sales Representative'))
            return Auth::user()->sectors;

        return self::get();
    }
}

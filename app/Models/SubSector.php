<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SubSector extends Model
{
    use Translatable;

    protected $fillable= ['sector_id'];
    protected $translatedAttributes = ['name'];

    public function sector(){
        $this->belongsTo(Sector::class);
    }


}

<?php

namespace App\Models;

use App\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use Translatable;

    protected $fillable = ['user_id' , 'row_id' , 'model_name'];
    protected $translatedAttributes = ['content'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}

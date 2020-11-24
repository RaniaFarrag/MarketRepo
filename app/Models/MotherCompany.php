<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotherCompany extends Model
{
    protected $fillable = ['name' , 'name_en' , 'logo' , 'header' , 'footer'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotherCompany extends Model
{
    protected $fillable = ['name' , 'name_en' , 'logo' , 'header' , 'footer'];


    public function users(){
        return $this->hasMany(User::class , 'mother_company_id' , 'id');
    }

    public function company_user(){
        return $this->hasMany(CompanyUser::class);
    }
}

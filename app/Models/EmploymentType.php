<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{
    public function need(){
        return $this->hasMany(CompanyNeed::class ,'employment_type_id');
    }
}

<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyNeed extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'employment_type_id',
        'required_position',
        'job_description',
        'candidates_number',
        'country_id',
        'gender',
        'minimum_age',
        'total_salary',
        'special_note',

        'contract_duration',
        'experience_range',
        'work_location',
        'work_hours',
        'deadline',

        'educational_qualification',
        'data_flow',
        'prometric',
        'classification',
        'total_experience',
        'area_of_experience',
        'other_skills',

        'company_id',
        'sector_id',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

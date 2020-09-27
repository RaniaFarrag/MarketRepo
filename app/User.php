<?php

namespace App;

use App\Models\Company;
use App\Models\CompanyMeeting;
use App\Models\Sector;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'name_en' , 'email', 'password', 'active' , 'parent_id' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companyMeetings(){
        return $this->hasMany(CompanyMeeting::class);
    }

    public function companies(){
        return $this->hasMany(Company::class,'user_id'); //change user_id to rep_id after migration
    }

    public function sectors(){
        return $this->belongsToMany(Sector::class);
    }
}

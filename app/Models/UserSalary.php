<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSalary extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'salary',
        'visit_price',
        'num_visits_per_day',
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }


}

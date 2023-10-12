<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property String $name
 * @property String $surname
 * @property String $email
 * @property String $phone
 * @property String $password
 * @property integer $reception_id
 * @property integer $is_payment
 * @property integer $status
 * @property integer $salary
 * @property integer $kpi
 * @property integer $hourly
 * @property integer $add_student
 * @property integer $active_student
 * */

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'password',
        'reception_id',
        'is_payment',
        'status',
        'salary',
        'kpi',
        'hourly',
        'add_student',
        'active_student',
    ];

    public function reception(){
        return $this->belongsTo(User::class,'reception_id','id');
    }

    public function groupList(){
        return $this->hasOne(GroupStudent::class,'student_id','id')->orderByDesc('id');
    }
    public function event(){
        return $this->hasOne(EventUser::class,'user_id','id')->orderByDesc('id');
    }

    public function events()
    {
        return $this->hasMany(EventUser::class);
    }

    public function pu(){
        return $this->hasMany(PU::class,'user_id','id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

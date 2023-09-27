<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * @property int $type
 * @property Timestamp $start_time
 * @property Cource $cource_id
 * @property Filial $filial_id
 * @property integer $max_student
 * */

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'type',
        'start_time',
        'cource_id',
        'filial_id',
        'max_student',
    ];

    public function cource(){
        return $this->belongsTo(Cource::class);
    }

    public function filial(){
        return $this->belongsTo(Filial::class);
    }

    public function detail(){
        return $this->hasMany(GroupDetail::class,'group_id','id');
    }

    public function room(){
        return $this->hasMany(GroupDetail::class,'room_id','id');
    }

    public function teacher(){
        return $this->hasMany(GroupDetail::class,'teacher_id','id');
    }

    public function student(){
        return $this->hasMany(GroupStudent::class);
    }
}

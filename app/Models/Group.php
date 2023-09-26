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
    ];

    public function cource(){
        return $this->belongsTo(Cource::class);
    }

    public function filial(){
        return $this->belongsTo(Filial::class);
    }

    public function gr(){
        return $this->hasMany(GroupRoom::class);
    }

    public function teacher(){
        return $this->hasMany(GroupTeacher::class);
    }

    public function student(){
        return $this->hasMany(GroupStudent::class);
    }
}

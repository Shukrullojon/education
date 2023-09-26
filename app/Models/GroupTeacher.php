<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Group $group_id
 * @property Teacher $teacher_id
 * @property Time $begin_time
 * @property Time $end_time
 * */

class GroupTeacher extends Model
{
    use HasFactory;

    protected $table = 'group_teacher';

    protected $fillable = [
        'group_id',
        'teacher_id',
        'begin_time',
        'end_time',
    ];

    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id','id');
    }
}

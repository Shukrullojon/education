<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Group $group_id
 * @property Room $student_id
 * @property int $status
 * */

class GroupStudent extends Model
{
    use HasFactory;

    protected $table = 'group_student';

    protected $fillable = [
        'group_id',
        'student_id',
        'status',
    ];

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }
}

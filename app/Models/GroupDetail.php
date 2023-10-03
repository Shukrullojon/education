<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $group_id
 * @property int $room_id
 * @property int $teacher_id
 * @property Time $begin_time
 * @property Time $end_time
 * @property int $status
 * */

class GroupDetail extends Model
{
    use HasFactory;

    protected $table = 'group_details';

    protected $fillable = [
        'group_id',
        'room_id',
        'teacher_id',
        'begin_time',
        'end_time',
        'status'
    ];

    public function room(){
        return $this->belongsTo(Room::class,'room_id','id');
    }

    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id','id');
    }

}

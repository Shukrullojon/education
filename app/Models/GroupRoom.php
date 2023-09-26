<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Group $group_id
 * @property Room $room_id
 * @property Time $begin_time
 * */


class GroupRoom extends Model
{
    use HasFactory;

    protected $table = 'group_room';

    protected $fillable = [
        'group_id',
        'room_id',
        'begin_time',
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }

}

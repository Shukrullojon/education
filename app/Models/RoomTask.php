<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $room_id
 * @property int $room_task_id
 * */

class RoomTask extends Model
{
    use HasFactory;

    protected $table = 'room_task';

    protected $fillable = [
        'room_id',
        'room_task_id',
    ];

    public $timestamps = true;

}

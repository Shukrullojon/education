<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * @property String $room_id
 * @property int $status
 * */

class RoomTask extends Model
{
    use HasFactory;

    protected $table = 'room_tasks';

    protected $fillable = [
        'name',
        'room_id',
        'status',
    ];

    public $timestamps = true;


}

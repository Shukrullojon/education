<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $change_user_id
 * @property int $event_id
 * */

class EventUser extends Model
{
    use HasFactory;

    protected $table = 'event_user';

    protected $fillable = [
        'user_id',
        'change_user_id',
        'event_id',
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }
}

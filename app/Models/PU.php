<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $user_id
 * @property integer $p_c_id
 * @property integer $attach_user_id
 * @property integer $status
 * */

class PU extends Model
{
    use HasFactory;

    protected $table = 'p_u';

    protected $fillable = [
        'user_id',
        'p_c_id',
        'attach_user_id',
        'status',
    ];
}

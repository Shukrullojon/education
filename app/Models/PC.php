<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * @property integer $status
 * */

class PC extends Model
{
    use HasFactory;

    protected $table = 'p_c';

    protected $fillable = [
        'name',
        'status',
    ];
}

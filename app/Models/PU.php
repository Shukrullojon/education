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

    public function pc(){
        return $this->belongsTo(PC::class,'p_c_id','id');
    }

    public function pur(){
        return $this->hasMany(PUR::class,'p_u_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attach(){
        return $this->belongsTo(User::class,'attach_user_id','id');
    }

}

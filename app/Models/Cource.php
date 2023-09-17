<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * @property int $time
 * @property int $during
 * @property String $info
 * @property int $filial_id
 * @property int $status
 * */
class Cource extends Model
{
    use HasFactory;

    protected $table = 'cources';

    protected $fillable = [
        'name',
        'time',
        'during',
        'info',
        'filial_id',
        'status',
    ];

    public function filial(){
        return $this->belongsTo(Filial::class);
    }
}

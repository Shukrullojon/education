<?php

namespace App\Helpers;

class StatusHelper{
    public static $taskStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function taskStatusGet($index){
        return self::$taskStatus[$index];
    }
}

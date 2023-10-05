<?php

namespace App\Helpers;

class TypeHelper{
    public static $dayType = [
        '1' => 'Every',
        '2' => 'One time',
    ];

    public static function getDayType($index){
        $name = self::$dayType[$index] ?? 'Undefined';
        return $name;
    }
}

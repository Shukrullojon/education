<?php

namespace App\Helpers;

class EventHelper
{
    public static $eventStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function eventStatusGet($index)
    {
        return self::$eventStatus[$index] ?: 'Undefined';
    }
}

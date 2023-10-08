<?php

namespace App\Helpers;

class StatusHelper
{
    public static $taskStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function taskStatusGet($index)
    {
        return self::$taskStatus[$index] ?: 'Undefined';
    }

    public static $studentStatus = [
        '0' => '📦 Archive',
        '1' => '⏳ Waiting',
        '2' => '✅ Active',
    ];

    public static function studentStatusGet($index)
    {
        return self::$studentStatus[$index] ?: 'Undefined';
    }
}

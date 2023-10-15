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
        return self::$taskStatus[$index] ?? 'Undefined';
    }

    public static $studentStatus = [
        '1' => '⏳ Waiting',
        '2' => '✅Active',
        '3' => '👨‍🎓 All',
        '0' => '📦 Archive',
    ];

    public static function studentStatusGet($index)
    {
        return self::$studentStatus[$index] ?? 'Undefined';
    }

    public static $adminStatus = [
        '0' => '📦 Archive',
        '1' => '✅ Active',
        '2' => '🙅‍♂️ Otpuska',
        '3' => '🤕 Ill',
    ];

    public static function adminStatusGet($index)
    {
        return self::$adminStatus[$index] ?? 'Undefined';
    }

    public static $filialStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function filialStatusGet($index)
    {
        return self::$taskStatus[$index] ?? 'Undefined';
    }

    public static $courceStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function courceStatusGet($index)
    {
        return self::$taskStatus[$index] ?? 'Undefined';
    }

    public static $roomStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function roomStatusGet($index)
    {
        return self::$roomStatus[$index] ?? 'Undefined';
    }
}

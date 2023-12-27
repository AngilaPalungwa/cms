<?php

namespace App\Utils;

use App\Models\Settings;

class SettingUtils
{

    private static $settings;

    private static function loadSettings()
    {
        self::$settings = Settings::pluck('value','name')->all();
    }
    public  static  function get($key, $default = NUll)
    {
        if(!isset(self::$settings)){
            self::loadSettings();
        }
        return array_key_exists($key,self::$settings) ? self::$settings[$key] : $default;

    }

    public  static function set($key, $value)
    {
        if(!isset(self::$settings)){
            self::loadSettings();
        }

        Settings::updateOrCreate(['name' =>$key],['value' =>$value]);
        self::$settings[$key] = $value;

    }



}

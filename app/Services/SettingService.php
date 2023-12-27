<?php

namespace App\Services;

use App\Models\Settings;

class SettingService
{
    private $systemName;
    private $logo;
    private  $footer;

    public function __construct()
    {
       $setting =  Settings::all();
    $name = isset($setting) ?  $setting->where('name','system_name')->first() : '';

       $this->systemName = $name->value;
       $this->logo = $name->value;
       $this->footer = $name->value;


    }

    public function getSystemName()
    {
        return $this->systemName;
    }
}

<?php

if (!function_exists('get_settings')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_settings()
    {
        $settings = app(\App\Modules\Setting\Repository\Interfaces\SettingInterface::class)->getAll();
        $settingArray = [];
        foreach($settings as $setting)
        {
            $settingArray[$setting->key] = $setting;
        }
        return $settingArray;
    }
}

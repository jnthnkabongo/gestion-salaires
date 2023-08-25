<?php

    namespace App\Helpers;

use App\Models\configuration;

    class ConfigHelper
    {
        public static function getAllName(){
            $appName = configuration::where('type', 'APP_NAME')->value('value');
            config(['app.name' => $appName]);

            return $appName;
        }
    }

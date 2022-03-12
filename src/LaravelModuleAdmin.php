<?php

namespace Hungnm28\LaravelModuleAdmin;

use Illuminate\Support\Facades\Facade;

class LaravelModuleAdmin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-module-admin';
    }
}

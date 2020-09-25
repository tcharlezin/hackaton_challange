<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class Site extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'site';
    }
}

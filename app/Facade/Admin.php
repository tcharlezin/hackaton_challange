<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'admin';
    }
}

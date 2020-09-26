<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class Shop extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'shop';
    }
}

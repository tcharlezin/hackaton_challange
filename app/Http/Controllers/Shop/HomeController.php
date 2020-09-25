<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {
        return view("shop.home.index");
    }
}

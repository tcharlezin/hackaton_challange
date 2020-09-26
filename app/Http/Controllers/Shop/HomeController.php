<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class HomeController
{
    protected $header;

    public function index(Request $request)
    {
        return view("shop.home.index");
    }
}

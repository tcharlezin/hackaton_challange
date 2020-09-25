<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class SearchController
{
    public function index(Request $request)
    {
        return view("shop.search.index");
    }
}

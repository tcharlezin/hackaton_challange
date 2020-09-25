<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class CategoryController
{
    public function index(Request $request)
    {
        return view("shop.category.index");
    }
}

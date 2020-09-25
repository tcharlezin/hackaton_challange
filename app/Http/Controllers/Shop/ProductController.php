<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class ProductController
{
    public function index(Request $request)
    {
        return view("shop.product.index");
    }
}

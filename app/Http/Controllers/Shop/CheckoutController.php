<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class CheckoutController
{
    public function index(Request $request)
    {
        return view("shop.checkout.index");
    }
}

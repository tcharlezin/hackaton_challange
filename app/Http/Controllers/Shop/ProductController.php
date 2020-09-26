<?php

namespace App\Http\Controllers\Shop;

use App\Models\Catalog\Product;
use Illuminate\Http\Request;

class ProductController
{
    public function index(Request $request, $name)
    {
        $product = Product::where(["name" => $name])->first();
        $productInformation = (new \App\Dominio\Catalog\ProductInformation($product->id))->get();

        return view("shop.product.index", compact("product", "productInformation"));
    }
}

<?php

namespace App\Http\Controllers\Shop;

use App\Components\CollectionHelper;
use App\Models\Catalog\Brand;
use App\Models\Catalog\BrandProduct;
use App\Models\Catalog\Product;
use Illuminate\Http\Request;

class BrandController
{
    public function index(Request $request, $name)
    {
        $brand = Brand::where(["name" => $name])->first();

        $brandProducts = BrandProduct::where(["brand_id" => $brand->id])->get();
        $products = Product::whereIn("id", $brandProducts->pluck("product_id"))->get();

        $products = CollectionHelper::paginate($products, $products->count(), 9);

        return view("shop.brand.index", compact("brand", "products"));
    }
}

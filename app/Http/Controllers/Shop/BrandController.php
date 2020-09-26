<?php

namespace App\Http\Controllers\Shop;

use App\Components\CollectionHelper;
use App\Facade\Shop;
use App\Models\Catalog\Brand;
use App\Models\Catalog\Category;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class BrandController
{
    public function index(Request $request, $name)
    {
        $brand = Brand::where(["name" => $name])->first();

        VarDumper::dump($brand);
        die();

        $products = Shop::getProductsFromCategory($category);

        $products = CollectionHelper::paginate($products, $products->count(), 9);

        return view("shop.category.index", compact("category", "products"));
    }
}

<?php

namespace App\Http\Controllers\Shop;

use App\Facade\Shop;
use App\Models\Catalog\Category;
use Illuminate\Http\Request;

class CategoryController
{
    public function index(Request $request, $name)
    {
        $category = Category::where(["name" => $name])->first();
        $products = Shop::getProductsFromCategory($category);

        $products = collect($products)->take(12);

        return view("shop.category.index", compact("category", "products"));
    }
}

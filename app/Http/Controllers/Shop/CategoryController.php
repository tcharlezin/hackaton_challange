<?php

namespace App\Http\Controllers\Shop;

use App\Components\CollectionHelper;
use App\Facade\Shop;
use App\Models\Catalog\Category;
use Illuminate\Http\Request;

class CategoryController
{
    public function index(Request $request, $name)
    {
        $category = Category::where(["name" => $name])->first();
        $products = Shop::getProductsFromCategory($category);

        $products = CollectionHelper::paginate($products, $products->count(), 9);

        return view("shop.category.index", compact("category", "products"));
    }
}

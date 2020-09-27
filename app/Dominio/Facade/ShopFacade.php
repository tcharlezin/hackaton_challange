<?php

namespace App\Dominio\Facade;

use App\Models\Catalog\Category;
use App\Models\Catalog\Product;
use DB;

class ShopFacade
{
    public function getCategoriesMenu()
    {
        $query = "
            SELECT count(product_id) as nproducts, category_id
            FROM category_product
            GROUP BY category_id
            ORDER BY nproducts DESC
            LIMIT 7;
        ";

        $rows = \DB::select($query);

        $categories = Category::whereIn("id", collect($rows)->pluck("category_id"))->get();
        return $categories;
    }

    public function getProductsFromCategory(Category $category)
    {
        $query = sprintf("
            SELECT product_id
            FROM category_product
            WHERE category_id = %s;
        ", $category->id);

        $rows = \DB::select($query);

        $products = Product::whereIn("id", collect($rows)->pluck("product_id"))->get();
        return $products;
    }

    public function getProductsToShow($amount)
    {
        return \App\Models\Catalog\Product::all()->random($amount);
    }

    public function getCategoryToShow($amount)
    {
        return \App\Models\Catalog\Category::all()->random($amount);
    }

    public function getBrandToShow($amount)
    {
        return \App\Models\Catalog\Brand::all()->random($amount);
    }
}

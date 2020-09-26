<?php

namespace App\Http\Controllers\Shop;

use App\Dominio\Catalog\ProductInformation;
use App\Dominio\Catalog\ProductScoreRecomendation;
use App\Models\Catalog\CategoryProduct;
use App\Models\Catalog\Product;
use Illuminate\Http\Request;
use Phpml\Clustering\KMeans;

class ProductController
{
    public function index(Request $request, $name)
    {
        $product = Product::where(["name" => $name])->first();
        $productInformation = (new ProductInformation($product->id))->get();

        $productsRecomened = $this->recomendation($product);

        return view("shop.product.index", compact("product", "productInformation", "productsRecomened"));
    }

    private function recomendation(Product $productDefault)
    {
        $defaultRecomendation = (new ProductScoreRecomendation($productDefault->id))->get();

        $products = $this->getProductsFromSharedCategory($productDefault);

        $studentsInfo=[];

        $studentsInfo["{$productDefault->id}"] = array_values($defaultRecomendation);

        foreach($products as $product)
        {
            $data = array_values((new ProductScoreRecomendation($product->id))->get());
            $studentsInfo["{$product->id}"] = $data;
        }

        $kmeans = new KMeans(10);
        $groups = $kmeans->cluster($studentsInfo);

        foreach ($groups as $group)
        {
            if(! array_key_exists("{$productDefault->id}", $group))
            {
                continue;
            }

            return $this->processGroup($group);
        }

        return [];
    }

    private function processGroup($groups)
    {
        $products = collect();

        foreach($groups as $productId => $data)
        {
            $products->push(Product::find($productId));
        }

        return $products->take(8);
    }

    private function getProductsFromSharedCategory(Product $product)
    {
        $categoryProducts = CategoryProduct::where(["product_id" => $product->id])->get();

        $categoryProducts = CategoryProduct::whereIn("category_id", $categoryProducts->pluck("category_id"))->get();

        $products = Product::whereIn("id", $categoryProducts->pluck("product_id")->unique())->get()->random(200);

        return $products;
    }
}

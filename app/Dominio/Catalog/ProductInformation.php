<?php

namespace App\Dominio\Catalog;

use App\Models\Catalog\Product;

class ProductInformation
{
    private $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function get()
    {
        $data = $this->generateSkusInformation();

        $data["categories"] = $this->getCategories();
        $data["brands"] = $this->getBrands();
        $data["name"] = $this->getName();
        $data["images"] = $this->getImages();

        if(isset($data["attribute"]))
        {
            foreach($data["attribute"] as $keyName => $attribute)
            {
                $data[$keyName] = $attribute;
            }

            unset($data["attribute"]);
        }

        return $data;
    }

    private function generateSkusInformation()
    {
        $query = sprintf('
        SELECT sku.product_id as productId, seller.name as seller, sku.name as sku, sku.price as price, attr.name as attribute, attrs.value as value
        FROM attributes as attr
        INNER JOIN attribute_sku as attrs
        ON attr.id = attrs.attribute_id
        AND attrs.sku_id
        IN ( select id from skus where product_id = %s)
        INNER JOIN skus as sku
        ON sku.id = attrs.sku_id
        INNER JOIN sellers as seller
        ON seller.id = sku.seller_id;', $this->productId);

        $rows = \DB::select($query);

        $indexData = [];

        foreach($rows as $row)
        {
            $indexData["seller"][] = $row->seller;
            $indexData["sku"][] = $row->sku;
            $indexData["price"][] = $row->price;
            $indexData["attribute"][$row->attribute][] = $row->value;
        }

        $resultData = [];

        if(isset($indexData["seller"]))
        {
            $indexData["seller"] = array_unique($indexData["seller"]);
        }

        if(isset($indexData["sku"]))
        {
            $indexData["sku"] = array_unique($indexData["sku"]);
        }

        if(isset($indexData["price"]))
        {
            $indexData["price"] = array_unique($indexData["price"]);
        }

        if(!isset($indexData["attribute"]))
        {
            return $indexData;
        }

        $newAttributes = [];
        foreach($indexData["attribute"] as $attributeName => $information)
        {
            $newAttributes[$attributeName] = array_unique($information);
        }
        $indexData["attribute"] = $newAttributes;

        return $indexData;
    }

    private function getCategories()
    {
        $query = sprintf("
        SELECT DISTINCT(cat.name)
        FROM category_product as cp
        INNER JOIN categories as cat
        ON cp.category_id = cat.id
        WHERE cp.product_id = %s;", $this->productId);

        $rows = \DB::select($query);

        $response = [];

        foreach($rows as $row)
        {
            $response[] = $row->name;
        }

        return $response;
    }

    private function getName()
    {
        return Product::find($this->productId)->name;
    }

    private function getImages()
    {
        $query = sprintf("
            SELECT img.url
            FROM image_product as imgprod
            INNER JOIN images as img
            ON img.id = imgprod.image_id
            WHERE imgprod.product_id = %s
        ;", $this->productId);

        $rows = \DB::select($query);

        $response = [];

        foreach($rows as $row)
        {
            $response[] = $row->url;
        }

        $query = sprintf("
        SELECT distinct(img.url)
          FROM image_sku as imgsku
    INNER JOIN images as img
            ON img.id = imgsku.image_id
           AND imgsku.sku_id IN (SELECT id FROM skus WHERE product_id = %s);", $this->productId);

        $rows = \DB::select($query);

        foreach($rows as $row)
        {
            $response[] = $row->url;
        }

        return array_unique($response);
    }

    private function getBrands()
    {
        $query = sprintf("
            SELECT bra.name
              FROM brand_product as brapro
        INNER JOIN brands as bra
                ON bra.id = brapro.brand_id
             WHERE brapro.product_id = %s;", $this->productId);

        $rows = \DB::select($query);

        foreach($rows as $row)
        {
            $response[] = $row->name;
        }

        return array_unique($response);
    }

}

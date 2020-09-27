<?php

namespace App\Dominio\Catalog;

class ProductScoreRecomendation
{
    private $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function get()
    {
        $data = $this->generateSkusInformation();

        $data["brands"] = $this->getBrands();
        $data["images"] = $this->getImages();

        // $data = $this->solutionWithSum($data);
        $data = $this->solutionWithLogImplode($data);

        return $data;
    }

    private function solutionWithLogImplode($data)
    {
        $data = $this->processPreData($data);

        $data["seller"] = log(implode("", $data["seller"]));
        $data["sku"] = log(implode("", $data["sku"]));
        $data["price"] = log((float) implode("", $data["price"]));
        $data["attribute"] = log(implode("", $data["attribute"]));
        $data["brands"] = log(implode("", $data["brands"]));
        $data["images"] = log(implode("", $data["images"]));

        return $data;
    }

    private function solutionWithSum($data)
    {
        $data = $this->processPreData($data);

        $data["seller"] = log(array_sum($data["seller"]));
        $data["sku"] = log(array_sum($data["sku"]));
        $data["price"] = log(array_sum($data["price"]));
        $data["attribute"] = log(array_sum($data["attribute"]));
        $data["brands"] = log(array_sum($data["brands"]));
        $data["images"] = log(array_sum($data["images"]));
        return $data;
    }

    private function processPreData($data)
    {
        if(isset($data["seller"]))
        {
            rsort($data["seller"]);
        }
        else
        {
            $data["seller"] = [0];
        }

        if(isset($data["sku"]))
        {
            rsort($data["sku"]);
        }
        else
        {
            $data["sku"] = [0];
        }

        if(isset($data["price"]))
        {
            rsort($data["price"]);
        }
        else
        {
            $data["price"] = [0];
        }

        if(isset($data["attribute"]))
        {
            rsort($data["attribute"]);
        }
        else
        {
            $data["attribute"] = [0];
        }

        if(isset($data["brands"]))
        {
            rsort($data["brands"]);
        }
        else
        {
            $data["brands"] = [0];
        }

        if(isset($data["images"]))
        {
            rsort($data["images"]);
        }
        else
        {
            $data["images"] = [0];
        }

        return $data;
    }

    private function generateSkusInformation()
    {
        $query = sprintf('
        SELECT
            sku.product_id as productId,
            seller.id as sellerId,
            sku.id as skuId,
            sku.price as price,
            attr.id as attributeId

          FROM attributes as attr
    INNER JOIN attribute_sku as attrs
            ON attr.id = attrs.attribute_id
           AND attrs.sku_id
            IN ( select id from skus where product_id = %s)
    INNER JOIN skus as sku
            ON sku.id = attrs.sku_id
    INNER JOIN sellers as seller
            ON seller.id = sku.seller_id;
        ', $this->productId);

        $rows = \DB::select($query);

        $indexData = [];

        foreach($rows as $row)
        {
            $indexData["seller"][] = $row->sellerId;
            $indexData["sku"][] = $row->skuId;
            $indexData["price"][] = $row->price;
            $indexData["attribute"][] = $row->attributeId;
        }

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

        if(isset($indexData["attribute"]))
        {
            $indexData["attribute"] = array_unique($indexData["attribute"]);
        }

        return $indexData;
    }

    private function getImages()
    {
        $query = sprintf("
            SELECT img.id
            FROM image_product as imgprod
            INNER JOIN images as img
            ON img.id = imgprod.image_id
            WHERE imgprod.product_id = %s
        ;", $this->productId);

        $rows = \DB::select($query);

        $response = [];

        foreach($rows as $row)
        {
            $response[] = $row->id;
        }

        $query = sprintf("
        SELECT distinct(img.id)
          FROM image_sku as imgsku
    INNER JOIN images as img
            ON img.id = imgsku.image_id
           AND imgsku.sku_id IN (SELECT id FROM skus WHERE product_id = %s);", $this->productId);

        $rows = \DB::select($query);

        foreach($rows as $row)
        {
            $response[] = $row->id;
        }

        return array_unique($response);
    }

    private function getBrands()
    {
        $query = sprintf("
            SELECT bra.id
              FROM brand_product as brapro
        INNER JOIN brands as bra
                ON bra.id = brapro.brand_id
             WHERE brapro.product_id = %s;", $this->productId);

        $rows = \DB::select($query);

        foreach($rows as $row)
        {
            $response[] = $row->id;
        }

        return array_unique($response);
    }

}

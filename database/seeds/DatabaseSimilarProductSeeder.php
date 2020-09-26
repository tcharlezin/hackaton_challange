<?php

use App\Models\Catalog\Attribute;
use App\Models\Catalog\Category;
use App\Models\Catalog\Product;
use App\Models\Catalog\Seller;
use App\Models\Catalog\Sku;
use Illuminate\Database\Seeder;

class DatabaseSimilarProductSeeder extends Seeder
{
    protected $header;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $file = database_path('data/FACL_products.csv');

        $handle = fopen($file, 'r');

        $lineNumber = 1;

        $erros = collect();

        while (($raw_string = fgets($handle)) !== false)
        {
            try
            {
                if($lineNumber == 1)
                {
                    $this->header = str_getcsv(trim($raw_string));
                    $lineNumber++;
                    continue;
                }

                $sku = $this->parseData(trim($raw_string), $lineNumber);

                $categories = explode(
                    ',',
                    ltrim(rtrim($sku['PRODUCT_PARENT_CATEGORY_NAMES'], '"'), '"')
                );

                $currentParentCatId = null;

                $categoryCollection = collect();

                foreach ($categories as $key => $categoryName)
                {
                    $category = Category::where(["name" => $categoryName])->first();

                    if(is_null($category))
                    {
                        $category = Category::create([
                            'name' => $categoryName
                        ]);
                        $categoryCollection->push($category);
                    }
                    else
                    {
                        $categoryCollection->push($category);
                    }
                }

                $product = Product::where(["code" => $sku['PRODUCT_ID']])->first();

                if(is_null($product))
                {
                    $product = Product::create([
                        'code' => $sku['PRODUCT_ID'],
                        'name' => $sku['PRODUCT_NAME'],
                    ]);
                }

                $seller = Seller::where(["name" => $sku['VARIANT_SELLER_ID']])->first();

                if(is_null($seller))
                {
                    $seller = Seller::firstOrCreate([
                        'name' => $sku['VARIANT_SELLER_ID']
                    ]);
                }

                $newSku = Sku::where(["code" => $sku['SKU_ID']])->first();

                if(is_null($newSku))
                {
                    $newSku = Sku::create([
                        'code' => $sku['SKU_ID'],
                        'name' => $sku['VARIANT_NAME'],
                        'product_id' => $product->id,
                        'price' => $sku['PRICE_NORMAL_DEFAULT'] / 100,
                        'seller_id' => $seller->id,
                    ]);
                }
                else
                {
                    continue;
                }

                foreach($categoryCollection as $category)
                {
                    $dataCategoryProduct = [
                        "category_id" => $category->id,
                        "product_id" => $product->id,
                    ];

                    $categoryProduct = \App\Models\Catalog\CategoryProduct::where($dataCategoryProduct)->first();

                    if(is_null($categoryProduct))
                    {
                        \App\Models\Catalog\CategoryProduct::create($dataCategoryProduct);
                    }
                }

                $brand = \App\Models\Catalog\Brand::where(["name" => $sku['PRODUCT_BRAND_NAME']])->first();

                if(is_null($brand))
                {
                    $brand = \App\Models\Catalog\Brand::create([
                        'name' => $sku['PRODUCT_BRAND_NAME']
                    ]);
                }

                $dataBrandProduct = [
                    "brand_id" => $brand->id,
                    "product_id" => $product->id,
                ];

                $brandProduct = \App\Models\Catalog\BrandProduct::where($dataBrandProduct)->first();

                if(is_null($brandProduct))
                {
                    \App\Models\Catalog\BrandProduct::create($dataBrandProduct);
                }

                $skuImage = \App\Models\Catalog\Image::where(["url" => $sku['SKU_ID_PHOTO_URL'] ])->first();
                if(is_null($skuImage))
                {
                    $skuImage = \App\Models\Catalog\Image::create(["url" => $sku['SKU_ID_PHOTO_URL'] ]);
                    \App\Models\Catalog\ImageSku::create([
                        "sku_id" => $newSku->id,
                        "image_id" => $skuImage->id,
                    ]);
                }

                $productImage = \App\Models\Catalog\Image::where(["url" => $sku['PRODUCT_ID_PHOTO_URL'] ])->first();
                if(is_null($productImage))
                {
                    $productImage = \App\Models\Catalog\Image::create(["url" => $sku['PRODUCT_ID_PHOTO_URL'] ]);
                    \App\Models\Catalog\ImageProduct::create([
                        "product_id" => $product->id,
                        "image_id" => $productImage->id,
                    ]);
                }

                try
                {
                    $attributes = explode("; ", $sku['ALL_PRODUCT_ATTRIBUTES']);

                    $saveAttribute = [];

                    foreach($attributes as $index => $tempAttributes)
                    {
                        $attributeArray = explode(": ", $tempAttributes);

                        if(! isset($attributeArray[1]))
                        {
                            $saveAttribute[$index] = $attributeArray[0];
                        }
                    }

                    // Validate if is correct string to attributes
                    if(! collect($saveAttribute)->isEmpty())
                    {
                        foreach($saveAttribute as $index => $saveAttributeTmp)
                        {
                            if($index > 0)
                            {
                                $attributes[$index-1] = $attributes[$index-1] . "; " . $saveAttributeTmp;
                            }

                            unset($attributes[$index]);
                        }
                    }

                    foreach($attributes as $attributeCurrent)
                    {
                        $pos = (strpos($attributeCurrent, '-')+1);
                        $attributeClean = substr($attributeCurrent, $pos, strlen($attributeCurrent));

                        if(strlen(trim($attributeClean)) == 0)
                        {
                            continue;
                        }

                        $attributeArray = explode(": ", $attributeClean);

                        $attributeName = $attributeArray[0];

                        // TODO: Need to fix
                        if(! isset($attributeArray[1]))
                        {
                            continue;
                        }

                        $attributeValue = $attributeArray[1];

                        $attribute = Attribute::where(["name" => $attributeName])->first();
                        if(is_null($attribute))
                        {
                            $attribute = Attribute::create(
                                [
                                    "name" => $attributeName,
                                    "has_options" => false
                                ]
                            );
                        }

                        $dataAttributeSku = [
                            'sku_id' => $newSku->id,
                            'attribute_id' => $attribute->id,
                            'value' => $attributeValue,
                            'featured' => false,
                        ];

                        $attributeSku = \App\Models\Catalog\AttributeSku::where($dataAttributeSku)->first();
                        if(is_null($attributeSku))
                        {
                            $attributeSku = \App\Models\Catalog\AttributeSku::create($dataAttributeSku);
                        }
                    }

                    $variantColorGroup = $sku['VARIANT_ATTR_COLOR_GROUP'];
                    if($variantColorGroup)
                    {
                        $attribute = Attribute::where(["name" => "Cor Grupo"])->first();
                        if(is_null($attribute))
                        {
                            $attribute = Attribute::create(["name" => "Cor Grupo", "has_options" => false]);
                        }

                        $dataAttributeSku = [
                            'sku_id' => $newSku->id,
                            'attribute_id' => $attribute->id,
                            'value' => $variantColorGroup,
                            'featured' => false,
                        ];

                        $attributeSku = \App\Models\Catalog\AttributeSku::where($dataAttributeSku)->first();
                        if(is_null($attributeSku))
                        {
                            $attributeSku = \App\Models\Catalog\AttributeSku::create($dataAttributeSku);
                        }
                    }

                    $variantPrimaryColor = $sku['VARIANT_ATTR_PRIMARY_COLOR'];
                    if($variantPrimaryColor)
                    {
                        $attribute = Attribute::where(["name" => "Cor Primaria"])->first();
                        if(is_null($attribute))
                        {
                            $attribute = Attribute::create(["name" => "Cor Primaria", "has_options" => false]);
                        }

                        $dataAttributeSku = [
                            'sku_id' => $newSku->id,
                            'attribute_id' => $attribute->id,
                            'value' => $variantPrimaryColor,
                            'featured' => false,
                        ];

                        $attributeSku = \App\Models\Catalog\AttributeSku::where($dataAttributeSku)->first();
                        if(is_null($attributeSku))
                        {
                            $attributeSku = \App\Models\Catalog\AttributeSku::create($dataAttributeSku);
                        }
                    }

                    $variantSize = $sku['VARIANT_ATTR_SIZE'];
                    if($variantSize)
                    {
                        $attribute = Attribute::where(["name" => "Size"])->first();
                        if(is_null($attribute))
                        {
                            $attribute = Attribute::create(["name" => "Size", "has_options" => false]);
                        }

                        $dataAttributeSku = [
                            'sku_id' => $newSku->id,
                            'attribute_id' => $attribute->id,
                            'value' => $variantSize,
                            'featured' => false,
                        ];

                        $attributeSku = \App\Models\Catalog\AttributeSku::where($dataAttributeSku)->first();
                        if(is_null($attributeSku))
                        {
                            $attributeSku = \App\Models\Catalog\AttributeSku::create($dataAttributeSku);
                        }
                    }
                }
                catch (Exception $ex)
                {
                    \Symfony\Component\VarDumper\VarDumper::dump(sprintf("erro na sku %s ", $newSku->id));
                    $erros->push($sku);
                    continue;
                }
            }
            catch (\Throwable $th)
            {
                continue;
            }

            $lineNumber++;
        }

        fclose($handle);

        echo $erros->toJson();
    }

    public function parseData($sku, $key)
    {
        $sku = str_replace('"",""', ',', $sku);
        $sku = str_replace('\""', "'", $sku);
        $sku = str_replace('\"', '"', $sku);
        $sku = str_replace('""""', '"', $sku);

        $sku = str_getcsv(trim($sku), ',');

        if(count($this->header) != count($sku)) {
            throw new Exception('There was a problema with your CSV file ate line ' . $key);
        }

        return array_combine($this->header, $sku);
    }
}

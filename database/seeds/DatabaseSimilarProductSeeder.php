<?php

use App\Models\Catalog\Sku;
use Illuminate\Support\Str;
use App\Models\Catalog\Brand;
use App\Models\Catalog\Image;
use App\Models\Catalog\Seller;
use App\Models\Catalog\Product;
use Illuminate\Database\Seeder;
use App\Models\Catalog\Category;
use App\Models\Catalog\ImageSku;
use App\Models\Catalog\Attribute;
use Illuminate\Support\Facades\DB;
use App\Models\Catalog\AttributeSku;
use App\Models\Catalog\BrandProduct;
use App\Models\Catalog\ImageProduct;
use App\Models\Catalog\CategoryProduct;
use Symfony\Component\VarDumper\VarDumper;

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
        DB::connection()->getPdo()
        ->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

        $file = database_path('data/FACL_products-csv.tsv');

        $handle = fopen($file, 'r');

        $lineNumber = 1;

        $erros = collect();

        while (($raw_string = fgets($handle)) !== false)
        {
            try
            {
                if($lineNumber == 1)
                {
                    $this->header = str_getcsv($raw_string, "\t");
                    $lineNumber++;
                    continue;
                }

                $sku = $this->parseData(trim($raw_string), $lineNumber);

                $categories = explode('>',$sku['PRODUCT_PARENT_CATEGORY_NAMES']);

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
                        'price' => $sku['PRICE_NORMAL_DEFAULT'],
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

                    $categoryProduct = CategoryProduct::where($dataCategoryProduct)->first();

                    if(is_null($categoryProduct))
                    {
                        CategoryProduct::create($dataCategoryProduct);
                    }
                }

                $brand = Brand::where(["name" => $sku['PRODUCT_BRAND_NAME']])->first();

                if(is_null($brand))
                {
                    $brand = Brand::create([
                        'name' => $sku['PRODUCT_BRAND_NAME']
                    ]);
                }

                $dataBrandProduct = [
                    "brand_id" => $brand->id,
                    "product_id" => $product->id,
                ];

                $brandProduct = BrandProduct::where($dataBrandProduct)->first();

                if(is_null($brandProduct))
                {
                    BrandProduct::create($dataBrandProduct);
                }

                $skuImage = Image::where(["url" => $sku['SKU_ID_PHOTO_URL'] ])->first();
                if(is_null($skuImage))
                {
                    $skuImage = Image::create(["url" => $sku['SKU_ID_PHOTO_URL'] ]);
                    ImageSku::create([
                        "sku_id" => $newSku->id,
                        "image_id" => $skuImage->id,
                    ]);
                }

                $productImage = Image::where(["url" => $sku['PRODUCT_ID_PHOTO_URL'] ])->first();
                if(is_null($productImage))
                {
                    $productImage = Image::create(["url" => $sku['PRODUCT_ID_PHOTO_URL'] ]);
                    ImageProduct::create([
                        "product_id" => $product->id,
                        "image_id" => $productImage->id,
                    ]);
                }

                try
                {
                    $attributes = explode("|", $sku['ALL_PRODUCT_ATTRIBUTES']);

                    foreach($attributes as $attributeCurrent)
                    {
                        $attributeArray = explode(":", $attributeCurrent);

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

                        $attributeSku = AttributeSku::where($dataAttributeSku)->first();
                        if(is_null($attributeSku))
                        {
                            $attributeSku = AttributeSku::create($dataAttributeSku);
                        }
                    }

                    $variantColorGroup = $sku['VARIANT_ATTR_COLOR_GROUP'];
                    if($variantColorGroup)
                    {
                        $attribute = Attribute::where(["name" => "Colorr Grupo"])->first();
                        if(is_null($attribute))
                        {
                            $attribute = Attribute::create(["name" => "Colorr Grupo", "has_options" => false]);
                        }

                        $dataAttributeSku = [
                            'sku_id' => $newSku->id,
                            'attribute_id' => $attribute->id,
                            'value' => $variantColorGroup,
                            'featured' => false,
                        ];

                        $attributeSku = AttributeSku::where($dataAttributeSku)->first();
                        if(is_null($attributeSku))
                        {
                            $attributeSku = AttributeSku::create($dataAttributeSku);
                        }
                    }

                    $variantPrimaryColor = $sku['VARIANT_ATTR_PRIMARY_COLOR'];
                    if($variantPrimaryColor)
                    {
                        $attribute = Attribute::where(["name" => "Color Primario"])->first();
                        if(is_null($attribute))
                        {
                            $attribute = Attribute::create(["name" => "Color Primario", "has_options" => false]);
                        }

                        $dataAttributeSku = [
                            'sku_id' => $newSku->id,
                            'attribute_id' => $attribute->id,
                            'value' => $variantPrimaryColor,
                            'featured' => false,
                        ];

                        $attributeSku = AttributeSku::where($dataAttributeSku)->first();
                        if(is_null($attributeSku))
                        {
                            $attributeSku = AttributeSku::create($dataAttributeSku);
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

                        $attributeSku = AttributeSku::where($dataAttributeSku)->first();
                        if(is_null($attributeSku))
                        {
                            $attributeSku = AttributeSku::create($dataAttributeSku);
                        }
                    }
                }
                catch (Exception $ex)
                {
                    VarDumper::dump(sprintf("erro na sku %s ", $newSku->id));
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

    public function parseData($text, $key)
    {
        $sku = str_getcsv(trim($text), "\t");

        if(count($sku) == 20 && Str::endsWith($text, "70\n")) {
            $sku[] = '';
        }

        if(count($this->header) != count($sku)) {
            throw new Exception('There was a problema with your CSV file ate line ' . $key);
        }

        return array_combine($this->header, $sku);
    }
}

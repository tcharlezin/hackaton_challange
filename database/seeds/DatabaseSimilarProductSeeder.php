<?php

use App\Models\Catalog\Attribute;
use App\Models\Catalog\Category;
use App\Models\Catalog\Product;
use App\Models\Catalog\Seller;
use App\Models\Catalog\Sku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // Read a CSV file
        $handle = fopen($file, 'r');

        // Optionally, you can keep the number of the line where
        // the loop its currently iterating over
        $lineNumber = 1;

        // Iterate over every line of the file
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

                // Parse the raw csv string: "1, a, b, c"
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
                    \Symfony\Component\VarDumper\VarDumper::dump($newSku);
                    \Symfony\Component\VarDumper\VarDumper::dump("Sku ja existe!");
                    die();
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


                \Symfony\Component\VarDumper\VarDumper::dump($sku['ALL_PRODUCT_ATTRIBUTES']);
                die();
                
                // ALL_PRODUCT_ATTRIBUTES


                $newSku->attributes()->attach(
                    Attribute::firstOrCreate([
                        'name' => 'gender',
                        'has_options' => 0,
                    ])->id,
                    [
                        'value' => $sku['PRODUCT_GENDER'],
                        'featured' => 0,
                    ]
                );

                //     "ALL_PRODUCT_ATTRIBUTES" => "1-Breteles ajustables: Sin breteles; 2-Diseño: Liso; 3-Género: Mujer; 4-Modelo (Internet): 6868CINTUR; 5-Tipo de control: Medio; 6-Tipo: Fajas post quirúrgicas"


                // array:21 [
                //     "SKU_ID" => "764953"
                //     "PRODUCT_ID" => "764941"
                //     "PRODUCT_BRAND_NAME" => "MAIDENFORM"
                //     "PRODUCT_NAME" => "Faja modeladora control medio"
                //     "PRODUCT_GENDER" => "Mujer"
                //     "PRODUCT_AVG_OVERALL_RATING" => ""
                //     "PRODUCT_MERCHANT_CATEGORY_ID" => "J06010301"
                //     "PRODUCT_PARENT_CATEGORY_NAMES" => ""Fajas y Modeladores,Trajes de Banos y Bikinis,Triumph""
                //     "PRODUCT_ATTR_FORMATO" => ""
                //     "PRODUCT_ATTR_TOP_SPECIFICATIONS" => ""Modelo: 6868CINTUR,Tipo: Fajas post quirúrgicas,Género: Mujer,Tipo de control: Medio,Breteles ajustables: Sin breteles""
                //     "PRODUCT_ATTR_MODELO" => "6868CINTUR"
                //     "PRODUCT_ATTR_TIPO" => "Fajas post quirúrgicas"
                //     "VARIANT_NAME" => "Faja modeladora control medio"
                //     "VARIANT_ATTR_COLOR_GROUP" => "Beige"
                //     "VARIANT_ATTR_PRIMARY_COLOR" => "Beige"
                //     "VARIANT_ATTR_SIZE" => "l"
                //     "VARIANT_SELLER_ID" => "FALABELLA"
                //     "PRICE_NORMAL_DEFAULT" => "29900"
                //     "SKU_ID_PHOTO_URL" => "https://falabella.scene7.com/is/image/Falabella/764953_1?wid=500&hei=500&qlt=70"
                //     "PRODUCT_ID_PHOTO_URL" => "https://falabella.scene7.com/is/image/Falabella/764941_1?wid=500&hei=500&qlt=70"
                //     "ALL_PRODUCT_ATTRIBUTES" => "1-Breteles ajustables: Sin breteles; 2-Diseño: Liso; 3-Género: Mujer; 4-Modelo (Internet): 6868CINTUR; 5-Tipo de control: Medio; 6-Tipo: Fajas post quirúrgicas"
                //   ]

                DB::commit();
            } catch (\Throwable $th) {
                dd($th);
                DB::rollBack();
                die();
            }
            // Increase the current line
            $lineNumber++;
        }


        fclose($handle);
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

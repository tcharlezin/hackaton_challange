<?php

namespace App\Console\Commands;

use App\Models\Catalog\Sku;
use Illuminate\Console\Command;
use Symfony\Component\VarDumper\VarDumper;

class VerifySkus extends Command
{
    protected $signature = 'verify-skus';

    protected $description = 'Verify imported skus';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $file = database_path('data/FACL_products.csv');

        $handle = fopen($file, 'r');

        $lineNumber = 1;

        $lista = collect();

        while (($raw_string = fgets($handle)) !== false)
        {
            if($lineNumber == 1)
            {
                $this->header = str_getcsv(trim($raw_string));
                $lineNumber++;
                continue;
            }

            $sku = $this->parseData(trim($raw_string), $lineNumber);
            $lista->push($sku['SKU_ID']);
            $lineNumber++;
        }
        fclose($handle);

        Sku::chunk(5000, function($skuChunk) use (&$lista){

            $tempArray = $skuChunk->pluck("code");
            $lista = $lista->diff($tempArray);

            VarDumper::dump($lista->count() . " - " . $tempArray->count());
        });

        VarDumper::dump($lista);
    }


    public function temp()
    {
        $file = database_path('data/FACL_products.csv');

        $handle = fopen($file, 'r');

        $lineNumber = 1;

        $erros = collect();

        $lista = [];

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

                $lista[] = $sku['SKU_ID'];
                $newSku = Sku::where(["code" => $sku['SKU_ID']])->first();

                if(! is_null($newSku))
                {
                    echo $lineNumber . "\n";
                    $lineNumber++;
                    continue;
                }

                $lineNumber++;

                $erros->push($sku['SKU_ID']);
            }
            catch (\Throwable $th)
            {
                continue;
            }
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

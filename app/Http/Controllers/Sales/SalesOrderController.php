<?php

namespace App\Http\Controllers\Sales;

use App\Models\Catalog\Product;
use App\Models\Sales\SalesOrder;
use App\Models\Sales\SalesOrderItem;
use App\Models\Stock\Production;
use App\Models\Stock\StockHistory;
use DB;
use Illuminate\Http\Request;

class SalesOrderController
{

    public function new()
    {
        return view("admin.sales.new.index");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $product = Product::find($data["product_id"]);
        $production = Production::where(["product_id" => $product->id])->first();

        $salesOrder = SalesOrder::create([
            "status" => SalesOrder::AGUARDANDO
        ]);

        SalesOrderItem::create([
            "sales_order_id" => $salesOrder->id,
            "product_id" => $product->id,
        ]);

        return response()->redirectTo(route("admin.sales.lista"));
    }

    public function lista()
    {
        return view("admin.sales.lista.index");
    }

    public function fabricar($id)
    {
        try
        {
            DB::beginTransaction();

            $salesOrder = SalesOrder::find($id);

            foreach($salesOrder->items as $salesOrderItem)
            {
                $product = $salesOrderItem->product;
                $production = $product->production;

                foreach($production->items as $item)
                {
                    // TODO: Validar se tem estoque antes de produzir

                    $material = $item->material;

                    if(! $material->temEstoque($item->unity, $item->amount))
                    {
                        throw new \Exception("Não há estoque disponível! Verifique os materiais!");
                    }

                    $stockHistory = StockHistory::create([
                        'material_id' => $item->material->id,
                        'unity_id' => $item->unity->id,
                        'type' => StockHistory::SUBTRAI,
                        'amount' => $item->amount,
                        'sales_order_id' => $salesOrder->id,
                        'product_id' => $product->id,
                        'price' => 0,
                    ]);

                }
            }

            $salesOrder->update(["status" => SalesOrder::FINALIZADO]);

            DB::commit();

            return response()->redirectTo(route("admin.sales.lista"));
        }
        catch (\Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}

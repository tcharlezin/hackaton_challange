@extends('admin.layouts.app')

@section('conteudo')

    <div id="page-head">

        <hr class="new-section-sm bord-no">
        <div class="text-center">
            <h3>Lista de pedidos</h3>
            <p>Selecione qual vai fabricar.</p>
        </div>
    </div>

    <div id="page-content">
        <div class="row">

            <div class="panel">
                <div class="panel-body">

                    <div class="row">

                        @php
                            $salesOrders = \App\Models\Sales\SalesOrder::orderByDesc("id")->get();
                        @endphp

                        <table class="table table-hover table-vcenter">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Código</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Produto</th>
                                <th class="text-center">Total R$</th>
                                <th class="text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($salesOrders as $saleOrder)

                                    @foreacH($saleOrder->items as $item)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ $item->product->image}}" style="max-width: 100px; max-width: 100px">
                                            </td>
                                            <td class="text-center">
                                                {{ $saleOrder->id}}
                                            </td>
                                            <td class="text-center">
                                                {{ $saleOrder->created_at->format("d/m/Y H:i:s")}}
                                            </td>
                                            <td class="text-center">
                                                <span class="text-main text-semibold">{{ $item->product->name }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-main text-semibold">{{ number_format($item->product->getRawOriginal("price"), 2, ",", ".") }}</span>
                                            </td>
                                            <td class="text-center">


                                                @if($saleOrder->status == 1)
                                                    <a href="{{route("admin.sales.fabricar", $saleOrder->id)}}" class="btn btn-success">Fabricar</a>
                                                @endif

                                                @if($saleOrder->status == 2)
                                                    Fabricando...
                                                @endif

                                                @if($saleOrder->status == 3)
                                                        Fabricado
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

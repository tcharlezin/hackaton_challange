@extends('admin.layouts.app')

@section('conteudo')

    <div id="page-head">

        <hr class="new-section-sm bord-no">
        <div class="text-center">
            <h3>Novo Pedido</h3>
            <p>Selecione o produto.</p>
        </div>
    </div>

    <div id="page-content">
        <div class="row">

            <div class="panel">
                <div class="panel-body">

                    <div class="row">

                        @php
                            $list = \App\Models\Catalog\Product::all()->chunk(4);
                        @endphp

                        @foreach($list as $key => $products)

                            <div class="row">
                            @foreach($products as $product)

                                @if(! $product->hasFabricacao())
                                    @continue;
                                @endif

                                <div class="col-md-3">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                {{ $product->name }} - R$ {{ number_format($product->getRawOriginal("price"), 2, ",", ".") }}
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="text-center">
                                                <img src="{{ $product->getImagem() }}" style="max-height: 150px; max-width: 150px; min-height: 150px; min-width: 150px">
                                            </div>
                                            <p class="text-center">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                        <div class="panel-footer text-center">

                                            {!! Form::open(['route'=>"admin.sales.new.store", 'id'=>'formSalvar' ]) !!}

                                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                                <button class="btn btn-success">Comprar</button>

                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

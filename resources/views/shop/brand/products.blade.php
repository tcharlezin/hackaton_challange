@php
    $productsGroups = $products->chunk(3);
@endphp

@foreach($productsGroups as $productsX)

    <div class="row">
        @foreach($productsX as $product)

            @php
                $productInformation = (new \App\Dominio\Catalog\ProductInformation($product->id))->get();

                $brandName = $brand->name;
                $name = $productInformation["name"];
                $productImage = $productInformation["images"][0];
                $productPrice = $productInformation["price"][0];
            @endphp

            <div class="col-md-4 col-xs-6">
                <a href="{{route("shop.product.index", $product->name)}}">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ $productImage }}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $brandName }}</p>
                            <h3 class="product-name"><a href="#">{{ $name }}</a></h3>
                            <h4 class="product-price">${{$productPrice}} </h4>
                            <div class="product-btns">
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /product -->

        @endforeach

        <div class="clearfix"></div>
    </div>
@endforeach

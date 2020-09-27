<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Random Products</h3>
                    <div class="section-nav">
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">

                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">

                                @php
                                    $products = \App\Facade\Shop::getProductsToShow(12);
                                @endphp

                                @foreach($products as $product)

                                    @php
                                        $productInformation = (new \App\Dominio\Catalog\ProductInformation($product->id))->get();

                                        $categoryName = $productInformation["categories"][0];
                                        $name = $productInformation["name"];
                                        $productImage = $productInformation["images"][0];
                                        $productPrice = $productInformation["price"][0];
                                    @endphp

                                    <div class="product">
                                        <a href="{{route("shop.product.index", $product->name)}}">
                                            <div class="product-img">
                                                <img src="{{ $productImage }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $categoryName }}</p>
                                                <h3 class="product-name"><a href="#">{{ $name }}</a></h3>
                                                <h4 class="product-price">${{$productPrice}}</h4>
                                                <div class="product-btns">
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

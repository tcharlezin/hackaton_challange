<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>

            @php
                $productsGroups = $productsRecomened->chunk(4);
            @endphp

            @foreach($productsGroups as $productsRecomened)

                <div class="row">
                    @foreach($productsRecomened as $productRecomended)

                        @php
                            $productInformation = (new \App\Dominio\Catalog\ProductInformation($productRecomended->id))->get();
                            $name = $productInformation["name"];
                            $productPrice = $productInformation["price"][0];

                        @endphp

                        <div class="col-md-3 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{ $productInformation["images"][0] }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">{{ $name }}</a></h3>
                                    <h4 class="product-price">${{$productPrice}}</h4>
                                    <div class="product-rating">
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    <div class="clearfix"></div>
                </div>

            @endforeach

        </div>
    </div>
</div>

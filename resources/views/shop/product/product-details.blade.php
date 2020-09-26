
@php
    $productInformation = (new \App\Dominio\Catalog\ProductInformation($product->id))->get();
    $name = $productInformation["name"];
    $productPrice = $productInformation["price"][0];
    $sizes = isset($productInformation["Size"]) ? $productInformation["Size"] : collect() ;
    $colors = isset($productInformation["Cor Primaria"]) ? $productInformation["Cor Primaria"] : collect() ;
@endphp

<div class="col-md-5">
    <div class="product-details">
        <h2 class="product-name">{{ $product->name }}</h2>
        <div>
            <h3 class="product-price">${{$productPrice}} </h3>
            <span class="product-available">In Stock</span>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        <div class="product-options">
            @if(! collect($sizes)->isEmpty())
                <label>
                    Size
                    <select class="input-select">
                        @foreach($sizes as $size)
                            <option value="0">{{ $size }}</option>
                        @endforeach
                    </select>
                </label>
            @endif

            @if(! collect($colors)->isEmpty())
                <label>
                    Size
                    <select class="input-select">
                        @foreach($colors as $cor)
                            <option value="0">{{ $cor }}</option>
                        @endforeach
                    </select>
                </label>
            @endif

        </div>

        <div class="add-to-cart">
            <div class="qty-label">
                Qty
                <div class="input-number">
                    <input type="number">
                    <span class="qty-up">+</span>
                    <span class="qty-down">-</span>
                </div>
            </div>
            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
        </div>

        <ul class="product-btns">
            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
        </ul>

        <ul class="product-links">
            <li>Category:</li>
            <li><a href="#">Headphones</a></li>
            <li><a href="#">Accessories</a></li>
        </ul>

        <ul class="product-links">
            <li>Share:</li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
        </ul>

    </div>
</div>

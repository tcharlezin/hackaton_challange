<div id="aside" class="col-md-3">
    <div class="aside">
        <h3 class="aside-title">Categories</h3>
        <div class="checkbox-filter">

            @php
                $categories = \App\Facade\Shop::getCategoryToShow(10);
            @endphp

            @foreach($categories as $category)
                <div class="input-checkbox">
                    <a href="{{route("shop.category.index", $category->name)}}">
                        <label for="category-{{ $category->name }}">
                            <span></span>
                            {!! $category->name !!}
                        </label>
                    </a>
                </div>
            @endforeach

        </div>
    </div>

    <div class="aside">
        <h3 class="aside-title">Price</h3>
        <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
                <input id="price-min" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
                <input id="price-max" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
    </div>

    <div class="aside">
        <h3 class="aside-title">Brand</h3>
        <div class="checkbox-filter">

            @php
                $brands = \App\Facade\Shop::getBrandToShow(10);
            @endphp

            @foreach($brands as $brand)
                <div class="input-checkbox">
                    <a href="{{route("shop.brand.index", $brand->name)}}">
                        <label for="brand-{{$brand->id}}">
                            <span></span>
                            {{$brand->name}}
                        </label>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

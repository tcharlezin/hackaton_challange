<div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
        <!-- NAV -->
        <ul class="main-nav nav navbar-nav">
            @php
                $categories = \App\Facade\Shop::getCategoriesMenu();
            @endphp

            <li class="active"><a href="#">Home</a></li>

            @foreach($categories as $category)
                <li><a href="{{ route("shop.category.index", $category->name) }}">{{$category->name}}</a></li>
            @endforeach
        </ul>
        <!-- /NAV -->
    </div>
    <!-- /responsive-nav -->
</div>

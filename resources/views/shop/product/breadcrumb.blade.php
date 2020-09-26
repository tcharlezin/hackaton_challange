<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="{{ route("shop.category.index", $productInformation["categories"][0]) }}">{{ $productInformation["categories"][0] }}</a></li>
                    <li class="active">{{ $productInformation["name"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

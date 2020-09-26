<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Brands</a></li>
                    <li class="active">{{ $brand->name }} ({{$products->count()}} Results)</li>
                </ul>
            </div>
        </div>
    </div>
</div>

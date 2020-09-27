@extends("shop.layouts.app")

@section("content")

@include("shop.brand.breadcrumb")

<div class="section">
    <div class="container">
        <div class="row">

            @include('shop.brand.aside')

            <div id="store" class="col-md-9">
                @include('shop.brand.top-filters')

                <div class="row">
                    @include('shop.brand.products')
                </div>

                @include('shop.brand.bottom-paginate')
            </div>
        </div>
    </div>
</div>

@endsection

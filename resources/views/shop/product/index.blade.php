@extends("shop.layouts.app")

@section("content")

@include("shop.product.breadcrumb")

<div class="section">
    <div class="container">
        <div class="row">
            @include("shop.product.product-images")

            @include("shop.product.product-details")

            @include("shop.product.product-tab")
        </div>
    </div>
</div>

@include("shop.components.related-products")

@endsection

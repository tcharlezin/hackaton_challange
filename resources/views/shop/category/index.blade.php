@extends("shop.layouts.app")

@section("content")

@include("shop.category.breadcrumb")

<div class="section">
    <div class="container">
        <div class="row">

            @include('shop.category.aside')

            <div id="store" class="col-md-9">
                @include('shop.category.top-filters')

                <div class="row">
                    @include('shop.category.products')
                </div>

                @include('shop.category.bottom-paginate')
            </div>
        </div>
    </div>
</div>

@endsection

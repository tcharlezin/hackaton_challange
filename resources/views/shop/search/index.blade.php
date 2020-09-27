@extends("shop.layouts.app")

@section("content")

@include("shop.search.breadcrumb")

<div class="section">
    <div class="container">
        <div class="row">

            @include('shop.search.aside')

            <div id="store" class="col-md-9">
                @include('shop.search.top-filters')

                <div class="row">
                    @include('shop.search.products')
                </div>

                @include('shop.search.bottom-paginate')
            </div>
        </div>
    </div>
</div>

@endsection

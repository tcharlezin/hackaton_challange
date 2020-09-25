@extends("shop.layouts.app")

@section("content")

    @include('shop.components.categories')

    @include('shop.home.new-products')

    @include('shop.components.hot-deal')

    @include('shop.components.carroussel')

    @include('shop.home.top-selling')

    @include('shop.components.newsletter')

@endsection

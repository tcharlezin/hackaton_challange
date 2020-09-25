@extends('site.app')

@section("titulo", "010bit - Default")

@section('content')

    <div class="hero-content">
        <div class="container">
            @include("site.componentes.apresentacao")
        </div>
    </div>

@endsection

@section("footer")

    @include("site.componentes.footer-top.sem-link")

@endsection

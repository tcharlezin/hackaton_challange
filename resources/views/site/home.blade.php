@extends('site.app')

@section("titulo", "010bit - Default")

@section('content')

    <div class="hero-content">
        <div class="container">
            @include("site.componentes.apresentacao")
        </div>
    </div>

    <div class="container">

        <div class="block background-secondary fullwidth candidate-title">
            @include('site.componentes.anuncio-candidatos')
        </div>

        <div class="row mt-60">
            <div class="candidate-boxes">
                @include("site.componentes.candidatos-promovidos")
            </div>
        </div>

    </div>

@endsection

@section("footer")

    @include("site.componentes.footer-top.sem-link")

@endsection

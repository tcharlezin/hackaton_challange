@extends('site.app')

@section("titulo", "#WeBrArDevsHackathon")

@section('content')

    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <h1>Hackaton Falabella</h1>
                    <h2>Enjoy this new purchase experience for Ecommerces!</h2>
                    <div>
                        Add more text about Hackaton...
                    </div>
                </div>
                <div class="col-sm-5 col-md-5 col-md-offset-1">
                    <div class="hero-content-carousel">
                        <div class="form-group">
                            @if( Auth::guest())
                                @include("site.components.login-register")
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="block background-secondary fullwidth candidate-title">
            <div class="page-title">
                <h2>#WeBrArDevsHackathon members</h2>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <p>Let's talk about the project!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-60">
            <div class="candidate-boxes">
                @include("site.components.members")
            </div>
        </div>
    </div>

@endsection

@section("footer")

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="footer-top-block text-center">
                    </div>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
        </div>
    </div>

@endsection

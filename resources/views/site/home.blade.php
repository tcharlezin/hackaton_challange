@extends('site.app')

@section("titulo", "#WeArBrDevsHackathon")

@section('content')

    <div style="padding-top: 50px" class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h1>Hackaton Falabella</h1>
                </div>
                <div class="col-sm-6 col-md-6">
                    <h2 class="mb-0 pb-0">What is a "hackathon"?</h2>
                    <p>A hackathon (also known as a hack day, hackfest or codefest; a portmanteau of hacking marathon) is a design sprint-like event; often, in which computer programmers and others involved in software development, including graphic designers, interface designers, project managers, domain experts, and others collaborate intensively on software projects. <a target="_blank" href="https://en.wikipedia.org/wiki/Hackathon">Wikipedia</a></p>
                </div>
                <div class="col-sm-6 col-md-6">
                    <h2 class="mb-0 pb-0">What is the goal of our team?</h2>
                    <p>Our goal is to create an application in which can recommend similar products based on a input product.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="block background-secondary fullwidth candidate-title">
            <div class="page-title">
                <h2>#WeArBrDevsHackathon members</h2>
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

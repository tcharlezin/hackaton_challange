<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Block --}}
    {{-- <script type="text/javascript" src="{{ asset("site/libraries/block/block.js") }}"></script>--}}

    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
    <link href="{{ asset("site/css/style.css") }}" rel="stylesheet" type="text/css">

    <link href="{{ asset("site/css/blue-navy.css") }}" rel="stylesheet" type="text/css" id="style-primary">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("site/favicon.png") }}">

    <title>@yield("titulo")</title>

</head>
<body class="hero-content-dark footer-dark" oncontextmenu="return false">

<div class="page-wrapper">

    @include("site.header")

    <div class="main-wrapper">
        <div class="main">
            @yield("content")
        </div>
    </div>
    <div class="footer-wrapper">
        <div class="footer">
            @yield("footer")
            @include("site.footer-bottom")
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset("site/js/jquery.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/jquery.ezmark.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/bootstrap.collapse.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/bootstrap.dropdown.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/bootstrap.tab.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/bootstrap.transition.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/bootstrap.fileinput.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/bootstrap.bootstrap-select.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/bootstrap.bootstrap-wysiwyg.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/cycle2.jquery.cycle2.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/cycle2.jquery.cycle2.carousel.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/countup.countup.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("site/js/profession.js") }}"></script>

@stack("scripts")

</body>
</html>

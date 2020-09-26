<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>#WeBrArDevsHackathon</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link href="{{ asset("shop/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("shop/css/slick.css") }}" rel="stylesheet">
    <link href="{{ asset("shop/css/slick-theme.css") }}" rel="stylesheet">
    <link href="{{ asset("shop/css/nouislider.min.css") }}" rel="stylesheet">
    <link href="{{ asset("shop/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("shop/css/style.css") }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- HEADER -->
    @include("shop.layouts.header")
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        @include('shop.layouts.menu')
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    @yield("content")

    <!-- FOOTER -->
    @include("shop.layouts.footer")
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset("shop/js/jquery.min.js") }}"></script>
    <script src="{{ asset("shop/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("shop/js/slick.min.js") }}"></script>
    <script src="{{ asset("shop/js/nouislider.min.js") }}"></script>
    <script src="{{ asset("shop/js/jquery.zoom.min.js") }}"></script>
    <script src="{{ asset("shop/js/main.js") }}"></script>

</body>
</html>

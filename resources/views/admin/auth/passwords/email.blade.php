<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>

    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/nifty.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/demo/nifty-demo-icons.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/demo/nifty-demo.min.css") }}" rel="stylesheet">
    <link href="{{ asset("plugins/magic-check/css/magic-check.min.css") }}" rel="stylesheet">
    <link href="{{ asset("plugins/pace/pace.min.css") }}" rel="stylesheet">

    <script src="{{ asset("plugins/pace/pace.min.js") }}"></script>
    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/nifty.min.js") }}"></script>

</head>

<body>
<div id="container" class="cls-container">

    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay" class="bg-img"></div>

    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="pad-ver">
                    <i class="pli-mail icon-3x"></i>
                </div>
                <p class="text-muted pad-btm">Preencha seu e-mail para recuperar sua senha. </p>

                <form role="form" method="POST" action="{{ route('password.email') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-mail" name="email">

                        @if ($errors->has('email'))
                            <strong>{{ $errors->first('email') }}</strong>
                        @endif

                    </div>

                    <div class="form-group text-right">
                        <button class="btn btn-success btn-block" type="submit">Recuperar Senha</button>
                    </div>
                </form>

                <div class="pad-top">
                    <a href="{{route("login")}}" class="btn-link mar-rgt">Voltar para Login</a>
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>
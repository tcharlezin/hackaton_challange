<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/nifty.min.css") }}" rel="stylesheet">
    <link href="{{ asset("premium/icon-sets/icons/line-icons/premium-line-icons.min.css") }}" rel="stylesheet">
    <link href="{{ asset("premium/icon-sets/icons/solid-icons/premium-solid-icons.min.css") }}" rel="stylesheet">
    <link href="{{ asset("plugins/magic-check/css/magic-check.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/pace.min.css") }}" rel="stylesheet">

    <script src="{{ asset("js/pace.min.js") }}"></script>
    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/nifty.min.js") }}"></script>

</head>

<body>
<div id="container" class="cls-container">

    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay" class="bg-img"></div>


    <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-sm panel">

            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h3 class="h4 mar-no">Login</h3>
                    <p class="text-muted">Preencha suas credenciais</p>
                </div>
                <form role="form" method="POST" action="{{ route('login') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="E-mail" autofocus>

                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Senha" required>

                        @if ($errors->has('password'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="checkbox pad-btm text-left">
                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="demo-form-checkbox">Lembre-me</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
                </form>
            </div>

            <div class="pad-all">
                <a href="{{ route('password.request') }}" class="btn-link mar-rgt">Esqueceu a senha?</a>
                <a href="{{ route('register') }}" class="btn-link mar-lft">Cadastre-se</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>

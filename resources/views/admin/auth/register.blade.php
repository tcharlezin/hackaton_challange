<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('register.titulo_pagina')</title>

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

    <!-- REGISTRATION FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-lg panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h3 class="h4 mar-no">Criando um novo usuário</h3>
                    <p class="text-muted">Faça parte de nossa comunidade! Você está quase lá!</p>
                </div>

                <form role="form" method="POST" action="{{ route('register') }}">

                    {{ csrf_field() }}

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nome completo" name="name" required
                                       autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="E-mail" name="email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha" name="password"
                                       required>
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="Confirme a senha"
                                       class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="radio">
                                    <input id="gender_f" class="magic-radio" type="radio" name="sexo" value="f">
                                    <label for="gender_f">Feminino</label>

                                    <input id="gender_m" class="magic-radio" type="radio" name="sexo" value="m">
                                    <label for="gender_m">Masculino</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox pad-btm text-left">
                        <input id="confirm" class="magic-checkbox" type="checkbox" name="confirm">
                        <label for="confirm">Estou de acordo com as <a href="#" class="btn-link">políticas e
                                temos de uso</a>.</label>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Finalizar</button>
                </form>
            </div>

            <div class="pad-all">
                Já tem uma conta? <a href="{{route('login')}}" class="btn-link mar-rgt">Entrar</a>
            </div>
        </div>
    </div>

</div>
</body>
</html>

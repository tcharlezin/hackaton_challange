<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>

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
                    <h3 class="h4 mar-no">Recuperando sua senha</h3>
                    <p class="text-muted">Preencha as informações abaixo para concluir a recuperação!</p>
                </div>

                <form role="form" method="POST" action="{{ route('password.request') }}">

                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row">

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="E-mail" name="email" required
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha" name="password"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                           placeholder="Confirme a senha" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Salvar mudança</button>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>

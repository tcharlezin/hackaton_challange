<div id="divRegistro">
    <h2>Create a new account</h2>
    <br/>
    <div class="center">
        <form role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div id="registerError">
                @if($errors->any())
                    <div class="row">
                        <div class="alert alert-default text-center">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <input type="text" name="name" class="form-control text-right" placeholder="Fullname" required><br/>
            <input type="text" name="email" class="form-control text-right" placeholder="E-mail" required><br/>
            <input type="password" name="password" class="form-control text-right" placeholder="Password" required><br/>
            <input type="password" name="password_confirmation" class="form-control text-right"
                   placeholder="Confirm Password" required>

            <input id="confirm" class="magic-checkbox" type="hidden" name="confirm" value="true">

            <div style="position: relative; display: block; margin-top: 20px; margin-bottom: 10px;">
                <button type="submit" class="btn btn-secondary">Start it!</button>
            </div>
            <div class="checkbox checkbox-info">
                <label>
                    We dont will send SPAM to you. I guess.
                </label>
            </div>

        </form>
    </div>
</div>

<div id="divLogin" style="display: none">
    <h2>Acessing the platform</h2>
    <div class="">

        <form role="form" method="POST" action="{{ route('login') }}">

            {{ csrf_field() }}

            <div class="checkbox checkbox-info text-justify">
                <label>
                    Enter with your credentials
                </label>
            </div>

            <div id="loginError">
                @if($errors->any())
                    <div class="row">
                        <div class="alert alert-default text-center">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <input type="text" name="email" class="form-control text-right" placeholder="E-mail"><br/>

            <input type="password" name="password" class="form-control text-right" placeholder="Password"><br/>

            <div class="row">
                <div class="col-sm-6 text-left">
                    <a href="#" onclick="exibirRecuperarSenha();">Forget password?</a>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="#" onclick="ExibeRegistar();">Register</a>
                </div>
            </div>

            <div style="position: relative; display: block; margin-top: 20px; margin-bottom: 10px;" class="center">
                <button type="submit" class="btn btn-secondary">Login</button>
            </div>

        </form>
    </div>
</div>

<div id="divRecuperarSenha" style="display: none">
    <form role="form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <h2>Recover Password</h2>
        <div class="">
            <div class="checkbox checkbox-info text-justify">
                <label>
                    Enter with the e-mail
                </label>
            </div>
            <input type="text" name="email" class="form-control text-right" placeholder="E-mail"><br/>
            <div style="position: relative; display: block; margin-top: 20px; margin-bottom: 10px;" class="center">
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
        </div>
    </form>
</div>


@push("scripts")
<script type="text/javascript">

    $('input:text').focus(function ()
    {
        $(this).css('border', '2px solid #55a747');
    });

    $('input:text').blur(function ()
    {
        $(this).css('border', '0px');
    });

    $('input:password').focus(function ()
    {
        $(this).css('border', '2px solid #55a747');
    });

    $('input:password').blur(function ()
    {
        $(this).css('border', '0px');
    });

    var $divLogin = $("#divLogin");
    var $divRegistro = $("#divRegistro");
    var $divRecuperarSenha = $("#divRecuperarSenha");

    $("#btnLogin").on("click", function ()
    {
        ExibeLogin();
    });

    $("#btnCriarConta").on("click", function ()
    {
        ExibeRegistar();
    });

    function ExibeLogin()
    {
        $("#loginError").hide();
        $("#registerError").hide();
        $divRegistro.hide();
        $divRecuperarSenha.hide();
        $divLogin.fadeIn();
        $divLogin.find("input:text").first().focus();
    }

    function ExibeRegistar()
    {
        $("#loginError").hide();
        $("#registerError").hide();
        $divLogin.hide();
        $divRecuperarSenha.hide();
        $divRegistro.fadeIn();
        $divRegistro.find("input:text").first().focus();
    }

    function exibirRecuperarSenha()
    {
        $("#loginError").hide();
        $("#registerError").hide();
        $divRegistro.hide();
        $divLogin.hide();
        $divRecuperarSenha.fadeIn();
        $divRecuperarSenha.find("input:text").first().focus();
    }

</script>
@endpush

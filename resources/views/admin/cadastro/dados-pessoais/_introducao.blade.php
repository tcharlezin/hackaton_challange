<div class="panel panel-colorful panel-primary mensagem-bemvindo">
    <div class="panel-heading">
        <h3 class="panel-title">{{Auth::user()->name}}, estamos começando sua experiência!</h3>
    </div>
    <div class="panel-body">
        <p>
            <b>Vamos começar preenchendo seu perfil</b><br/>
            Após o término do preenchimento das informações, você será liberado para acessar o <b>ambiente de
                usuário</b>.<br/>
            <br/>
            <b>Espero que você tenha ainda mais sucesso, e que a plataforma possa te somar experiências positivas!
            </b>
            <br/>
            <i>
                <br/>Atenciosamente, <br>
                Tcharles Pereira da Silva, CEO<br>
            </i>
        </p>
        <br/>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <button class="btn btn-default btn-rounded" onclick="$('.mensagem-bemvindo').fadeOut();" style="width: 100%">Pronto para começar!
                </button>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>

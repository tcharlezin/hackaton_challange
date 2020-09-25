<div class="panel panel-colorful panel-primary mensagem-bemvindo">
    <div class="panel-heading">
        <h3 class="panel-title">{{Auth::user()->name}}, mostre quem você é!</h3>
    </div>
    <div class="panel-body">
        <p>
            Nessa etapa, vamos preencher a sua foto de perfil.<br/>
            Por motivos de segurança, <b><u>exigimos que o usuário faça o upload de uma foto pessoal</u></b>.<br/>
        </p>
        <p>
            A foto que você colocar aqui, ajudará na <b>aprovação do seu cadastro junto à nossa equipe</b>.<br/>
            Lembre-se de não infringir nenhuma regra descrita nos termos de uso, em relação a fotos.
        </p>
        <br/>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <button class="btn btn-default btn-rounded" onclick="$('.mensagem-bemvindo').fadeOut();" style="width: 100%">Fechar
                </button>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>
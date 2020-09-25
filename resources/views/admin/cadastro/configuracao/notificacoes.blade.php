<div class="panel">

    <div class="panel-heading">
        <div class="panel-control">
            <button class="btn btn-default" data-target="#demo-panel-collapse"
                    data-toggle="collapse" aria-expanded="true"><i class="demo-pli-arrow-down"></i>
            </button>
        </div>
        <h3 class="panel-title">Notificações</h3>
    </div>

    <div id="demo-panel-collapse" class="collapse in" aria-expanded="true" style="">
        <div class="panel-body">

            {!! Form::myCheckbox('notificacao[email_plataforma]', 'Permitir e-mail de notificaćão da plataforma.') !!}

        </div>
    </div>
</div>

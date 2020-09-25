<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Dados pessoais</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('name', 'Nome completo:', ['class'=>'control-label']) !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label('document', 'CPF:', ['class'=>'control-label']) !!}
                    {!! Form::text('document', null, ['class'=>'form-control', 'id' => 'document']) !!}
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group has-feedback" id="form-group-username">
                    <label class="control-label">
                        Username
                        <a class="add-tooltip demo-pli-question-circle icon-lg unselectable"
                           data-html="true"
                           data-title="<h4>Username</h4><p style='width:150px'>Este campo indica como você será reconhecido na plataforma.
                                   Não utilize espaços, números e caracteres especiais, somente letras serão aceitas.</p>"
                           data-original-title=""
                           title=""></a></label>

                    {!! Form::text('username', null, ['class'=>'form-control ', 'id' => 'username', 'placeholder'=> 'Utilize apenas letras']) !!}

                    <i class="demo-pli-male icon-lg form-control-feedback" id="icon-username"></i>
                </div>

                <div class="alert alert-success" id="alerta-username-success" style="display: none;">
                    O username <strong id="txt-alerta-username-success">&nbsp;</strong> está disponível.
                </div>

                <div class="alert alert-danger" id="alerta-username-error" style="display: none;">
                    O username <u><strong id="txt-alerta-username-error">&nbsp;</strong></u> não é válido ou não
                    está disponível. <strong>Escolha outro.</strong>.
                </div>

            </div>
            <div class="col-sm-6">
                <div class="row">
                    {!! Form::datepicker('col-md-6', 'data_nascimento', 'Data de nascimento') !!}
                </div>
            </div>

        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Localização</h3>
    </div>
    <div class="panel-body">
        {!! Form::cidades() !!}
    </div>
</div>


@push("scripts")
<script type="text/javascript">

    $(function ()
    {
        $("#document").mask("999.999.999-99");
        $("#document").attr("placeholder", "___.___.___-__");
    });

    var $usernameValido = false;
    var $username = null;

    $("#username").on("change", function ()
    {
        ValidarUsername();
    });

    function ValidarUsername()
    {
        $username = $("#username").val();

        $.post("{{ route("valida-username") }}",
        {
            username: $("#username").val()
        },
        function (resposta)
        {
            if (resposta)
            {
                NaoExisteUsername();
            }
            else
            {
                JaExisteUsername();
            }
        })
    }

    @if(old("username"))
        ValidarUsername();
    @endif

    function JaExisteUsername()
    {
        $usernameValido = false;

        $("#icon-username").removeClass("demo-pli-male");
        $("#icon-username").removeClass("demo-pli-like");
        $("#icon-username").addClass("demo-pli-cross");

        $("#form-group-username").removeClass("has-success");
        $("#form-group-username").addClass("has-error");

        $("#alerta-username-success").hide();
        $("#alerta-username-error").fadeIn();

        $("#txt-alerta-username-success").text($username);
        $("#txt-alerta-username-error").text($username);

    }

    function NaoExisteUsername()
    {
        $usernameValido = true;

        $("#icon-username").removeClass("demo-pli-male");
        $("#icon-username").removeClass("demo-pli-cross");
        $("#icon-username").addClass("demo-pli-like");

        $("#form-group-username").addClass("has-success");
        $("#form-group-username").removeClass("has-error");

        $("#alerta-username-error").hide();
        $("#alerta-username-success").fadeIn();

        $("#txt-alerta-username-success").text($username);
        $("#txt-alerta-username-error").text($username);
    }

    $oldCargo = "{{old("cargo_id")}}";

    RestaurarValores();

    function RestaurarValores()
    {
        if ($oldCargo)
        {
            CarregarCargo();
            $oldCargo = null;
        }
    }

    function CarregarCargo()
    {
        // $.post(" route("pesquisar-cargo-id") ",
        $.post("#",
        {
            cargo_id: $oldCargo
        },
        function (cargo)
        {
            if (cargo)
            {
                $("#cargo_id").append("<option value='" + cargo.id + "' selected>" + cargo.descricao + "</option>");
                $('#cargo_id').trigger('change');
            }
        });
    }

</script>
@endpush

@extends('home.atualiza-perfil.index')

@section("atualiza-perfil.tab")

    <div id="dados-pessoais" class="tab-pane fade active in">

        {!! Form::model($registro, ['route' => "perfil.geral.store"]) !!}

        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Dados pessoais</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('name', 'Nome completo:', ['class'=>'control-label']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control', "readonly" => "true"]) !!}
                        </div>
                    </div>

                    {!! Form::select2Ajax('col-md-6', 'cargo_id', 'Qual o seu cargo?', [], 'pesquisa-cargo', 'Qual a sua atuação hoje?', 2) !!}

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group has-feedback" id="form-group-username">
                            <label class="control-label">
                                Username
                            </label>
                            {!! Form::text('username', null, ['class'=>'form-control ', 'id' => 'username', "readonly" => "true"]) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="control-label">
                                    Data de nascimento
                                </label>
                                {!! Form::text('data_nascimento', null, ['class'=>'form-control ', 'id' => 'data_nascimento', "readonly" => "true"]) !!}
                            </div>
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

                $idCargoAtual = "{{Auth::user()->cargo_id}}";
                $oldCargo = "{{old("cargo_id")}}";

                RestaurarValores();

                function RestaurarValores()
                {
                    VerificarCargo();
                }

                function VerificarCargo()
                {
                    if($oldCargo)
                    {
                        LoadCargo($oldCargo);
                        $oldCargo = null;
                        return;
                    }

                    if($idCargoAtual)
                    {
                        LoadCargo($idCargoAtual);
                        return;
                    }
                }

                function LoadCargo($cargoId)
                {
                    $.post("{{ route("pesquisar-cargo-id") }}",
                        {
                            cargo_id: $cargoId
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

        <div class="panel-footer text-right">
                <a href="{{route("home")}}" class="btn btn-default">Voltar para o início</a>
                <button class="btn btn-success" type="submit">Salvar alterações</button>
            </div>

        {!! Form::close() !!}

    </div>

@endsection
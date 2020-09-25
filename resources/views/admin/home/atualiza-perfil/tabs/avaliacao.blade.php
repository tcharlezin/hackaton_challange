@extends('home.atualiza-perfil.index')

@section("atualiza-perfil.tab")

    <div id="dados-pessoais" class="tab-pane fade">
    </div>
    <div id="foto-perfil" class="tab-pane fade">
    </div>
    <div id="habilidades" class="tab-pane fade">
    </div>
    <div id="experiencias" class="tab-pane fade">
    </div>
    <div id="cursos-formacao" class="tab-pane fade">
    </div>
    <div id="areas-interesse" class="tab-pane fade">
    </div>
    <div id="avaliacao" class="tab-pane fade active in">

        {!! Form::model($registro, ['route' => "cadastro.habilidades.store"]) !!}

            @include("admin.cadastro.avaliacao.form")

            <div class="panel-footer text-right">
                <a href="{{route("home")}}" class="btn btn-default">Voltar para o início</a>
                <button class="btn btn-success" type="submit">Salvar alterações</button>
            </div>

        {!! Form::close() !!}

    </div>

@endsection


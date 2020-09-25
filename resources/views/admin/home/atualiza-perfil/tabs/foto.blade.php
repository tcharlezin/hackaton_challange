@extends('home.atualiza-perfil.index')

@section("atualiza-perfil.tab")

    <div id="foto-perfil" class="tab-pane fade active in">

        {!! Form::model($registro, ['route' => "perfil.foto.store", "enctype" => "multipart/form-data", "id" => "formAvatar"]) !!}

        @include("admin.cadastro.foto.form")

        <div class="panel-footer text-right">
            <a href="{{route("home")}}" class="btn btn-default">Voltar para o início</a>
            <button class="btn btn-success" type="submit">Salvar alterações</button>
        </div>

        {!! Form::close() !!}

    </div>

@endsection


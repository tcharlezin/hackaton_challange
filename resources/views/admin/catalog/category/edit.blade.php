@extends('admin.layouts.app')

@section('titulo', 'Editando Categoria')

@section('conteudo')

    <div class="panel">

        {!! Form::model($registro, ['route' => ["$rota.update", $registro->id], 'id' => 'frmTag']) !!}

            <div class="panel-footer text-right">
                {!! Form::submit('Atualizar', ['class' => 'btn btn-success']) !!}
                <a href="{{route("$rota.index")}}" class="btn btn-default">Voltar</a>
            </div>

            {{ method_field('PUT') }}

            <div class="panel-body">
                @include("$rota._form")
            </div>

            <div class="panel-footer text-right">
                {!! Form::submit('Atualizar', ['class' => 'btn btn-success']) !!}
                <a href="{{route("$rota.index")}}" class="btn btn-default">Voltar</a>
            </div>

        {!! Form::close() !!}
    </div>

@endsection

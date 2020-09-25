@extends('admin.layouts.app')

@section('titulo', 'Adicionar nova Categoria')

@section('conteudo')

    <div class="panel">

        {!! Form::open(['route'=>"$rota.store", 'id' => 'frmTag']) !!}

            <div class="panel-footer text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                <a href="{{route("$rota.index")}}" class="btn btn-default">Voltar</a>
            </div>

            <div class="panel-body">
                @include("$rota._form")
            </div>
            <div class="panel-footer text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                <a href="{{route("$rota.index")}}" class="btn btn-default">Voltar</a>
            </div>

        {!! Form::close() !!}
    </div>

@endsection

@extends('admin.cadastro.layout')

@section("menu-esquerdo")
    @include("admin.cadastro.menu._menu-esquerdo")
@endsection

@section("formulario")

    @if(is_null($registro->cargo))
        @include("admin.cadastro.dados-pessoais._introducao")
    @endif

    <div class="">
        {!! Form::model($registro, ['route' => "cadastro.dados-pessoais.store"]) !!}

        @include("admin.cadastro.dados-pessoais.form")

        @include("admin.cadastro.componentes._btn-continuar")

        {!! Form::close() !!}
    </div>

@endsection


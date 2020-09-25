@extends('admin.cadastro.layout')

@section("menu-esquerdo")
    @include("admin.cadastro.menu._menu-esquerdo")
@endsection

@section("formulario")

    @include("admin.cadastro.foto._introducao")

    {!! Form::model($registro, ['route' => "cadastro.foto.store", "enctype" => "multipart/form-data", "id" => "formAvatar"]) !!}

        @include("admin.cadastro.foto.form")

        @include("admin.cadastro.componentes._btn-continuar")

    {!! Form::close() !!}
@endsection

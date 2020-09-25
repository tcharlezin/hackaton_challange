@extends('admin.cadastro.layout')

@section("menu-esquerdo")
    @include("admin.cadastro.menu._menu-esquerdo")
@endsection

@section("formulario")

    @include("admin.cadastro.configuracao._introducao")

    {!! Form::model($registro, ['route' => "cadastro.configuracao.store"]) !!}
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Configurações gerais</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    @include("admin.cadastro.configuracao.privacidade")
                </div>

                <div class="col-md-6">
                    @include("admin.cadastro.configuracao.notificacoes")
                </div>
            </div>
        </div>
        @include("admin.cadastro.componentes._btn-continuar")
    </div>
    {!! Form::close() !!}
@endsection

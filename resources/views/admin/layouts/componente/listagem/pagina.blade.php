@extends('admin.layouts.app')

@section('conteudo')

    <div class="panel">
        <div class="panel-body">

            <div class="row">
                <a href="@yield('rotaCreate')" class="btn btn-primary pull-right" accesskey="N">
                    <i class="fa fa-fw fa-clone fa-lg"></i>
                    <u><b>N</b></u>ovo
                </a>
            </div>

            <div class="row">

                @yield('tabela')

            </div>

        </div>
    </div>

    @include("admin.layouts.componente.modal.excluir-registro")

@endsection

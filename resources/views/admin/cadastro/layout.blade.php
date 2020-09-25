@extends('admin.layouts.app')

@section('conteudo')

    <div class="fixed-fluid">

        @include("admin.cadastro.side-bar")

        <div class="fluid">
            <div class="fixed-fluid">
                <div class="fluid">
                    <div class="panel">
                        <div class="panel-body">
                            @yield("formulario")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

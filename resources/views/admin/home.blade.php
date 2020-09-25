@extends('admin.layouts.app')

@section('conteudo')

    <div id="page-head">

        <hr class="new-section-sm bord-no">
        <div class="text-center">
            <h3>Olá {{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>
            <p>Bem vindo(a) a plataforma.</p>
        </div>
    </div>

    <div id="page-content">
        <div class="row">
        </div>
    </div>

@endsection

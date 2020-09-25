@extends('layouts.app')

@section('conteudo')

    <div id="page-head">

        <hr class="new-section-sm bord-no">
        <div class="text-center">
            <h3>Atualização de perfil</h3>
            <p>Suas alterações serão aplicadas ao seu perfil, logo após você salvar.</p>
        </div>
    </div>

    <div id="page-content">

        <div class="row">

            <div class="tab-base">


                <ul class="nav nav-tabs">
                    <li class="{{ \Request::route()->getName() == "perfil.geral" ? "active" : ""  }}">
                        <a href="{{route("perfil.geral")}}" aria-expanded="true">Geral</a>
                    </li>
                    <li class="{{ \Request::route()->getName() == "perfil.foto" ? "active" : ""  }}">
                        <a href="{{route("perfil.foto")}}" aria-expanded="false">Foto do perfil</a>
                    </li>
                    <li class="{{ \Request::route()->getName() == "perfil.habilidades" ? "active" : ""  }}">
                        <a href="{{route("perfil.habilidades")}}"
                           aria-expanded="false">Habilidades</a>
                    </li>
                    <li class="{{ \Request::route()->getName() == "perfil.experiencias" ? "active" : ""  }}">
                        <a href="{{route("perfil.experiencias")}}"
                           aria-expanded="false">Experiências</a>
                    </li>
                    <li class="{{ \Request::route()->getName() == "perfil.cursos-formacao" ? "active" : ""  }}">
                        <a href="{{route("perfil.cursos-formacao")}}" aria-expanded="false">Cursos e
                            Formações</a>
                    </li>
                    <li class="{{ \Request::route()->getName() == "perfil.areas-interesse" ? "active" : ""  }}">
                        <a href="{{route("perfil.areas-interesse")}}" aria-expanded="false">Áreas de
                            interesse</a>
                    </li>
                    <li class="{{ \Request::route()->getName() == "perfil.avaliacao" ? "active" : ""  }}">
                        <a href="{{route("perfil.avaliacao")}}" aria-expanded="false">Avaliações</a>
                    </li>
                </ul>

                <div class="tab-content">

                    @yield("atualiza-perfil.tab")

                </div>
            </div>
        </div>

    </div>

@endsection
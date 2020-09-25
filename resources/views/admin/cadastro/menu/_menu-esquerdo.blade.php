@section("menu-esquerdo")

    <a href="{{route('cadastro.dados-pessoais.create')}}"
       class="btn btn-block {{ is_active(['cadastro.dados-pessoais.create']) ? "btn-primary" : "btn-default" }}"
       id="menu_dados_pessoais" @cannot('cadastro.dados-pessoais.create') disabled @endcannot >Dados pessoais </a>

    <a href="{{route('cadastro.foto.create')}}"
       class="btn btn-block {{ is_active(['cadastro.foto.create']) ?  "btn-primary" : "btn-default" }}"
       id="menu_fotos" @cannot('cadastro.foto.create') disabled @endcannot >Foto do perfil</a>

    <a href="{{route('cadastro.configuracao.create')}}"
       class="btn btn-block {{ is_active(['cadastro.configuracao.create']) ?  "btn-primary" : "btn-default" }}"
       id="menu_configuracoes" @cannot('cadastro.configuracao.create') disabled @endcannot >Configurações gerais</a>


    <div class="pad-ver">
    </div>
    <div class="pad-ver">
    </div>

    <a href="#" class="btn btn-block btn-default">Termos de uso</a>
    <a href="#" class="btn btn-block btn-default">Cancelar conta</a>

@endsection

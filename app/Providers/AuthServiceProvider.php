<?php

namespace App\Providers;

use App\Policies\Perfil\PerfilIncompletoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define("cadastro.dados-pessoais.create", PerfilIncompletoPolicy::class . '@DadosPessoais');
        Gate::define("cadastro.habilidades.create", PerfilIncompletoPolicy::class . '@Habilidades');
        Gate::define("cadastro.experiencias.create", PerfilIncompletoPolicy::class . '@Experiencias');
        Gate::define("cadastro.formacoes.create", PerfilIncompletoPolicy::class . '@Formacoes');
        Gate::define("cadastro.foto.create", PerfilIncompletoPolicy::class . '@Foto');
        Gate::define("cadastro.configuracao.create", PerfilIncompletoPolicy::class . '@Configuracao');
        Gate::define("cadastro.area-interesse.create", PerfilIncompletoPolicy::class . '@AreaInteresse');
        Gate::define("cadastro.redes-sociais.create", PerfilIncompletoPolicy::class . '@RedesSociais');
        Gate::define("cadastro.avaliacao.create", PerfilIncompletoPolicy::class . '@Avaliacao');
    }
}

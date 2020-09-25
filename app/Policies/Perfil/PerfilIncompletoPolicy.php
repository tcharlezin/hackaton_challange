<?php

namespace App\Policies\Perfil;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Symfony\Component\VarDumper\VarDumper;

class PerfilIncompletoPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function DadosPessoais(User $user)
    {
        return !$user->isPreencheuDadosPessoais();
    }

    public function Habilidades(User $user)
    {
        return !$user->isPreencheuHabilidades();
    }

    public function Experiencias(User $user)
    {
        return !$user->isPreencheuExperiencias();
    }

    public function Formacoes(User $user)
    {
        return !$user->isPreencheuFormacao();
    }

    public function Foto(User $user)
    {
        return !$user->isPreencheuFoto();
    }

    public function Configuracao(User $user)
    {
        return !$user->isPreencheuConfiguracoes();
    }

    public function AreaInteresse(User $user)
    {
        return !$user->isPreencheuAreasInteresse();
    }

    public function RedesSociais(User $user)
    {
        return !$user->isPreencheuRedesSociais();
    }

    public function Avaliacao(User $user)
    {
        return !$user->isPreencheuAvaliacao();
    }

}

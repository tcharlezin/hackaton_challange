<?php

namespace App\Dominio\Acesso\Perfil;

use App\Exceptions\Perfil\ConfiguracoesIncompletasException;
use App\Exceptions\Perfil\DadosPessoaisIncompletosException;
use App\Exceptions\Perfil\FotoIncompletasException;
use App\Models\User;

class GerenciarAcessoUsuario
{
    private $usuario;

    function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }

    public function executar()
    {
        $this->temAcessoDadosPessoais();
        $this->temAcessoFoto();
        $this->temAcessoConfiguracoes();
    }

    private function temAcessoDadosPessoais()
    {
        if (!$this->usuario->isPreencheuDadosPessoais())
        {
            throw new DadosPessoaisIncompletosException();
        }
    }

    private function temAcessoFoto()
    {
        if (!$this->usuario->isPreencheuFoto())
        {
            throw new FotoIncompletasException();
        }
    }

    private function temAcessoConfiguracoes()
    {
        if (!$this->usuario->isPreencheuConfiguracoes())
        {
            throw new ConfiguracoesIncompletasException();
        }
    }
}

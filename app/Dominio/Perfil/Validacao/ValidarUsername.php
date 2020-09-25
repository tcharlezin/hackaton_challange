<?php

namespace App\Dominio\Perfil\Validacao;

use App\Exceptions\Perfil\DadosPessoaisIncompletosException;
use App\Models\User;

class ValidarUsername
{
    private $username;
    private $usuario;

    function __construct(User $usuario, $username)
    {
        $this->usuario = $usuario;
        $this->username = $username;
    }

    public function executar()
    {
        $this->ValidarUniquidadeUsuario();
        $this->ValidarListaRejeitados();
    }

    private function ValidarUniquidadeUsuario()
    {
        $usuario = User::buscarPorUsername($this->username);

        if (is_null($usuario))
        {
            return;
        }

        if ($this->usuario->id === $usuario->id)
        {
            return;
        }

        throw new DadosPessoaisIncompletosException("Este nome de usuário já está em uso, por favor, escolha outro!");
    }

    private function ValidarListaRejeitados()
    {
    }
}

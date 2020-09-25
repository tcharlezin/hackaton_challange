<?php

namespace App\Dominio\Perfil;

use App\Dominio\Perfil\Validacao\ValidarUsername;
use App\Models\User;

class DadosPessoais
{
    private $usuario;
    private $dados;

    function __construct(User $user, $dados)
    {
        $this->usuario = $user;
        $this->dados = $dados;
    }

    public function executar()
    {
        $this->ValidarUsernameEscolhido();
        $this->AtualizarUsuario();
    }

    private function ValidarUsernameEscolhido()
    {
        (new ValidarUsername($this->usuario, $this->dados["username"]))->executar();
    }

    private function AtualizarUsuario()
    {
        $this->usuario->update($this->dados);
    }
}

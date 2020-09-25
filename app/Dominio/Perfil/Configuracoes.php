<?php

namespace App\Dominio\Perfil;

use App\Models\User;
use Symfony\Component\VarDumper\VarDumper;

class Configuracoes
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
        $this->tratarPrivacidade();
        $this->tratarNotificacao();
        $this->criarConfiguracao();
    }

    private function criarConfiguracao()
    {
        $configuracao = $this->usuario->configuracao;

        if(is_null($configuracao))
        {
            $this->usuario->configuracao()->create($this->dados);
        }
        else
        {
            $configuracao->update($this->dados);
        }
    }

    private function tratarPrivacidade()
    {
        if(! isset($this->dados["privacidade"]))
            return;

        foreach ($this->dados["privacidade"] as $campo => $valor)
        {
            $this->dados["privacidade_".$campo] = $valor;
        }
    }

    private function tratarNotificacao()
    {
        if(! isset($this->dados["notificacao"]))
            return;

        foreach ($this->dados["notificacao"] as $campo => $valor)
        {
            $this->dados["notificacao".$campo] = $valor;
        }
    }
}

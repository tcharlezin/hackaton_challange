<?php

namespace App\Http\Middleware;

use App\Dominio\Acesso\Perfil\GerenciarAcessoUsuario;
use App\Exceptions\Perfil\ConfiguracoesIncompletasException;
use App\Exceptions\Perfil\DadosPessoaisIncompletosException;
use App\Exceptions\Perfil\FotoIncompletasException;
use Closure;

class PerfilCompleto
{
    public function handle($request, Closure $next)
    {
        $usuario = $request->user();

        if (!$usuario->isPerfilCompleto())
        {
            try
            {
                (new GerenciarAcessoUsuario($usuario))->executar();
            }
            catch (DadosPessoaisIncompletosException $ex)
            {
                return redirect()->route("cadastro.dados-pessoais.create");
            }
            catch (FotoIncompletasException $ex)
            {
                return redirect(route("cadastro.foto.create"));
            }
            catch (ConfiguracoesIncompletasException $ex)
            {
                return redirect(route("cadastro.configuracao.create"));
            }
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Controllers\Cadastro;

use DB;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dominio\Perfil\Configuracoes;
use App\Http\Controllers\Controller;

class ConfiguracoesController extends Controller
{
    public function create()
    {
        try
        {
            $this->authorize("cadastro.configuracao.create");

            $registro = Auth::user();

            return view("admin.cadastro.configuracao.index", compact('registro'));
        }
        catch (AuthorizationException $ex)
        {
            return redirect()->back()->withErrors("Você já preencheu esta página para o cadastro inicial. Termine seu cadastro inicial para poder atualizar as informações.");
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        try
        {
            DB::beginTransaction();

            $this->authorize("cadastro.configuracao.create");

            $usuario = Auth::user();
            $dados = $request->all();

            (new Configuracoes($usuario, $dados))->executar();

            $usuario->preencheu_configuracao = true;
            $usuario->save();

            DB::commit();

            return redirect()->route("home");
        }
        catch (AuthorizationException $ex)
        {
            DB::rollback();
            return redirect()->back()->withErrors("Você já preencheu esta página para o cadastro inicial. Termine seu cadastro inicial para poder atualizar as informações.");
        }
        catch (\Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }
}

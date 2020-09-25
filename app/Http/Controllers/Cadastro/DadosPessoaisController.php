<?php

namespace App\Http\Controllers\Cadastro;

use App\Dominio\Perfil\DadosPessoais;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class DadosPessoaisController extends Controller
{
    public function create()
    {
        try
        {
            $this->authorize("cadastro.dados-pessoais.create");

            $registro = Auth::user();

            return view("admin.cadastro.dados-pessoais.index", compact('registro'));
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

    public function store(\App\Http\Requests\DadosPessoais $request)
    {
        try
        {
            DB::beginTransaction();

            $this->authorize("cadastro.dados-pessoais.create");

            $usuario = Auth::user();
            $dados = $request->all();

            (new DadosPessoais($usuario, $dados))->executar();

            $usuario->preencheu_dados_pessoais = true;
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

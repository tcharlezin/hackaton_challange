<?php

namespace Usuario\Http\Controllers\Perfil;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Usuario\Dominio\Perfil\DadosPessoais;
use Usuario\Http\Controllers\Controller;

class DadosPessoaisController extends Controller
{
    public function index()
    {
        try
        {
            $registro = Auth::user();

            return view("home.atualiza-perfil.tabs.geral", compact('registro'));
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

            $usuario = Auth::user();

            $dados = [
                "username" => $usuario->username,
                "cargo_id" => $request->get("cargo_id"),
                "estado_id" => $request->get("estado_id"),
                "cidade_id" => $request->get("cidade_id"),
            ];

            (new DadosPessoais($usuario, $dados))->executar();

            DB::commit();

            return redirect()->route("perfil.geral");
        }
        catch (\Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }
}

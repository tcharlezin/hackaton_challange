<?php

namespace Usuario\Http\Controllers\Perfil;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Usuario\Dominio\Usuario\Avatar\DefinirImagemAvatar;
use Usuario\Http\Controllers\Controller;

class FotosController extends Controller
{
    public function index()
    {
        try
        {
            $registro = Auth::user();

            return view("home.atualiza-perfil.tabs.foto", compact('registro'));
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
            $dados = $request->all();

            $arquivoOriginal = $dados["avatar-picture"];
            $values = json_decode($dados["avatar-picture_values"]);

            (new DefinirImagemAvatar($usuario, $values->data, $arquivoOriginal))->executar();

            $usuario->preencheu_foto = true;
            $usuario->save();

            DB::commit();

            return redirect()->route("perfil.foto");
        }
        catch (\Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Cadastro;

use App\Dominio\Perfil\Habilidades;
use App\Dominio\Usuario\Avatar\DefinirImagemAvatar;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotosController extends Controller
{
    public function create()
    {
        try
        {
            $this->authorize("cadastro.foto.create");

            $registro = Auth::user();

            return view("admin.cadastro.foto.index", compact('registro'));
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

            $this->authorize("cadastro.foto.create");

            $usuario = Auth::user();
            $dados = $request->all();

            if(isset($dados["avatar-picture"]))
            {
                $arquivoOriginal = $dados["avatar-picture"];
                $values = json_decode($dados["avatar-picture_values"]);

                (new DefinirImagemAvatar($usuario, $values->data, $arquivoOriginal))->executar();
            }

            $usuario->preencheu_foto = true;
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

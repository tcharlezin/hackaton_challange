<?php

namespace App\Http\Controllers\Pesquisa;

use App\Http\Controllers\Controller;
use App\Models\Localizacao\Estado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Log;

class PesquisaController extends Controller
{
    public function findCidades(Request $request)
    {
        $term = trim($request->estado);

        if (empty($term))
        {
            return \Response::json([]);
        }

        $estado = Estado::find($term);

        if (is_null($estado))
        {
            return \Response::json([]);
        }

        return \Response::json($estado->cidades->sortBy("descricao")->pluck("descricao", "id"));
    }

    public function validaUsername(Request $request)
    {
        try
        {
            $request->validate(['username' => 'alpha']);

            $term = trim($request->username);

            if (empty($term))
            {
                return \Response::json(false);
            }

            $user = User::buscarPorUsername($term);

            if (!is_null($user))
            {
                return \Response::json(false);
            }

            return \Response::json(true);
        }
        catch (ValidationException $ex)
        {
            return \Response::json(false);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Log;

class PesquisaDados
{
    public function handle($request, Closure $next)
    {
        $usuario = $request->user();

        // Usuário deve estar logado para consultar
        if (is_null($usuario))
        {
            return \Response::json([]);
        }

        // Não permite consultas que não são ajax
        if (!$request->ajax())
        {
            return \Response::json([]);
        }

        if (Cache::has($this->getCacheName($request)))
        {
            Log::info("buscando do cache");

            return Cache::get($this->getCacheName($request));
        }

        $response = $next($request);

        Log::info("buscando do banco");

        Cache::add($this->getCacheName($request), $response, 5);

        return $response;
    }

    private function getCacheName($request)
    {
        return Route::currentRouteName() . serialize($request->all());
    }
}

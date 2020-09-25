<?php

namespace App\Dominio\Facade;

use App\Models\Geral\Mensagem;
use Illuminate\Support\Facades\Auth;

class AdminFacade
{
    public static function getMessages()
    {
        $user = Auth::user();

        return Mensagem::where([
            'from_user_id' => $user->id
        ])->orWhere([
            'to_user_id' => $user->id
        ])->get();
    }
}

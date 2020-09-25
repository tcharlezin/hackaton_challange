<?php

namespace App\Traits;

use App\Models\Geral\Perfil;
use App\Models\Usuario\Configuracao;
use File;
use Session;

trait UserDefault
{
    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function configuracao()
    {
        return $this->hasOne(Configuracao::class);
    }

    public function getProfilePicture()
    {
        $sessionName = "profile_picture_" . $this->id;

        if (Session::has($sessionName))
        {
            return Session::get($sessionName);
        }

        $newImg = asset("admin/img/profile-photos/" . rand(1, 10) . ".png");
        Session::put($sessionName, $newImg);
        return $newImg;
    }

    public function firstName()
    {
        return "@". $this->username;
    }
}

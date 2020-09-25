<?php

namespace App\Traits;

use App\Models\Geral\Perfil;
use App\Models\Usuario\Configuracao;
use Carbon\Carbon;
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

    public function IsPerfilCompleto()
    {
        // return $this->is_completo;
        return
            $this->isPreencheuDadosPessoais() &&
            $this->isPreencheuConfiguracoes() &&
            $this->isPreencheuFoto();
    }

    public function isPreencheuDadosPessoais()
    {
        return $this->preencheu_dados_pessoais;
    }

    public function isPreencheuConfiguracoes()
    {
        return $this->preencheu_configuracao;
    }

    public function isPreencheuFoto()
    {
        return $this->preencheu_foto;
    }

    public static function buscarPorUsername($username)
    {
        return self::where("username", $username)->first();
    }

    public function obterLinkPerfil()
    {
        return "/perfil/" . $this->username;
    }

    public function obterLocalizacao()
    {
        return $this->cidade->descricao . " / " . $this->estado->uf;
    }

    public function setDataNascimentoAttribute($value)
    {
        if (!is_null($value))
        {
            $value = Carbon::createFromFormat('d/m/Y', $value);
        }

        $this->attributes['data_nascimento'] = $value;
    }

    public function getDataNascimentoAttribute($value)
    {
        if (is_null($value))
        {
            return $value;
        }

        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getProfilePicture()
    {
        if (File::exists($this->avatar))
        {
            return asset($this->avatar);
        }
        else
        {
            $this->avatar = null;
            $this->save();
        }

        $sessionName = "profile_picture_" . $this->id;

        if (Session::has($sessionName))
        {
            return Session::get($sessionName);
        }

        // Here will load a random picture by gender, and set at session
        if ($this->isMale())
        {
            $newImg = asset("admin/img/profile-photos/" . rand(1, 5) . ".png");
            Session::put($sessionName, $newImg);
            return $newImg;
        }
        else
        {
            $newImg = asset("admin/img/profile-photos/" . rand(6, 10) . ".png");
            Session::put($sessionName, $newImg);
            return $newImg;
        }
    }

    public function isMale()
    {
        return $this->sexo == "m";
    }

    public function isFemale()
    {
        return $this->sexo == "f";
    }

    public function firstName()
    {
        return "@". $this->username;
    }
}

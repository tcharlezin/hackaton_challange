<?php

namespace App\Models\Geral;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    const ADMINISTRADOR = 1;
    const USUARIO = 2;

    protected $fillable = ["name"];

    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}

<?php

namespace App\Models;

use App\Models\Usuario\Configuracao;
use App\Traits\UserDefault;
use App\Traits\Uuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $keyType = 'string';
    public $incrementing = false;

    use Notifiable;
    use UserDefault;
    use Uuid;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'perfil_id', 'document', 'sexo'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}

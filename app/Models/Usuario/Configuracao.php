<?php

namespace App\Models\Usuario;

use App\Models\Model;
use App\Models\User;
use App\Traits\Uuid;

class Configuracao extends Model
{
    use Uuid;

    protected $table = "configuracao";

    protected $fillable = [
        "user_id",
        "privacidade_exibir_email",
        "notificacao_email_plataforma",
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}

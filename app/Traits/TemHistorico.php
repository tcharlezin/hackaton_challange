<?php

namespace App\Traits;

use App\Models\Auditoria\AtividadeUsuario;

trait TemHistorico
{
    public function historico()
    {
        return $this->morphMany(AtividadeUsuario::class, 'model');
    }
}

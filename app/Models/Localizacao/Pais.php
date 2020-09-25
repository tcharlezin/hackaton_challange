<?php

namespace App\Models\Localizacao;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TemHistorico;
use App\Models\User;

class Pais extends Model
{
    use TemHistorico;

    protected $fillable = ["descricao", "sigla"];

    public function estados()
    {
        return $this->belongsTo(Estado::class);
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public static function listarParaComboBox()
    {
        return self::all()->sortBy('descricao')->pluck('descricao', 'id');
    }
}

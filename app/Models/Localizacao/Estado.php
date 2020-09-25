<?php

namespace App\Models\Localizacao;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TemHistorico;
use App\Models\User;

class Estado extends Model
{
    use TemHistorico;

    protected $fillable = ["descricao", "uf", "pais_id"];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }

    public static function listarParaComboBox()
    {
        return self::all()->sortBy('descricao')->pluck('descricao', 'id');
    }
}

<?php

namespace App\Dominio\Uploads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FotoParaExtrair
{
    private $model;
    private $arquivo;
    private $name;

    function __construct($name, Model $model, $arquivo)
    {
        $this->model = $model;
        $this->arquivo = $arquivo;
        $this->name = $name;
    }

    public function executar()
    {
        $arquivoAntigo = HelperUploader::uploaderPathTemporario($this->name) . $this->arquivo;

        if (!Storage::exists($arquivoAntigo))
        {
            throw new \Exception("Não foi possível localizar a foto!");
        }

        $arquivoNovo = HelperUploader::uploaderPathStorage($this->model->getUploadDirectory(), $this->model->getIdentify()) . $this->arquivo;

        Storage::put($arquivoNovo, Storage::get($arquivoAntigo));
        Storage::delete($arquivoAntigo);
    }
}

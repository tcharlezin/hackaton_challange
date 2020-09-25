<?php

namespace App\Dominio\Uploads\Handler;

use App\Dominio\Uploads\FotoParaExtrair;
use App\Dominio\Uploads\HelperUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ArmazenarFotos
{
    private $name;
    private $model;
    private $arquivos;

    private $listaFotosExtrair;

    function __construct($name, Model $model, $arquivos)
    {
        $this->model = $model;
        $this->arquivos = $arquivos;
        $this->listaFotosExtrair = collect();
        $this->name = $name;
    }

    public function executar()
    {
        $this->carregarListaArquivos();
        $this->limparDiretorio();
        $this->salvarFotos();
    }

    private function carregarListaArquivos()
    {
        foreach ($this->arquivos as $arquivo)
        {
            $this->listaFotosExtrair->push(new FotoParaExtrair($this->name, $this->model, $arquivo));
        }
    }

    private function limparDiretorio()
    {
        if ($this->model->cleanOnUpdate())
        {
            $pathModel = HelperUploader::uploaderPathStorage($this->model->getUploadDirectory(), $this->model->getIdentify());

            $arquivos = Storage::files($pathModel);

            foreach ($arquivos as $arquivoAnterior)
            {
                Storage::delete($arquivoAnterior);
            }
        }
    }

    private function salvarFotos()
    {
        foreach ($this->listaFotosExtrair as $fotoParaExtrair)
        {
            $fotoParaExtrair->executar();
        }
    }

}

<?php

namespace App\Traits;

use App\Dominio\Uploads\HelperUploader;
use Illuminate\Support\Facades\Storage;

trait TemUploadsTrait
{
    public abstract function getUploadDirectory();

    public abstract function getIdentify();

    public abstract function cleanOnUpdate();

    public function getFile()
    {
        $storagePath = HelperUploader::uploaderPathStorage($this->getUploadDirectory(), $this->getIdentify());

        $arquivos = Storage::files($storagePath);

        if (isset($arquivos[0]))
        {
            return Storage::url($arquivos[0]);
        }

        return null;
    }

    public function getFiles()
    {
        $storagePath = HelperUploader::uploaderPathStorage($this->getUploadDirectory(), $this->getIdentify());
        $arquivos = Storage::files($storagePath);

        $fotos = collect();

        foreach ($arquivos as $arquivo)
        {
            $propriedade = [];
            $propriedade["url"] = Storage::url($arquivo);
            $propriedade["size"] = Storage::size($arquivo);
            $propriedade["mime_type"] = Storage::mimeType($arquivo);
            $propriedade['name'] = pathinfo(public_path() . '/uploads/' . $arquivo)["basename"];

            $fotos->push($propriedade);
        }

        return $fotos->toArray();
    }

    public function removeFiles($file = null)
    {
        if (is_null($file))
        {
            $this->deleteAllFiles();
        }
        else
        {
            $this->deleteFile($file);
        }
    }

    private function deleteAllFiles()
    {
        $storagePath = HelperUploader::uploaderPathStorage($this->getUploadDirectory(), $this->getIdentify());

        $arquivos = Storage::files($storagePath);

        foreach ($arquivos as $arquivo)
        {
            Storage::delete($arquivo);
        }
    }

    private function deleteFile($file)
    {
        $storagePath = HelperUploader::uploaderPathStorage($this->getUploadDirectory(), $this->getIdentify());

        Storage::delete($storagePath . $file);
    }
}

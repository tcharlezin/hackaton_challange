<?php

namespace App\Dominio\Uploads;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadFileTmp
{
    private $name;
    private $dados;
    private $filename;

    public function __construct($name, $dados)
    {
        $this->name = $name;
        $this->dados = $dados;
    }

    public function execute()
    {
        $uploadFile = $this->dados["file"];

        $extension = $uploadFile->getClientOriginalExtension();

        $fullpath = HelperUploader::uploaderPathTemporario($this->name);

        $this->filename = Str::random(30) . ".{$extension}";

        Storage::putFileAs($fullpath, $uploadFile, $this->filename);
    }

    public function getFilename()
    {
        return $this->filename;
    }
}

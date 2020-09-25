<?php

namespace App\Components\Uploads;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadFileTmp
{
    private $dados;
    private $filename;

    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    public function execute()
    {
        $uploadFile = $this->dados["file"];

        $extension = $uploadFile->getClientOriginalExtension();

        $fullpath = HelperUploader::uploaderPathTemporario();

        $this->filename = Str::random(30) . ".{$extension}";

        Storage::putFileAs($fullpath, $uploadFile, $this->filename);
    }

    public function getFilename()
    {
        return $this->filename;
    }
}

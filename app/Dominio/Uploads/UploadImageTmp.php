<?php

namespace App\Dominio\Uploads;

use EventoManager\Models\Empresa;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadImageTmp
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
        $requestImage = $this->dados["file"];

        $extension = $requestImage->getClientOriginalExtension();
        $requestImagePath = $requestImage->getRealPath() . ".{$extension}";

        $imagem = Image::make($requestImage);

        /* Aplicando resize à imagem

        $interventionImage = $imagem->resize(null, 600, function ($constraint)
        {
            $constraint->aspectRatio();
        })->encode($extension);

        */
        $interventionImage = $imagem->encode($extension);

        $interventionImage->save($requestImagePath);

        // Send the image to file storage
        $fullpath = HelperUploader::uploaderPathTemporario($this->name);

        $this->filename = Str::random(30) . ".{$extension}";

        Storage::putFileAs($fullpath, new File($requestImagePath), $this->filename);
    }

    public function getFilename()
    {
        return $this->filename;
    }
}

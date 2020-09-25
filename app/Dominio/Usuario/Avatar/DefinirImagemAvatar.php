<?php

namespace App\Dominio\Usuario\Avatar;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\User;

class DefinirImagemAvatar
{
    private $usuario;
    private $base64;
    private $arquivoOriginal;
    private $arquivoGerado;

    public function __construct(User $usuario, $base64, $arquivoOriginal)
    {
        $this->usuario = $usuario;
        $this->base64 = $base64;
        $this->arquivoOriginal = $arquivoOriginal;
    }

    public function executar()
    {
        $this->GerarImagem();
        $this->ResetarSessao();
        $this->SalvarAvatar();
    }

    private function GerarImagem()
    {
        // Get the file from the request
        $requestImage = $this->arquivoOriginal;

        // Get the filepath of the request file (.tmp) and append .jpg
        $requestImagePath = $requestImage->getRealPath() . '.jpg';

        // Modify the image using intervention
        $interventionImage = Image::make($this->base64)->encode('jpg');

        // Save the intervention image over the request image
        $interventionImage->save($requestImagePath);

        // Send the image to file storage
        $this->arquivoGerado = Storage::putFile('public/users/' . $this->usuario->id, new File($requestImagePath));

        // Delete tmp file
        $interventionImage->destroy();
    }

    private function ResetarSessao()
    {
        Session::forget("profile_picture");
    }

    private function SalvarAvatar()
    {
        $this->usuario->avatar = str_replace("public/", "storage/", $this->arquivoGerado);
        $this->usuario->save();
    }
}

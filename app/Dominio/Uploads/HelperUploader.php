<?php

namespace App\Dominio\Uploads;

class HelperUploader
{
    public static function uploaderPathTemporario($name)
    {
        return sprintf("tmp/{$name}/uploads/");
    }

    public static function uploaderPathStorage($directory, $identifier)
    {
        return sprintf("public/{$directory}/{$identifier}/uploads/");
    }
}

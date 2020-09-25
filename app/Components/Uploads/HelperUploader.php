<?php

namespace App\Components\Uploads;

class HelperUploader
{
    public static function uploaderPathTemporario()
    {
        return sprintf("tmp/uploads/");
    }

    public static function uploaderPathStorage($identifier)
    {
        return sprintf("public/%s/uploads/", $identifier);
    }
}

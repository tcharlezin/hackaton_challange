<?php

namespace App\Traits;

trait TemImagemTrait
{
    use TemUploadsTrait;

    public abstract function getImagem();
}

<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait Uuid
{
    public static function bootUuid()
    {
        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), \Ramsey\Uuid\Uuid::uuid4());
        });
    }
}

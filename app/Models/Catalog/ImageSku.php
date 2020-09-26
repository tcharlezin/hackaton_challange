<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class ImageSku extends Model
{
    protected $table = "image_sku";

    protected $fillable = ["image_id", "sku_id"];

    protected $guarded = [];
}

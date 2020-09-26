<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = "image_product";

    protected $fillable = ["image_id", "product_id"];

    protected $guarded = [];
}

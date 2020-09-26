<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    protected $table = "brand_product";

    protected $fillable = ["brand_id", "product_id"];

    protected $guarded = [];
}

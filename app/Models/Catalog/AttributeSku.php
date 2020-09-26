<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class AttributeSku extends Model
{
    protected $table = "attribute_sku";

    protected $fillable = ["sku_id", "attribute_id", "value", 'featured'];

    protected $guarded = [];
}

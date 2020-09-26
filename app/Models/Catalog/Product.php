<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["code", "name"];

    protected $guarded = [];

    public function brand()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}

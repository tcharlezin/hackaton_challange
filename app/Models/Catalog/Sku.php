<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $fillable = [
        'code',
        'name',
        'product_id',
        'price',
        'seller_id'
    ];

    protected $guarded = [];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)
                    ->withPivot('value', 'featured')
                    ->withTimestamps();
    }
}

<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ["name"];
    protected $guarded = [];
}

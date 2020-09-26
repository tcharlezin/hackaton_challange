<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ["name", "has_options"];
    protected $guarded = [];
}

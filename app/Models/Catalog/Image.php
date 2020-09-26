<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ["url"];
    protected $guarded = [];
}

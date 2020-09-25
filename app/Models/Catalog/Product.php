<?php

namespace App\Models\Catalog;

use App\Models\Stock\Production;
use App\Traits\TemImagemTrait;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\VarDumper;

class Product extends Model
{
    use TemImagemTrait;

    protected $appends = ["image"];

    protected $fillable = [
        "name",
        "category_id",
        "price",
        "ref",
        "description",
    ];

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, ",", ".");
    }

    public function setPriceAttribute($value)
    {
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);

        $this->attributes['price'] = $value;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function production()
    {
        return $this->hasOne(Production::class);
    }

    public function getImageAttribute()
    {
        return $this->getImagem();
    }

    public function hasFabricacao()
    {
        if(is_null($this->production))
        {
            return false;
        }

        return true;
    }

    public function getImagem()
    {
        $image = $this->getFile();

        if (!is_null($image))
        {
            return $image;
        }

        return "";
    }

    public function getUploadDirectory()
    {
        return "produtos";
    }

    public function getIdentify()
    {
        return md5($this->name);
    }

    public function cleanOnUpdate()
    {
        return true;
    }
}

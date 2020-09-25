<?php

namespace App\Http\Requests\Catalog;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest implements BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    public function messages()
    {
        return [];
    }
}

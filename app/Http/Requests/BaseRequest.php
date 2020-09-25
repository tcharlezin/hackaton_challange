<?php

namespace App\Http\Requests;

interface BaseRequest
{
    public function authorize();

    public function rules();
}

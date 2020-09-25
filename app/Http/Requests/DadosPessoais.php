<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DadosPessoais extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return
        [
            'username' => 'required|alpha',
            'data_nascimento' => 'required',
            'document' => 'required',
            'estado_id' => 'required',
            'cidade_id' => 'required',
        ];
    }

    public function messages()
    {
        return
        [
            'username.required' => "É necessário preencher um nome de usuário!",
            'username.alpha' => "O nome de usuário deve conter apenas letras alfabéticas, sem numerações ou outros caracteres especiais.",
            'data_nascimento.required' => "É necessário preencher uma data de nascimento!",
            'document.required' => "É necessário preencher um documento!",
            'estado_id.required' => "É necessário preencher um estado!",
            'cidade_id.required' => "É necessário preencher uma cidade!",
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:255',
            'preco' => 'required|numeric|min:0',
            'duracao_minutos' => 'required|integer|min:1',
        ];
    }
}

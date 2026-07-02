<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100',
            'data_nascimento' => 'nullable|date',
            'sexo' => 'required|in:M,F',
            'cliente_id' => 'required|exists:clientes,id',
            'raca_id' => 'required|exists:racas,id',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('cliente');
        return [
            'nome' => 'required|string|max:150',
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $id,
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:150',
            'endereco' => 'nullable|string|max:255',
        ];
    }
}

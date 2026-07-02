<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendamentoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'pet_id' => 'required|exists:pets,id',
            'servico_id' => 'required|exists:servicos,id',
            'data_hora' => 'required|date',
            'status' => 'required|in:pendente,confirmado,concluido,cancelado',
            'observacoes' => 'nullable|string',
        ];
    }
}

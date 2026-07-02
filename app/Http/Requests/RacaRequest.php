<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RacaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100',
            'especie_id' => 'required|exists:especies,id',
        ];
    }
}

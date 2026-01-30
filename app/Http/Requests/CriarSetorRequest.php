<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarSetorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:100',
            'sigla' => 'required|max:10',
            'unidade_id' => 'required|exists:unidade,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => "Informe o nome da setor",
            'nome.max' => "Nome deve ter mais que 100 caracteres",
            'sigla.required' => "Informe o sigla da setor",
            'sigla.max' => "Sigla deve ter mais que 10 caracteres",
            'unidade_id.required' => "Selecione uma unidade",
        ];
    }
}

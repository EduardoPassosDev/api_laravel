<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarUnidadeRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'sigla' => ['required', 'string', 'max:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => "O campo nome deve ser preenchido",
            'nome.max' => "O campo nome deve ter menos que 255 caracteres",
            'nome.string' => "O campo nome deve ser preenchido",
            'sigla.required' => "O campo Sigla deve ser preenchido",
            'sigla.string' => "O campo Sigla deve ser preenchido",
            'sigla.max' => "O campo Sigla deve ter menos que 10 caracteres"
        ];
    }
}

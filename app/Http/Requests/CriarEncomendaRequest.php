<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarEncomendaRequest extends FormRequest
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
            'setor_id' => 'required',
            'nome_completo' => 'required',
            'descricao' => 'required',
            'unidade_id' => 'required',
            'is_coletado' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome_completo.required' => 'Nome é obrigatorio',
            'setor_id.required' => 'O Setor é Obrigatorio',
            'unidade_id.required' => 'A unidade é Obrigatoria',
            'descricao.required' => 'A descrição do produto é obrigatoria',
            'is_coletado.required' => 'É preicos informa se já foi coletado'
        ];
    }
}

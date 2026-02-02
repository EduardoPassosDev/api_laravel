<?php

namespace App\Http\Requests;

use App\Enums\EntregaTamanho;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CriarEntregaRequest extends FormRequest
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
            'recebido_por' => 'required|string',
            'tamanho_pacote' => 'required', new Enum(EntregaTamanho::class),
            'descricao' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'recebido_por.required' => "Tem que especificar o nome de quem coletou",
            'tamanho_pacote' => "Escolha o tamanho do pacote",
            'descricao.required' => "Tem que especificar a descricao",

        ];
    }
}

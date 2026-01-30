<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarUsuarioRequest extends FormRequest
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
            'name'  => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'email.email'   => 'Email inválido',
            'password.min'     => 'Senha deve ter no mínimo 6 caracteres',
            'password.required' => 'A senha é Obrigátorio'
        ];
    }
}

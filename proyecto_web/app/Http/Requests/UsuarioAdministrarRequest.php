<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioAdministrarRequest extends FormRequest
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
            'email' => ['required','email'],
            'nombre' => ['required','min:3'],
        ];
    }

    public function messages():array
    {
        return [
            'email.required' => 'Indique correo electronico',
            'email.email' => 'Foramto de correo inválido',
            'nombre.required' => 'Indique nombre de usuario',
            'nombre.min' => 'El nombre debe tener al menos 3 carácteres.',
        ];
    }
}

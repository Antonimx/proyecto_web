<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'email' => ['required'],
            'nombre' => ['required'],
            'password' => ['required', 'min:8'],
            'perfil_id' => ['required'],
        ];
    }
    
    public function messages():array
    {
        return [
            'email.required' => 'Indique correo electronico',
            'nombre.required' => 'Indique nombre de usuario',
            'password.min' => 'La contraseña debe contener al menos 8 caracteres',
            'password.required' => 'Indique la contraseña',
            'perfil_id.required' => 'Seleccione perfil de usuario',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
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
            'emailUpdate' => ['required'],
            'nombreUpdate' => ['required'],
            'perfil_idUpdate' => ['required'],
        ];
    }
    
    public function messages():array
    {
        return [
            'emailUpdate.required' => 'Indique correo electronico',
            'nombreUpdate.required' => 'Indique nombre de usuario',
            'perfil_idUpdate.required' => 'Seleccione perfil de usuario',
        ];
    }
}

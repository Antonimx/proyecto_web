<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdateRequest extends FormRequest
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
            'nombreUpdate' => ['required','alpha'],
            'telefonoUpdate' => ['required','numeric'],
        ];
    }

    public function messages(): array
    {

        return [
            'nombreUpdate.required' => 'Por favor indicar el nombre.',
            'nombreUpdate.alpha' => 'El nombre solo debe contener letras.',
            'telefonoUpdate.required' => 'Por favor indicar el numero de telefono.',
            'telefonoUpdate.numeric' => 'el telefono solo debe contener numeros.',
        ];
    }
}

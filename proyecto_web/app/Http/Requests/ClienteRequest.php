<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'rut' => ['required'],
            'nombre' => ['required','alpha'],
            'fono' => ['required','numeric'],
        ];
    }

    public function messages(): array
    {

        return [
            'rut.required' => 'Por favor indicar el rut.',
            'nombre.required' => 'Por favor indicar el nombre.',
            'nombre.alpha' => 'El nombre solo debe contener letras.',
            'fono.required' => 'Por favor indicar el numero de telefono.',
            'fono.numeric' => 'el telefono solo debe contener numeros.',
        ];
    }
}   
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoUpdateRequest extends FormRequest
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
            'nombreUpdate' => ['required', 'min:3'],
            'descripcionUpdate' => ['required','min:20','max:300'],
            'marcaUpdate' => ['required','min:3'],
            'modeloUpdate' => ['required', 'min:3'],
            'imagenUpdate' => ['image', 'mimes:png,jpg,jpeg'],

        ];
    }

    public function messages(): array
    {

        return [
            'nombreUpdate.required' => 'Indique nombre del vehículo',
            'descripcionUpdate.required' => 'Indique descripcion del vehículo',
            'marcaUpdate.required' => 'Indique marca del vehículo',
            'modeloUpdate.required' => 'Indique modelo del vehículo',

            'nombreUpdate.min' => 'Debe tener al menos 3 carácteres',
            'descripcionUpdate.min' => 'Debe tener al menos 20 carácteres',
            'marcaUpdate.min' => 'Debe tener al menos 3 carácteres',
            'modeloUpdate.min' => 'Debe tener al menos 3 carácteres',

            'descripcionUpdate.max' => 'Debe tener máximo 300 carácteres',

            'imagenUpdate.image' => 'Debe ser una imagen',
            'imagenUpdate.mimes' => 'Debe ser formato png, jpg, o jpeg',
        ];
    }
}

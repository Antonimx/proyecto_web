<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TipoVehiculoRule;

class VehiculoRequest extends FormRequest
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
            'patente' => ['required','alpha_num','size:6'],
            'nombre' => ['required', 'min:3'],
            'descripcion' => ['required','min:20','max:300'],
            'marca' => ['required','min:3'],
            'modelo' => ['required', 'min:3'],
            'imagen' => ['required','image', 'mimes:png,jpg,jpeg'],
            'tipo_id' => [new TipoVehiculoRule(request('tipo_id'))],
        ];
    }

    public function messages(): array
    {

        return [
            'patente.required' => 'Indique patente del vehículo',
            'nombre.required' => 'Indique nombre del vehículo',
            'descripcion.required' => 'Indique descripcion del vehículo',
            'marca.required' => 'Indique marca del vehículo',
            'modelo.required' => 'Indique modelo del vehículo',
            'imagen.required' => 'Indique imagen del vehículo',

            'patente.size' => 'Debe tener 6 carácteres',
            'patente.alpha_num' => 'No puede tener carácteres especiales',

            'nombre.min' => 'Debe tener al menos 3 carácteres',
            'descripcion.min' => 'Debe tener al menos 20 carácteres',
            'marca.min' => 'Debe tener al menos 3 carácteres',
            'modelo.min' => 'Debe tener al menos 3 carácteres',

            'descripcion.max' => 'Debe tener máximo 300 carácteres',
            
            'imagen.image' => 'Debe ser una imagen',
            'imagen.mimes' => 'Debe ser formato png, jpg, o jpeg',

        ];
    }
}

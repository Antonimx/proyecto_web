<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RutArriendoRule;
use App\Rules\PatenteArriendoRule;


class ArriendoRequest extends FormRequest
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
            'rut' => ['required',new RutArriendoRule(request('rut'))],
            'patente' => ['required',new PatenteArriendoRule(request('patente'))],
            'fecha_inicio' => ['required', 'date'],
            'hora_inicio' => ['required', 'date_format:H:i'],
        ];
    }
    
    public function messages():array
    {
        return [
            'rut.required' => 'Indique el rut del cliente',
            'patente.required' => 'Indique la patente del vehículo',
            'fecha_inicio.required' => 'Indique la fecha',
            'hora_inicio.required' => 'Indique la hora',
        ];
    }
}

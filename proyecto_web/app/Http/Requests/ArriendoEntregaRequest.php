<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FechaEntregaRule;
use App\Rules\HoraEntregaRule;


class ArriendoEntregaRequest extends FormRequest
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
            'fecha_entrega' => ['required', 'date', new FechaEntregaRule(request('arriendo'))],
            'hora_entrega' =>['required','date_format:H:i', new HoraEntregaRule(request('arriendo'))],
            'imagen_entrega' => ['required','image','mimes:png,jpg,jpeg']
        ];
    }

    public function messages():array
    {
        return [
            'fecha_entrega.required' => 'Indique la fecha de entrega',
            'hora_entrega.required' => 'Indique la hora de entrega',
            'imagen_entrega.required' => 'Indique la imagen de entrega',

            'imagen_entrega.image' => 'Debe ser una imagen',
            'imagen_entrega.mimes' => 'Error de formato, solo puede ser png, jpg o jpeg',
        ];
    }
}

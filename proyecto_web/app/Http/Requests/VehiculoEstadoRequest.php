<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\EstadoUpdateRule;


class VehiculoEstadoRequest extends FormRequest
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
            'estado' => ['required', Rule::in([0,1,3]), new EstadoUpdateRule(request('patente'))],
        ];
    }

    public function messages(): array
    {

        return [
            'estado.required' => 'Indique el estado',
            'estado.in' => 'No existe ese estado',
        ];
    }
}

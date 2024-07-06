<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoUpdateRequest extends FormRequest
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
            'nombreUpdate' => ['required'],
            'valorUpdate' => ['required','int','gt:1'],
        ];
    }
    
    public function messages():array
    {
        return [
            'nombreUpdate.required' => 'Indique nombre del tipo vehiculo',
            'valorUpdate.required' => 'Indique la el valor',
            'valorUpdate.int' => 'Indique un valor numerico',
            'valorUpdate.gt' => 'El valor debe ser mayor a 1',
        ];
    }
}

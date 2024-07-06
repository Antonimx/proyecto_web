<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Vehiculo;


class EstadoUpdateRule implements ValidationRule
{
    private $vehiculoPatente;

    public function __construct($vehiculoPatente){
        $this->vehiculoPatente = $vehiculoPatente;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $vehiculo = Vehiculo::find($this->vehiculoPatente);
        if($vehiculo->estado == 2){
            $fail('No puede cambiar el estado de un vehículo arrendado');
        }
    }
}

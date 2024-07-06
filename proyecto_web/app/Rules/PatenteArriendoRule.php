<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Vehiculo;

class PatenteArriendoRule implements ValidationRule
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
        if(Vehiculo::find($this->vehiculoPatente) == null){
            $fail('No existe vehiculo con esa patente en los registros.');
        }
    }
}

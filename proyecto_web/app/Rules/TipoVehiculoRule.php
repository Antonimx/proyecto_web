<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Tipo;

class TipoVehiculoRule implements ValidationRule
{
    private $tipoVehiculoId;

    public function __construct($tipoVehiculoId){
        $this->tipoVehiculoId = $tipoVehiculoId;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->tipoVehiculoId == 0){
            $fail('Indique tipo de vehiculo');

        } else{
            if( Tipo::find($this->tipoVehiculoId) == null){
                $fail('No existe ese tipo de auto en nuestros registros.');
            } 
        }
    }
}

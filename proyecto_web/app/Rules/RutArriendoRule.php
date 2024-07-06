<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Cliente;


class RutArriendoRule implements ValidationRule
{
    private $clienteRut;

    public function __construct($clienteRut){
        $this->clienteRut = $clienteRut;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if( Cliente::find($this->clienteRut) == null){
            $fail('No existe cliente con ese rut en los registros.');
        }
    }
}

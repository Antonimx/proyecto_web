<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Arriendo;


class FechaEntregaRule implements ValidationRule
{
    private $arriendoId;

    public function __construct($arriendoId){
        $this->arriendoId = $arriendoId;
    }
    
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $arriendo = Arriendo::find($this->arriendoId);
        if ($value < $arriendo->fecha_inicio){
            $fail('La fecha de entrega no puede ser anterior a la fecha de inicio del arriendo');
        }
    }
}

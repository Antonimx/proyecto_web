<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Arriendo;
use Illuminate\Support\Carbon;


class HoraEntregaRule implements ValidationRule
{
    
    private $arriendoId;
    private $fechaEntrega;

    public function __construct($arriendoId,$fechaEntrega){
        $this->arriendoId = $arriendoId;
        $this->fechaEntrega = $fechaEntrega;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $arriendo = Arriendo::find($this->arriendoId);
        $horaInicio = Carbon::parse($arriendo->hora_inicio);
        if($this->fechaEntrega == $arriendo->fecha_inicio && $value < $arriendo->hora_inicio){
            $fail('La hora no puede ser antes que la del inicio del arriendo.');
        }
    }
}

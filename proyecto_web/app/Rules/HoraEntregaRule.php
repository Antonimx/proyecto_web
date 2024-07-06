<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Arriendo;
use Illuminate\Support\Carbon;


class HoraEntregaRule implements ValidationRule
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
        $fechaHoy = Carbon::now()->toDateString();
        $horaInicio = Carbon::parse($arriendo->hora_inicio);

        if($fechaHoy == $arriendo->fecha_inicio && $value < $horaInicio){
            $fail('La hora no puede ser antes que la del inicio del arriendo.');
        }
    }
}

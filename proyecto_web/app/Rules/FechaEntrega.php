<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Arriendo;

class FechaEntrega implements Rule
{
    protected $arriendoId;

    public function __construct($arriendoId)
    {
        $this->arriendoId = $arriendoId;
    }

    public function passes($attribute, $value)
    {
        // Obtener la fecha de inicio del arriendo
        $arriendo = Arriendo::findOrFail($this->arriendoId);
        $fechaInicioArriendo = $arriendo->fecha_inicio;

        // Validar que la fecha de entrega sea mayor o igual a la fecha de inicio del arriendo
        return $value >= $fechaInicioArriendo;
    }

    public function message()
    {
        return 'La fecha de entrega no puede ser anterior a la fecha de inicio del arriendo.';
    }
}


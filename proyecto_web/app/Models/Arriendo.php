<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


class Arriendo extends Model
{
    use HasFactory;
    protected $table ='arriendos';
    public $timestamps = false;

    protected $fillable = [
        'fecha_inicio',
        'hora_inicio',
        'imagen_inicio',
        'rut',
        'patente',
    ];
    
    // CUANDO NO SE USA ID COMO PK, SE TIENE QUE ESPECIFICAR LA PK Y FK AL HACER RELACION
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class,'rut', 'rut');
    }
    
    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class,'patente', 'patente');
    }
    
    // Mutador para campo 'hora_entrega'
    public function getHoraEntregaAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value);
    }

    // Mutador para campo 'hora_inicio'
    public function getHoraInicioAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value);
    }
}

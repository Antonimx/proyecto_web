<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Arriendo extends Model
{
    use HasFactory;
    protected $table ='arriendos';
    public $timestamps = false;

    protected $fillable = [
        'fecha_inicio',
        'imagen_inicio',
        'fecha_entrega',
        'hora_entrega',
        'imagen_entrega',
        'rut',
        'patente',
    ];
    
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
    
    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class);
    }
}

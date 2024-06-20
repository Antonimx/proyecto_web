<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory,SoftDeletes;
    protected $table = 'usuarios';
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function perfil():BelongsTo
    {
        return $this->belongsTo(Perfil::class);
    }

    public function vehiculos():BelongsToMany
    {
        return $this->belongsToMany(Vehiculo::class)->withPivot(['fehca_inicio','fecha_entrega','hora_entrega','imagen_entrega']);
    }
}

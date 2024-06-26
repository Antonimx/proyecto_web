<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'clientes';
    protected $primarykey = 'rut';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
        'rut',
        'nombre',
        'fono',
    ];

    public function arriendos():HasMany
    {
        return $this->hasMany(Arriendo::class);
    }
}

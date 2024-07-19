<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propetario extends Model
{
    //use HasFactory;

    protected $primaryKey = 'propietario_id';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'cuit',
        'email',
        'direccion',
        'altura',
        'cuidad',
        'pais',
        'provincia',
        'barrio',
        'codigo_postal',
        'numero_de_telefono',
        'fecha_de_nacimiento',
        'pais',
    ];

    public function prefijoTelefonico(): BelongsTo
    {
        return $this->belongsTo(
            PrefijoTelefonico::class,
            'prefijo_telefonico_fk_id',
            'prefijo_telefonico_id'
        );
    }
}

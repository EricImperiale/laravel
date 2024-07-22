<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Propiedad extends Model
{
    //use HasFactory;

    protected $primaryKey = 'propiedad_id';

    protected $fillable = [
        'propiedad_id',
        'direccion',
        'altura',
        'departamento',
        'cuidad',
        'provincia',
        'barrio',
        'codigo_postal',
        'area_total',
        'area_cubierta',
        'descripcion',
        'precio_del_alquiler',
        'expensas',
        'piso',
        'numero_de_departamento',
        'es_uso_profesional',
        'es_interno',
        'antiguedad',
        'ambientes',
        'cuartos',
        'banios',
        'tdp_fk_id',
        'propietario_fk_id',
    ];

    public function tipoDePropiedad(): BelongsTo
    {
        return $this->belongsTo(
            TipoDePropiedad::class,
            'tdp_fk_id',
            'tdp_id',
        );
    }

    public function propietario(): BelongsTo
    {
        return $this->belongsTo(
            Propetario::class,
            'propietario_fk_id',
            'propietario_id',
        );
    }
}

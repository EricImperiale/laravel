<?php

namespace App\Models;

use App\Traits\FormatearDatos;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Propiedad extends Model
{
    //use HasFactory;

    use FormatearDatos;

    protected $table = 'propiedades';

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
        'estado_fk_id',
    ];

    protected function direccionCompleta(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->tdp_fk_id === 2) {
                    return $this->tipoDePropiedad->tipo_de_propiedad . ', ' . $this->direccion . ' ' . $this->altura . ', ' . $this->piso . $this->numero_de_departamento . ', ' . $this->barrio . ', ' . $this->provincia;
                }

                return  $this->tipoDePropiedad->tipo_de_propiedad . ', ' . $this->direccion . ' ' . $this->altura . ', ' . $this->barrio . ', ' . $this->provincia;
            }
        );
    }

    protected function alquiler(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->tdp_fk_id === 2) {
                    return $this->formatearPrecios($this->precio_del_alquiler, $this->expensas);
                }

                return $this->formatearPrecios($this->precio_del_alquiler, '');
            }
        );
    }

    protected function superfice(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->area_cubierta . ' m2';
            }
        );
    }

    protected function caracteristicas(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->ambientes;
            }
        );
    }

    public function tipoDePropiedad(): BelongsTo
    {
        return $this->belongsTo(
            TipoDePropiedad::class,
            'tdp_fk_id',
            'tdp_id',
        );
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(
            EstadoDePropiedad::class,
            'estado_fk_id',
            'estado_id',
        );
    }

    public function propietario()
    {
        return $this->belongsTo(
            Propietario::class,
            'propietario_fk_id',
            'propietario_id',
        );
    }
}

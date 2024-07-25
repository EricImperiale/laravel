<?php

namespace App\Models;

use App\Traits\FormatearDatos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 *
 *
 * @property int $contrato_id
 * @property int $precio_del_alquiler
 * @property string $fecha_de_comienzo
 * @property string $fecha_de_final
 * @property int $fecha_de_vencimiento
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $propietario_fk_id
 * @property int $inquilino_fk_id
 * @property-read \App\Models\Propietario $propietario
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato whereContratoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato whereFechaDeComienzo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato whereFechaDeFinal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato whereFechaDeVencimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato whereInquilinoFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato wherePrecioDelAlquiler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato wherePropietarioFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato whereUpdatedAt($value)
 * @property-read \App\Models\Inquilino $inquilino
 * @property int $propiedad_fk_id
 * @property-read \App\Models\Propiedad $propiedad
 * @method static \Illuminate\Database\Eloquent\Builder|Contrato wherePropiedadFkId($value)
 * @property-read mixed $calcular_diferencia
 * @mixin \Eloquent
 */
class Contrato extends Model
{
    //use HasFactory;

    use FormatearDatos;

    protected $primaryKey = 'contrato_id';

    protected $fillable = [
        'contrato_id',
        'precio_del_alquiler',
        'fecha_de_contrato',
        'fecha_de_comienzo',
        'fecha_de_final',
        'fecha_de_vencimiento',
        'propietario_fk_id',
        'inquilino_fk_id',
    ];

    protected function calcularDistancia(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->calcularDistanciaEntreFechas($this->fecha_de_comienzo, $this->fecha_de_final),
        );
    }

    public function propiedad(): BelongsTo
    {
        return $this->belongsTo(
            Propiedad::class,
            'propiedad_fk_id',
            'propiedad_id',
        );
    }

    public function propietario(): BelongsTo
    {
        return $this->belongsTo(
            Propietario::class,
            'propietario_fk_id',
            'propietario_id',
        );
    }

    public function inquilino(): BelongsTo
    {
        return $this->belongsTo(
            Inquilino::class,
            'inquilino_fk_id',
            'inquilino_id',
        );
    }
}

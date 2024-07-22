<?php

namespace App\Models;

use App\Traits\FormatearDatos;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $propiedad_id
 * @property string $direccion
 * @property int $altura
 * @property string $departamento
 * @property string $cuidad
 * @property string $provincia
 * @property string $barrio
 * @property int $codigo_postal
 * @property int $area_total
 * @property int $area_cubierta
 * @property string|null $descripcion
 * @property int $precio_del_alquiler
 * @property int $expensas
 * @property int $piso
 * @property int $numero_de_departamento
 * @property int $es_uso_profesional
 * @property int $es_interno
 * @property int $antiguedad
 * @property int $ambientes
 * @property int|null $cuartos
 * @property int|null $banios
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $tdp_fk_id
 * @property int $propietario_fk_id
 * @property-read \App\Models\Propetario $propietario
 * @property-read \App\Models\TipoDePropiedad $tipoDePropiedad
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereAltura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereAmbientes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereAntiguedad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereAreaCubierta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereAreaTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereBanios($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereBarrio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereCodigoPostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereCuartos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereCuidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereDepartamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereEsInterno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereEsUsoProfesional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereExpensas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereNumeroDeDepartamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad wherePiso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad wherePrecioDelAlquiler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad wherePropiedadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad wherePropietarioFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereTdpFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereUpdatedAt($value)
 * @property int $estado_fk_id
 * @property-read mixed $direccion_completa
 * @property-read \App\Models\EstadoDePropiedad $estado
 * @method static \Illuminate\Database\Eloquent\Builder|Propiedad whereEstadoFkId($value)
 * @mixin \Eloquent
 */
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

    public function propietario(): BelongsTo
    {
        return $this->belongsTo(
            Propetario::class,
            'propietario_fk_id',
            'propietario_id',
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
}

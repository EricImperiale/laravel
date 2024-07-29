<?php

namespace App\Models;

use App\Traits\FormatearDatos;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $garante_id
 * @property string $nombre
 * @property string $apellido
 * @property int $dni
 * @property int $cuit
 * @property string $email
 * @property string $direccion
 * @property int $altura
 * @property string $cuidad
 * @property string $pais
 * @property string $provincia
 * @property string $barrio
 * @property int $codigo_postal
 * @property int $codigo_de_area
 * @property string $numero_de_telefono
 * @property string $fecha_de_nacimiento
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $prefijo_telefonico_fk_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Contrato> $contratos
 * @property-read int|null $contratos_count
 * @property-read mixed $direccion_completa
 * @property-read mixed $nombre_completo
 * @property-read \App\Models\PrefijoTelefonico $prefijoTelefonico
 * @property-read mixed $telefono_completo
 * @method static \Illuminate\Database\Eloquent\Builder|Garante newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Garante newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Garante query()
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereAltura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereBarrio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereCodigoDeArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereCodigoPostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereCuidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereFechaDeNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereGaranteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereNumeroDeTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante wherePais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante wherePrefijoTelefonicoFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Garante whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Garante extends Model
{
    //use HasFactory;

    use FormatearDatos;

    protected $primaryKey = 'garante_id';

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
        'codigo_de_area',
        'numero_de_telefono',
        'fecha_de_nacimiento',
        'prefijo_telefonico_fk_id',
    ];

    protected function nombreCompleto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->nombre . ' ' . $this->apellido,
        );
    }

    protected function direccionCompleta(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->direccion . ' ' . $this->altura . ', ' . $this->barrio . ', ' . $this->provincia,
        );
    }

    protected function telefonoCompleto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => '+' . $this->prefijoTelefonico->prefijo . ' ' . $this->codigo_de_area . ' ' . $this->numero_de_telefono,
        );
    }

    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->capitalizarString($value),
        );
    }

    protected function apellido(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->capitalizarString($value),
        );
    }

    public function prefijoTelefonico(): BelongsTo
    {
        return $this->belongsTo(
            PrefijoTelefonico::class,
            'prefijo_telefonico_fk_id',
            'prefijo_telefonico_id'
        );
    }

    public function contratos(): HasMany
    {
        return $this->hasMany(
            Contrato::class,
            'garante_fk_id',
        );
    }
}

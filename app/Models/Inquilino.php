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
 * @property int $inquilino_id
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
 * @property-read \App\Models\PrefijoTelefonico $prefijoTelefonico
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereAltura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereBarrio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereCodigoDeArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereCodigoPostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereCuidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereFechaDeNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereInquilinoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereNumeroDeTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino wherePais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino wherePrefijoTelefonicoFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquilino whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inquilino extends Model
{
    //use HasFactory;

    use FormatearDatos;

    protected $primaryKey = 'inquilino_id';

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
            'inquilino_fk_id',
            'inquilino_id',
        );
    }
}

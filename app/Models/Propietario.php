<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\FormatearDatos;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 *
 *
 * @property int $propietario_id
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
 * @property string $codigo_postal
 * @property string $numero_de_telefono
 * @property string $fecha_de_nacimiento
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $prefijo_telefonico_fk_id
 * @property-read \App\Models\PrefijoTelefonico $prefijoTelefonico
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereAltura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereBarrio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereCodigoPostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereCuidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereFechaDeNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereNumeroDeTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario wherePais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario wherePrefijoTelefonicoFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario wherePropietarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereUpdatedAt($value)
 * @property-read mixed $direccion_completa
 * @property-read mixed $nombre_completo
 * @property int $codigo_de_area
 * @property-read mixed $telefono_completo
 * @method static \Illuminate\Database\Eloquent\Builder|Propietario whereCodigoDeArea($value)
 * @mixin \Eloquent
 */
class Propietario extends Model
{
    //use HasFactory;

    use FormatearDatos;

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

    public function propiedades()
    {
        return $this->hasMany(
            Propiedad::class,
            'propietario_fk_id',
        );
    }
}

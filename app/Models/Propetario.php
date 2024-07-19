<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\FormatearDatos;

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
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereAltura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereBarrio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereCodigoPostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereCuidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereFechaDeNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereNumeroDeTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario wherePais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario wherePrefijoTelefonicoFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario wherePropietarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propetario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Propetario extends Model
{
    //use HasFactory;

    use FormatearDatos;

    protected $table = 'propietarios';

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
}

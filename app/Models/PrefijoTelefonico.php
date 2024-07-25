<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $prefijo_telefonico_id
 * @property string $prefijo
 * @property string $pais
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PrefijoTelefonico newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrefijoTelefonico newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrefijoTelefonico query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrefijoTelefonico whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrefijoTelefonico wherePais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrefijoTelefonico wherePrefijo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrefijoTelefonico wherePrefijoTelefonicoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrefijoTelefonico whereUpdatedAt($value)
 * @property-read mixed $prefijos_telefonicos
 * @mixin \Eloquent
 */
class PrefijoTelefonico extends Model
{
    //use HasFactory;

    protected $primaryKey = 'prefijo_telefonico_id';

    protected $table = 'prefijo_telefonicos';

    protected function prefijosTelefonicos(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => '+' . $this->prefijo . ' ' . $this->pais,
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $tipo_de_moneda_id
 * @property string $moneda
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeMoneda newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeMoneda newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeMoneda query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeMoneda whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeMoneda whereMoneda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeMoneda whereTipoDeMonedaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeMoneda whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TipoDeMoneda extends Model
{
    //use HasFactory;

    protected $primaryKey = 'tipo_de_moneda_id';
}

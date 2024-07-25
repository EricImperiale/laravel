<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $estado_id
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoDePropiedad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoDePropiedad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoDePropiedad query()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoDePropiedad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoDePropiedad whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoDePropiedad whereEstadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoDePropiedad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EstadoDePropiedad extends Model
{
    //use HasFactory;

    protected $primaryKey = 'estado_id';

    protected $fillable = [
        'estado_id',
        'estado',
    ];
}

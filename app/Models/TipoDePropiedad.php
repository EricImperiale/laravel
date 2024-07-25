<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $tdp_id
 * @property string $tipo_de_propiedad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDePropiedad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDePropiedad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDePropiedad query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDePropiedad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDePropiedad whereTdpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDePropiedad whereTipoDePropiedad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDePropiedad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TipoDePropiedad extends Model
{
    //use HasFactory;

    protected $primaryKey = 'tdp_id';

    protected $fillable = [
        'tdp_id',
        'tipo_de_propiedad',
    ];
}

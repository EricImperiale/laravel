<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDePropiedad extends Model
{
    //use HasFactory;

    protected $table = 'estado_de_propiedades';

    protected $primaryKey = 'estado_id';

    protected $fillable = [
        'estado_id',
        'estado',
    ];
}

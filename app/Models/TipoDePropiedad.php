<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDePropiedad extends Model
{
    //use HasFactory;

    protected $primaryKey = 'tdp_id';

    protected $fillable = [
        'tdp_id',
        'tipo_de_propiedad',
    ];
}

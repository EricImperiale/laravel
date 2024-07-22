<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    public function index()
    {
        return view('propiedades.index', [
            'propiedades' => Propiedad::with(['tipoDePropiedad', 'propietario'])->paginate(2),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PrefijoTelefonico;
use App\Models\Propetario;
use Illuminate\Http\Request;

class PropietariosController extends Controller
{
    public function index()
    {
        $propietarios = Propetario::with(['prefijoTelefonico'])->paginate(2);

        return view('propietarios.index', [
            'propietarios' => $propietarios,
        ]);
    }

    public function formUpdate(int $propietario_id)
    {
        return view('propietarios.update-form', [
            'propietario_id' => $propietario_id,
            'propietario' => Propetario::findOrFail($propietario_id),
            'prefijo_telefonicos' => PrefijoTelefonico::all(),
        ]);
    }
}

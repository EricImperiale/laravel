<?php

namespace App\Http\Controllers;

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
}

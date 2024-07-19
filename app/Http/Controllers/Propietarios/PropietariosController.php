<?php

namespace App\Http\Controllers\Propietarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropietariosController extends Controller
{
    public function index()
    {
        return view('propietarios.index');
    }
}

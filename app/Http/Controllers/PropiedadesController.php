<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    public function index()
    {
        return view('propiedades.index');
    }
}

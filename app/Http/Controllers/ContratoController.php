<?php

namespace App\Http\Controllers;

use App\Repositories\ContratosEloquentRepository;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public ContratosEloquentRepository $repo;

    public function __construct(ContratosEloquentRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $builder = $this->repo->withRelations(['propiedad', 'propietario', 'inquilino']);

        $contratos = $builder->paginate(2);

        return view('contratos.index', [
            'contratos' => $contratos,
        ]);
    }
}

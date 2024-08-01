<?php

namespace App\Http\Controllers;

use App\Http\Requests\Propiedades\CreateRequest;
use App\Models\EstadoDePropiedad;
use App\Models\Propiedad;
use App\Models\Propietario;
use App\Models\TipoDePropiedad;
use App\Repositories\ActoresEloquentRepository;
use Illuminate\Http\Request;
use Mockery\Exception;

class PropiedadesController extends Controller
{
    public ActoresEloquentRepository $repo;

    public function __construct()
    {
        $this->repo = new ActoresEloquentRepository(Propiedad::class);
    }

    public function index()
    {
        $builder = $this->repo->withRelations(['propietario', 'estadoDePropiedad', 'tipoDePropiedad']);

        $propiedades = $builder->paginate(2);

        return view('propiedades.index', [
            'propiedades' => $propiedades,
        ]);
    }

    public function formCreate()
    {
        return view('propiedades.create-form', [
            'propietarios' => Propietario::all(['propietario_id', 'nombre', 'apellido', 'dni']),
            'estadosDePropiedades' => EstadoDePropiedad::all(['estado_id', 'estado']),
            'tiposDePropiedades' => TipoDePropiedad::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $propiedad = $this->repo->create($data);
        } catch (Exception $e) {
            return redirect()
                ->route('propiedades.index')
                ->with('status.message', 'Error al crear la propiedad' . $e->getMessage());
        }

        return redirect()
            ->route('propiedades.index')
            ->with('status.message', 'La propiedad fue creada con éxito.');
    }
}

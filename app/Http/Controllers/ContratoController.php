<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contratos\CreateRequest;
use App\Models\Inquilino;
use App\Models\Propiedad;
use App\Models\Propietario;
use App\Repositories\ContratosEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

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

    public function formCreate()
    {
        return view('contratos.create-form', [
            'propiedades' => Propiedad::all(),
            'propietarios' => Propietario::all(['propietario_id', 'nombre', 'apellido', 'dni']),
            'inquilinos' => Inquilino::all(['inquilino_id', 'nombre', 'apellido', 'dni']),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $this->repo->create($data);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return redirect()
                ->route('contratos.index')
                ->with('status.message', 'Error al eliminar el contrato' . $e->getMessage());
        }

        return redirect()
            ->route('contratos.index')
            ->with('status.message', 'El contrato fue creado con éxito.');
    }
}

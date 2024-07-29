<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contratos\CreateRequest;
use App\Http\Requests\Contratos\UpdateRequest;
use App\Models\Garante;
use App\Models\Inquilino;
use App\Models\Propiedad;
use App\Models\Propietario;
use App\Models\TipoDeMoneda;
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
            'garantes' => Garante::all(['garante_id', 'nombre', 'apellido', 'dni']),
            'tipoDeMonedas' => TipoDeMoneda::all(),
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

    public function formUpdate(int $id)
    {
        $contrato = $this->repo->findOrFailWithRelations($id, ['inquilino', 'propietario']);

        return view('contratos.update-form', [
            'propiedades' => Propiedad::all(),
            'propietarios' => Propietario::all(['propietario_id', 'nombre', 'apellido', 'dni']),
            'inquilinos' => Inquilino::all(['inquilino_id', 'nombre', 'apellido', 'dni']),
            'contrato' => $contrato,
            'tipoDeMonedas' => TipoDeMoneda::all(),
        ]);
    }

    public function processUpdate(UpdateRequest $request, int $id)
    {
        $data = $request->except(['_token']);

        DB::beginTransaction();

        try {
            $contrato = $this->repo->findOrFail($id);

            $this->repo->update($id, $data);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('contratos.formUpdate', ['id' => $contrato->contrato_id])
                ->withInput()
                ->with('status.message', 'Ocurrió un error al actualizar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('status.type', 'error');
        }

        return redirect()
            ->route('contratos.index')
            ->with('status.message', 'El Contrato fue editado con éxito.');
    }
}

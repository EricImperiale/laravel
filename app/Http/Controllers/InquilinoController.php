<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inquilinos\CreateRequest;
use App\Http\Requests\Inquilinos\UpdateRequest;
use App\Models\Inquilino;
use App\Models\PrefijoTelefonico;
use App\Repositories\ActoresEloquentRepository;
use App\Searches\ActoresSearchParams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class InquilinoController extends Controller
{
    public ActoresEloquentRepository $repo;

    public function __construct()
    {
        $this->repo = new ActoresEloquentRepository(Inquilino::class);
    }

    public function index(Request $request)
    {
        $searchParams = new ActoresSearchParams(
            nombreCompleto: $request->query('nc'),
        );

        $builder = $this->repo->withRelations(['prefijoTelefonico']);

        // TODO: Ver que busque por nombre completo.
        if ($searchParams->getNombreCompleto()) {
            $builder->where(function ($query) use ($searchParams) {
                $query
                    ->orWhere('nombre', 'LIKE', '%' . $searchParams->getNombreCompleto() . '%')
                    ->orWhere('apellido', 'LIKE', '%' . $searchParams->getNombreCompleto() . '%');
            });
        }

        $inquilinos = $builder->paginate(2);

        return view('inquilinos.index', [
            'inquilinos' => $inquilinos,
            'filtrosPropietario' => $searchParams,
        ]);
    }

    public function formCreate()
    {
        return view('inquilinos.create-form', [
            'prefijosTelefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $inquilino = $this->repo->create($data);

        } catch (Exception $e) {
            return redirect()
                ->route('inquilinos.index')
                ->withInput()
                ->with('status.message', 'Ocurrió un error al crear el inquilino. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('status.type', 'error');
        }

        return redirect()
            ->route('inquilinos.index')
            ->with('status.message', 'El inquilino <b>' . e($inquilino->nombreCompleto) . '</b> fue creado con éxito.')
            ->with('status.type', 'success');
    }

    public function formUpdate(int $id)
    {
        return view('inquilinos.update-form', [
            'inquilino' => $this->repo->findOrFail($id),
            'prefijosTelefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processUpdate(UpdateRequest $request, int $id)
    {
        $data = $request->except(['_token']);

        DB::beginTransaction();

        try {
            $inquilino = $this->repo->findOrFail($id);

            $this->repo->update($id, $data);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('inquilinos.formUpdate', ['id' => $inquilino->inquilino_id])
                ->withInput()
                ->with('status.message', 'Ocurrió un error al actualizar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('status.type', 'error');
        }

        return redirect()
            ->route('inquilinos.index')
            ->with('status.message', 'El Inquilino <b>' . e($inquilino->nombreCompleto) . '</b> fue editado con éxito.');
    }

    public function formDelete(int $id)
    {
        return view('inquilinos.delete-form', [
            'inquilino' => $this->repo->findOrFail($id),
            'prefijosTelefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processDelete(int $id)
    {
        try {
            $inquilino = $this->repo->findOrFail($id);

            // TODO: Ver de pasar esto al repo.
            if ($inquilino->contratos()->exists()) {
                return redirect()
                    ->route('inquilinos.index')
                    ->with('status.message', 'El inquilino <b>' . e($inquilino->nombreCompleto) . '</b> no puede ser eliminado porque tiene uno o más contratos activos.')
                    ->with('status.type', 'error');
            }

            $this->repo->delete($id);
        } catch (Exception $e) {
            return redirect()
                ->route('inquilinos.index')
                ->with('status.message', 'Error al eliminar el inquilino <b>' . e($inquilino->nombreCompleto) . '</b>. ' . $e->getMessage());
        }

        return redirect()
            ->route('inquilinos.index')
            ->with('status.message', 'El propietario <b>' . e($inquilino->nombreCompleto) . '</b> fue eliminado con éxito.');
    }

    public function viewContract(int $id)
    {
        $contratos = $this->repo->findOrFailWithRelations($id, ['contratos.propietario', 'contratos.inquilino']);

        return view('inquilinos.view-contract', [
            'inquilino' => $this->repo->findOrFail($id),
            'contratos' => $contratos->contratos,
        ]);
    }
}

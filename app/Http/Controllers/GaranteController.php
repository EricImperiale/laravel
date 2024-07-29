<?php

namespace App\Http\Controllers;

use App\Http\Requests\Garantes\CreateRequest;
use App\Http\Requests\Garantes\UpdateRequest;
use App\Models\Garante;
use App\Models\Inquilino;
use App\Models\PrefijoTelefonico;
use App\Repositories\ActoresEloquentRepository;
use App\Searches\ActoresSearchParams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class GaranteController extends Controller
{
    public ActoresEloquentRepository $repo;

    public function __construct()
    {
        $this->repo = new ActoresEloquentRepository(Garante::class);
    }

    public function index(Request $request)
    {
        $searchParams = new ActoresSearchParams(
            nombreCompleto: $request->query('nc'),
        );

        $builder = $this->repo->withRelations(['prefijoTelefonico']);

        if ($searchParams->getNombreCompleto()) {
            $builder->where(function ($query) use ($searchParams) {
                $query
                    ->orWhere('nombre', 'LIKE', '%' . $searchParams->getNombreCompleto() . '%')
                    ->orWhere('apellido', 'LIKE', '%' . $searchParams->getNombreCompleto() . '%');
            });
        }

        $garantes = $builder->paginate(3);

        return view('garantes.index', [
            'garantes' => $garantes,
            'filtros' => $searchParams,
        ]);
    }

    public function formCreate()
    {
        return view('garantes.create-form', [
            'prefijosTelefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $garante = $this->repo->create($data);

        } catch (Exception $e) {
            return redirect()
                ->route('garantes.index')
                ->withInput()
                ->with('status.message', 'Ocurrió un error al crear el garante. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('status.type', 'error');
        }

        return redirect()
            ->route('garantes.index')
            ->with('status.message', 'El garante <b>' . e($garante->nombreCompleto) . '</b> fue creado con éxito.')
            ->with('status.type', 'success');
    }

    public function formUpdate(int $id)
    {
        return view('garantes.update-form', [
            'garante' => $this->repo->findOrFail($id),
            'prefijosTelefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processUpdate(UpdateRequest $request, int $id)
    {
        $data = $request->except(['_token']);

        DB::beginTransaction();

        try {
            $garante = $this->repo->findOrFail($id);

            $this->repo->update($id, $data);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('garantes.formUpdate', ['id' => $garante->inquilino_id])
                ->withInput()
                ->with('status.message', 'Ocurrió un error al actualizar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('status.type', 'error');
        }

        return redirect()
            ->route('garantes.index')
            ->with('status.message', 'El Garante <b>' . e($garante->nombreCompleto) . '</b> fue editado con éxito.');
    }

    public function formDelete(int $id)
    {
        return view('garantes.delete-form', [
            'garante' => $this->repo->findOrFail($id),
            'prefijosTelefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processDelete(int $id)
    {
        try {
            $garante = $this->repo->findOrFail($id);

            // TODO: Ver de pasar esto al repo.
            if ($garante->contratos()->exists()) {
                return redirect()
                    ->route('garantes.index')
                    ->with('status.message', 'El Garante <b>' . e($garante->nombreCompleto) . '</b> no puede ser eliminado porque tiene uno o más contratos activos.')
                    ->with('status.type', 'error');
            }

            $this->repo->delete($id);
        } catch (Exception $e) {
            return redirect()
                ->route('garantes.index')
                ->with('status.message', 'Error al eliminar el garante <b>' . e($garante->nombreCompleto) . '</b>. ' . $e->getMessage());
        }

        return redirect()
            ->route('garantes.index')
            ->with('status.message', 'El propietario <b>' . e($garante->nombreCompleto) . '</b> fue eliminado con éxito.');
    }
}

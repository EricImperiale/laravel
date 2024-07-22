<?php

namespace App\Http\Controllers;

use App\Http\Requests\Propietarios\CreateRequest;
use App\Http\Requests\Propietarios\UpdateRequest;
use App\Models\PrefijoTelefonico;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PropietariosController extends Controller
{
    public function index()
    {
        $propietarios = Propietario::with(['prefijoTelefonico'])->paginate(2);

        return view('propietarios.index', [
            'propietarios' => $propietarios,
        ]);
    }

    public function formCreate()
    {
        return view('propietarios.create-form', [
            'prefijo_telefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $propietario = Propietario::create($data);
        } catch (Exception $e) {
            return redirect()
                ->route('propietarios.index')
                ->withInput()
                ->with('status.message', 'Ocurrió un error al crear el propietario. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('status.type', 'error');
        }

        return redirect()
            ->route('propietarios.index')
            ->with('status.message', 'El propietario <b>' . e($propietario->nombreCompleto) . '</b> fue creado con éxito.')
            ->with('status.type', 'success');
    }

    public function formUpdate(int $id)
    {
        return view('propietarios.update-form', [
            'propietario' => Propietario::findOrFail($id),
            'prefijo_telefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processUpdate(int $id, UpdateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $propietario = Propietario::findOrFail($id);

            $propietario->update($data);
        } catch (Exception $e) {
            return redirect()
                ->route('propietarios.formUpdate', ['id' => $propietario->propietario_id])
                ->withInput()
                ->with('status.message', 'Ocurrió un error al actualizar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('status.type', 'error');
        }

        return redirect()
            ->route('propietarios.index')
            ->with('status.message', 'El propietario <b>' . e($propietario->nombreCompleto) . '</b> fue editado con éxito.');
    }

    public function formDelete(int $id)
    {
        return view('propietarios.delete-form', [
            'id' => $id,
            'propietario' => Propietario::findOrFail($id),
            'prefijo_telefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processDelete(int $id)
    {
        DB::beginTransaction();

        try {
            $propietario = Propietario::findOrFail($id);

            if ($propietario->propiedades()->exists()) {
                DB::rollBack();
                
                return redirect()
                    ->route('propietarios.index')
                    ->with('status.message', 'El propietario <b>' . e($propietario->nombreCompleto) . '</b> no puede ser eliminado porque tiene una o más propiedades asociadas.')
                    ->with('status.type', 'error');
            }

            $propietario->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('propietarios.index')
                ->with('status.message', 'Error al eliminar al propietario <b>' . e($propietario->nombreCompleto) . '</b>. ' . $e->getMessage());
        }

        return redirect()
            ->route('propietarios.index')
            ->with('status.message', 'El propietario <b>' . e($propietario->nombreCompleto) . '</b> fue eliminado con éxito.');
    }
}

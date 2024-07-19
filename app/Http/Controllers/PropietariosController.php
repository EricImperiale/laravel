<?php

namespace App\Http\Controllers;

use App\Http\Requests\Propietarios\CreateRequest;
use App\Http\Requests\Propietarios\UpdateRequest;
use App\Models\PrefijoTelefonico;
use App\Models\Propetario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PropietariosController extends Controller
{
    public function index()
    {
        $propietarios = Propetario::with(['prefijoTelefonico'])->paginate(2);

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
            $propietario = Propetario::create($data);
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
            'propietario' => Propetario::findOrFail($id),
            'prefijo_telefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processUpdate(int $id, UpdateRequest $request)
    {
        $propietario = Propetario::findOrFail($id);

        $data = $request->except(['_token']);

        try {
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
            'propietario' => Propetario::findOrFail($id),
            'prefijo_telefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processDelete(int $id)
    {
        $propietario = Propetario::findOrFail($id);

        $propietario->delete();

        return redirect()
            ->route('propietarios.index')
            ->with('status.message', 'El propietario <b>' . e($propietario->nombreCompleto) . '</b> fue eliminado con éxito.');
    }
}

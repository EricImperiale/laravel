<?php

namespace App\Http\Controllers;

use App\Http\Requests\Propietarios\UpdateRequest;
use App\Models\PrefijoTelefonico;
use App\Models\Propetario;
use Illuminate\Http\Request;
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

    public function formUpdate(int $pi)
    {
        return view('propietarios.update-form', [
            'propietario' => Propetario::findOrFail($pi),
            'prefijo_telefonicos' => PrefijoTelefonico::all(),
        ]);
    }

    public function processUpdate(int $pi, UpdateRequest $request)
    {
        $propietario = Propetario::findOrFail($pi);

        $data = $request->except(['_token']);

        try {
            $propietario->update($data);
        } catch (Exception $e) {
            return redirect()
                ->route('propietarios.formUpdate', ['pi' => $propietario->propietario_id])
                ->withInput()
                ->with('status.message', 'Ocurrió un error al actualizar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('status.type', 'error');
        }

        return redirect()
            ->route('propietarios.index')
            ->with('status.message', 'El propietario <b>' . e($propietario->nombreCompleto) . '</b> fue editado con éxito.');
    }
}

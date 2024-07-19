<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.formLogin');
    }

    public function processLogin(LoginRequest $request)
    {
        $credenciales = $request->only(['email', 'password']);

        if(!auth()->attempt($credenciales)) {
            return redirect()
                ->route('auth.formLogin')
                ->with('status.message', 'Las credenciales ingresadas no coinciden con nuestros registros.')
                ->with('status.type', 'error')
                ->withInput();
        }

        $request->session()->regenerate();

        return redirect()
            ->route('propietarios.index')
            ->with('status.message', 'Iniciaste sesión con éxito. ¡Hola de nuevo!');
    }

    public function processLogout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.formLogin')
            ->with('status.message', 'Cerrarse tu sesión con éxito. ¡Volvé pronto!');
    }
}

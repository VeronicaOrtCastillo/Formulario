<?php

namespace App\Http\Controllers\Auth;

/*
    Se importan las clases necesarias para manejar las solicitudes de autenticacion
*/
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /*
        Muestra la vista de inicio de sesion
        Devuelve la vista 'auth.login
    */
    public function create(): View
    {
        return view('auth.login');
    }

    /*
        Se procesa la solicitud de untenticacion
    */
    public function store(LoginRequest $request): RedirectResponse
    {
        /* Se verifica las reglas definidas*/
        $request->authenticate();

        /* Se convierte el correo electroico a minusculas antes de autenticar*/
        $request->merge([
            'email' => Str::lower($request->email),
        ]);

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        /*regenera la sesion para proteger de ataques*/
        $request->session()->regenerate();

        /*Verifica el tipo de usuario y redirige segun su rol*/
        if($request->user()->usertype === 'admin')
        {
            return redirect('admin/dashboard');
        }

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

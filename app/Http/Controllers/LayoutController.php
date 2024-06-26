<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Password;
use Illuminate\Http\RedirectResponse;

class LayoutController extends Controller
{
    /*
    Funcion para mostrar la vista de inicio del criador
    Recibe: nada
    Devuelve: la vista 'layout.inicioCriador'
    */
    public function inicioCriador() {
        return view('layout.inicioCriador');
    }

    /*
    Funcion para mostrar la vista de olvido de contraseña
    Recibe: nada
    Devuelve: la vista 'layout.olvidoPwd'
    */
    public function olvido() {
        return view('layout.olvidoPwd');
    }

    /*
    Funcion para cerrar sesión del usuario
    Recibe: nada
    Devuelve: la vista 'criador.sesionC'
    */
    public function logout(Request $request) {
        // Cierra la sesión del usuario autenticado
        Auth::logout();

        // Invalida la sesión actual
        $request->session()->invalidate();

        // Regenera el token de sesión 
        $request->session()->regenerateToken();

        // Redirige al usuario a la vista de inicio del criador después de cerrar sesión
        return redirect(route('criador.sesionC'));
    }
}

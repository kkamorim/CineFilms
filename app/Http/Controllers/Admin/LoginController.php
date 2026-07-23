<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar formulário de login
    public function showLoginForm()
    {
        return view('admin.login'); 
    }

    // Processar login
    public function login(Request $request)
    {
        // Validação
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Apenas GM, Admin ou Coordenador
            if ($user->is_gm || in_array($user->role, ['admin', 'coordenador'])) {
                return redirect()->intended('/admin/dashboard');
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Acesso restrito a administradores e coordenadores']);
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}

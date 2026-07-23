<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Mostrar o formulário de cadastro
    public function showRegistrationForm()
    {
        return view('register'); // resources/views/register.blade.php
    }

    // Processar cadastro
    public function register(Request $request)
    {
        // Validação simples
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // confirmar senha
        ]);

        // Criar usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_gm' => false, // usuário comum
        ]);

        // Logar automaticamente (opcional)
        Auth::login($user);

        // Redirecionar para dashboard/home
        return redirect('/home')->with('mensagem', 'Cadastro realizado com sucesso!');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    public function showRegisterForm()
    {
        return view('cadastro'); // resources/views/register.blade.php
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'data_nascimento' => 'nullable|date',
            'cpf' => 'nullable|string|max:20',
            'telefone' => 'nullable|string|max:20',
            'cep' => 'nullable|string|max:10',
            'endereco' => 'nullable|string|max:255',
            'bairro' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:2',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_gm = false;
        $user->role = 'user';
        $user->data_nascimento = $request->data_nascimento;
        $user->cpf = $request->cpf;
        $user->telefone = $request->telefone;
        $user->cep = $request->cep;
        $user->endereco = $request->endereco;
        $user->bairro = $request->bairro;
        $user->cidade = $request->cidade;
        $user->estado = $request->estado;

        if ($request->hasFile('profile_image')) {
            $user->profile_image = $request->file('profile_image')->store('users', 'public');
        }
        $user->save();

        Auth::login($user);

        return redirect('/')->with('success', 'Conta criada com sucesso! Bem-vindo ao CineFilms.');
    }
}

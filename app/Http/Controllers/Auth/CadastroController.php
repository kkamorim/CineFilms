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
            'password' => 'required|min:6|confirmed', // campo password_confirmation
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_gm = false; // usuário comum
        if ($request->hasFile('profile_image')) {
            $user->profile_image = $request->file('profile_image')->store('users', 'public');
        }
        $user->save();

        Auth::login($user);

        return redirect('/login')->with('mensagem', 'Usuário criado com sucesso!');
    }
}

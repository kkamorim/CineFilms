<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Ticket;
use App\Models\MovieHistory;

class UserController extends Controller
{
    // Mostrar perfil do usuário
    public function perfil()
    {
        $user = auth()->user();
        return view('perfil', compact('user'));
    }

    // Atualizar perfil
    public function atualizarPerfil(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Foto de perfil
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            $path = $request->file('profile_image')->store('users', 'public');
            $user->profile_image = $path;
        }

        // Senha
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Perfil atualizado com sucesso!');
    }

    // Mostrar ingressos do usuário
    public function meusIngressos()
    {
        $tickets = auth()->user()->tickets;
        return view('meus-ingressos', compact('tickets'));
    }

    // Mostrar histórico de filmes assistidos
    public function historico()
    {
        $history = auth()->user()->histories;
        return view('historico', compact('history'));
    }
}

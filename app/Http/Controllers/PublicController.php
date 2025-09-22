<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function home()
    {
        $filmesEmCartaz = Filme::latest()->take(4)->get();
        $filmeDestaque = Filme::inRandomOrder()->first();

        return view('home', compact('filmesEmCartaz', 'filmeDestaque'));
    }

    public function filmes()
    {
        $filmes = Filme::all();
        return view('filmes', compact('filmes'));
    }

    public function emCartaz()
    {
        $filmes = Filme::all(); 
        return view('admin.emcartaz', compact('filmes'));
    }
    
    public function dashboard()
    {
        $filmesRecentes = Filme::latest()->take(3)->get();
        $filmeDestaque = Filme::inRandomOrder()->first();

        $usuariosPorMes = User::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy(DB::raw('MONTH(created_at)'))
        ->pluck('total', 'mes');

        $filmesPorGenero = Filme::select(
            'genero',
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('genero')
        ->pluck('total', 'genero');

        $filmesPorClassificacao = Filme::select(
            'classificacao',
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('classificacao')
        ->pluck('total', 'classificacao');

        $totalUsuarios = User::count();

        return view('admin.dashboard', compact(
            'filmesRecentes',
            'filmeDestaque',
            'usuariosPorMes',
            'filmesPorGenero',
            'filmesPorClassificacao',
            'totalUsuarios'
        ));
    }
}

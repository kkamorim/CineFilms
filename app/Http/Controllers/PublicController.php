<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

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
       // A variável foi renomeada para `$filmes` para ser consistente
       $filmes = Filme::all(); 
       return view('admin.emcartaz', compact('filmes'));
   }
    
    public function dashboard()
    {
        $filmesRecentes = Filme::latest()->take(3)->get();
        $filmeDestaque = Filme::inRandomOrder()->first();

        return view('admin.dashboard', compact('filmesRecentes', 'filmeDestaque'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function index()
    {
        $filmes = Filme::all();
        return view('admin.emcartaz', compact('filmes'));
    }

    public function create()
    {
        return view('admin.cadastrarfilmes');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string',
            'genero' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descricao' => 'nullable|string',
            'classificacao' => 'required|integer',
            'sala' => 'nullable|string',
            'horario' => 'nullable|string',
            'duracao' => 'nullable|integer',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date',
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('filmes', 'public');
        }

        Filme::create($data);

        return redirect()->route('admin.filmes.index')->with('success', 'Filme criado com sucesso!');
    }

    public function show(Filme $filme)
    {
        return view('admin.filmes.show', compact('filme'));
    }

    public function edit(Filme $filme)
    {
        return view('admin.editarfilmes', compact('filme'));
    }

    public function update(Request $request, Filme $filme)
    {
        $data = $request->validate([
            'titulo' => 'required|string',
            'genero' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descricao' => 'nullable|string',
            'classificacao' => 'required|integer',
            'sala' => 'nullable|string',
            'horario' => 'nullable|string',
            'duracao' => 'nullable|integer',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date',
        ]);

        if ($request->hasFile('imagem')) {
            Storage::disk('public')->delete($filme->imagem);
            $data['imagem'] = $request->file('imagem')->store('filmes', 'public');
        }

        $filme->update($data);

        return redirect()->route('admin.filmes.index')->with('success', 'Filme atualizado com sucesso!');
    }

    public function destroy(Filme $filme)
    {
        if ($filme->imagem) {
            Storage::disk('public')->delete($filme->imagem);
        }

        $filme->delete();

        return redirect()->route('admin.filmes.index')->with('success', 'Filme removido com sucesso!');
    }
}
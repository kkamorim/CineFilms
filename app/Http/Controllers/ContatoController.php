<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    public function create()
    {
        return view('contato');
    }

    // Web: salvar contato via formulário
    public function store(Request $dadosContato)
    {
        $dadosContato->validate([
            'nome' => 'required',
            'email'=> 'required|email',
            'mensagem' => 'required'
        ]);

        Contato::create($dadosContato->all());   

        return redirect('/contato')->with('success', 'Mensagem enviada com sucesso!');
    }

    // API: listar contatos
    public function indexApi()
    {
        return response()->json(Contato::all());
    }

    // API: salvar novo contato
    public function storeApi(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'mensagem' => 'required|string'
        ]);

        $contato = Contato::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'mensagem' => $request->mensagem,
        ]);

        return response()->json([
            'message' => 'Contato criado com sucesso!',
            'data' => $contato
        ], 201);
    }
}

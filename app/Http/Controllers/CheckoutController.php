<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\MovieHistory;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['email' => 'Por favor, faça login para prosseguir para o pagamento.']);
        }

        return view('checkout');
    }

    public function processar(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['success' => false, 'message' => 'Usuário não autenticado.'], 401);
        }

        $request->validate([
            'payment_method' => 'required|string|in:pix,credit_card,boleto',
            'items' => 'required|array',
        ]);

        $user = auth()->user();
        $items = $request->items;

        foreach ($items as $item) {
            $movieName = $item['name'] ?? 'Ingresso CineFilms';
            $sessionTime = now()->addDays(rand(1, 3))->setTime(rand(14, 22), 0);

            Ticket::create([
                'user_id' => $user->id,
                'movie_name' => $movieName,
                'session_time' => $sessionTime,
            ]);

            try {
                MovieHistory::create([
                    'user_id' => $user->id,
                    'movie_name' => $movieName,
                    'watched_at' => now(),
                ]);
            } catch (\Exception $e) {
                // Se a tabela ou model não aceitar, ignora
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Pagamento aprovado com sucesso! Seus ingressos foram salvos.',
            'redirect' => route('meus.ingressos')
        ]);
    }
}

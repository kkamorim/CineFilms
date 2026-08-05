@extends('template')

@section('title', 'Meus Ingressos - CineFilms')

@section('content')
<div style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-medium) 100%); color: var(--white); padding: 48px 0 36px;">
    <div class="container">
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 8px;">Meus Ingressos</h1>
        <p style="color: var(--gray-300);">Consulte seus ingressos comprados e QR codes de validação.</p>
    </div>
</div>

<div class="container" style="padding: 60px 0 80px; min-height: 500px;">
    @if(!$tickets || (method_exists($tickets, 'isEmpty') && $tickets->isEmpty()) || (is_array($tickets) && count($tickets) === 0))
        <div style="text-align: center; padding: 60px 20px; background: var(--white); border-radius: var(--radius-lg); border: 1px solid var(--gray-200);">
            <i class="fas fa-ticket-alt" style="font-size: 3.5rem; color: var(--gray-300); margin-bottom: 16px;"></i>
            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 8px;">Nenhum ingresso encontrado</h3>
            <p style="color: var(--gray-500); margin-bottom: 24px;">Você ainda não possui ingressos comprados para sessões futuras.</p>
            <a href="{{ route('filme-em-cartaz') }}" class="btn btn-primary">
                <i class="fas fa-film"></i> Ver Filmes em Cartaz
            </a>
        </div>
    @else
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px;">
            @foreach($tickets as $ticket)
                <div style="background: var(--white); border-radius: var(--radius-lg); border: 1px solid var(--gray-200); padding: 24px; box-shadow: var(--shadow-sm);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--gray-900);">{{ $ticket->movie_name }}</h3>
                        <span style="background: var(--primary-subtle); color: var(--primary-light); padding: 4px 10px; border-radius: var(--radius-sm); font-size: 0.75rem; font-weight: 700;">Confirmado</span>
                    </div>
                    <p style="font-size: 0.85rem; color: var(--gray-600); margin-bottom: 4px;"><i class="far fa-clock"></i> {{ $ticket->session_time }}</p>
                    <p style="font-size: 0.85rem; color: var(--gray-500);"><i class="fas fa-couch"></i> Assento Escolhido na Entrada</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

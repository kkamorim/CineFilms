@extends('template')

@section('title', 'Histórico de Filmes - CineFilms')

@section('content')
<div style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-medium) 100%); color: var(--white); padding: 48px 0 36px;">
    <div class="container">
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 8px;">Histórico de Filmes</h1>
        <p style="color: var(--gray-300);">Registro de todos os filmes assistidos no CineFilms.</p>
    </div>
</div>

<div class="container" style="padding: 60px 0 80px; min-height: 500px;">
    @if(!$history || (method_exists($history, 'isEmpty') && $history->isEmpty()) || (is_array($history) && count($history) === 0))
        <div style="text-align: center; padding: 60px 20px; background: var(--white); border-radius: var(--radius-lg); border: 1px solid var(--gray-200);">
            <i class="fas fa-history" style="font-size: 3.5rem; color: var(--gray-300); margin-bottom: 16px;"></i>
            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 8px;">Nenhum histórico registrado</h3>
            <p style="color: var(--gray-500); margin-bottom: 24px;">Seus filmes assistidos anteriormente aparecerão nesta lista.</p>
            <a href="{{ route('filme-em-cartaz') }}" class="btn btn-primary">
                <i class="fas fa-film"></i> Ver Programação
            </a>
        </div>
    @else
        <div style="background: var(--white); border-radius: var(--radius-lg); border: 1px solid var(--gray-200); overflow: hidden;">
            @foreach($history as $h)
                <div style="padding: 20px 24px; border-bottom: 1px solid var(--gray-100); display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h4 style="font-size: 1rem; font-weight: 700; color: var(--gray-900);">{{ $h->movie_name }}</h4>
                        <span style="font-size: 0.8rem; color: var(--gray-500);">Data: {{ $h->watched_at }}</span>
                    </div>
                    <span style="color: var(--success); font-size: 0.85rem; font-weight: 600;"><i class="fas fa-check-circle"></i> Assistido</span>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

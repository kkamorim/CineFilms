@extends('templateDashboard')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <main class="main-content">
        <div class="top-section">
            @if ($filmeDestaque)
            <div class="featured-movie" style="--bg: url('{{ asset('storage/' . $filmeDestaque->imagem) }}');">
                <img class="poster" src="{{ asset('storage/' . $filmeDestaque->imagem) }}" alt="{{ $filmeDestaque->titulo }}">
                <div class="featured-info">
                    <h1>{{ $filmeDestaque->titulo }}</h1>
                    <p>{{ $filmeDestaque->genero }}</p>
                    <p>{{ $filmeDestaque->descricao }}</p>
                    <button>▶ Assistir trailer</button>
                </div>
            </div>
            @endif

            <div class="recent-movies">
                <h2>Recentes</h2>
                <ul>
                    @forelse($filmesRecentes as $filme)
                    <li>
                        <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}">
                        <div>
                            <h3>{{ $filme->titulo }}</h3>
                            <p>{{ $filme->genero }}</p>
                            <p>Classificação: PG-{{ $filme->classificacao }}</p>
                        </div>
                    </li>
                    @empty
                    <p>Nenhum filme recente.</p>
                    @endforelse
                </ul>
            </div>
        </div>

        <h2 class="h2-filmes-section">Populares</h2>
        <section class="filmes-section">
            <div class="filmes-grid">
                <div class="card-filme">
                    <img src="{{ asset('img/Invocacao.jpg') }}">
                </div>
                    <h3>Invocação do Mal 4: O Último Ritual</h3>
                    <p><b>12 • 2h 29m</b></p>
                    <p><b>Gênero</b>: Terror</p>
            </div>
            
            <div class="filmes-grid">
                <div class="card-filme">
                    <img src="{{ asset('img/quarteto.webp') }}">
                </div>
                <h3>Quarteto Fantástico</h3>
                <p><b>12 • 1 hr 55 min</b></p>
                <p><b>Gênero</b>: Ação / Ficção Científica</p>
            </div>

            <div class="filmes-grid">
                <div class="card-filme">
                    <img src="{{ asset('img/Rei_Feira.jpg') }}" >
                </div>
                <h3>O Rei da Feira</h3>
                    <p><b>14 • 1 hr 27 min</b></p>
                    <p><b>Gênero</b>: Comédia</p>
            </div>

            <div class="filmes-grid">
                <div class="card-filme">
                    <img src="{{ asset('img/superman.webp') }}">
                </div>
                <h3>Superman</h3>
                <p><b>14 • 2 hr 09 min</b></p>
                <p><b>Gênero</b>: Ação / Ficção Científica</p>
            </div>
        </section>
    </main>
</div>
@endsection
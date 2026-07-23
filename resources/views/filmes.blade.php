@extends('template')

@section('title', 'Filmes - Cinefilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/filmes.css') }}">
@endsection

@section('content')

<section class="cinema-hero">
    <div class="hero-background">
        <img src="{{ asset('img/sala.jpg') }}" class="hero-bg-image" alt="Sala de cinema">
        <div class="hero-gradient"></div>
    </div>
    <div class="hero-content-wrapper">
        <div class="hero-badge">
            <i class="fas fa-film"></i>
            <span>Nosso Catálogo</span>
        </div>
        <h1 class="hero-main-title">Todos os Filmes</h1>
        <p class="hero-tagline">Confira todos os filmes disponíveis no CineFilms</p>
    </div>
</section>

<section class="movies-showcase">
    <div class="container">
        <div class="movies-grid-container list-view" id="moviesContainer">
            @forelse($filmes as $filme)
            <article class="movie-item">
                <div class="movie-poster-wrapper">
                    <div class="poster-container">
                        <img src="{{ $filme->imagem ? asset('storage/' . $filme->imagem) : 'https://via.placeholder.com/300x450?text=Sem+Imagem' }}" 
                             alt="{{ $filme->titulo }}" 
                             class="movie-poster">
                        <div class="poster-overlay">
                            <span class="movie-rating">
                                <i class="fas fa-star"></i>
                                {{ $filme->classificacao ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="movie-details">
                    <h3 class="movie-title">{{ $filme->titulo }}</h3>
                    <div class="movie-meta">
                        <span class="meta-item">
                            <i class="fas fa-theater-masks"></i>
                            {{ $filme->genero }}
                        </span>
                        @if($filme->duracao)
                        <span class="meta-item">
                            <i class="fas fa-clock"></i>
                            {{ $filme->duracao }} min
                        </span>
                        @endif
                    </div>
                    <p class="movie-synopsis">{{ Str::limit($filme->descricao, 200) }}</p>
                    <div class="movie-actions">
                        <a href="{{ route('filme-em-cartaz') }}" class="btn-buy-ticket">
                            <i class="fas fa-ticket-alt"></i>
                            Ver Sessões
                        </a>
                    </div>
                </div>
            </article>
            @empty
            <div class="no-movies">
                <i class="fas fa-film"></i>
                <h3>Nenhum filme disponível</h3>
                <p>Volte em breve para conferir nossa programação</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

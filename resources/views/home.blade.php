@extends('template')

@section('title', 'CineFilms - Início')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<!-- HERO BANNER -->
<section class="hero-section">
    <div class="container hero-container">
        <div class="hero-text-side">
            <div class="hero-badge">
                <i class="fas fa-sparkles"></i> Cinema de Alta Qualidade
            </div>
            <h1 class="hero-title">
                Viva o Cinema em <span>Dimensão Real</span>
            </h1>
            <p class="hero-subtitle">
                Salas premium com projeção 4K, tecnologia áudio Dolby Atmos e poltronas reclináveis ultra confortáveis. Reserve seu ingresso online sem filas.
            </p>
            <div class="hero-actions">
                <a href="{{ route('filme-em-cartaz') }}" class="btn btn-primary">
                    <i class="fas fa-ticket-alt"></i> Ver Filmes em Cartaz
                </a>
                <a href="{{ url('/sobre') }}" class="btn btn-outline">
                    <i class="fas fa-popcorn"></i> Bombonière
                </a>
            </div>
        </div>

        <div class="hero-card-preview">
            @if(isset($filmeDestaque) && $filmeDestaque)
                <img src="{{ asset('storage/' . $filmeDestaque->imagem) }}" alt="{{ $filmeDestaque->titulo }}" onerror="this.src='{{ asset('img/Invocacao.jpg') }}'">
                <div class="hero-card-overlay">
                    <h3>{{ $filmeDestaque->titulo }}</h3>
                    <p>{{ $filmeDestaque->genero }} • {{ $filmeDestaque->duracao ?? '120' }} min</p>
                </div>
            @else
                <img src="{{ asset('img/Invocacao.jpg') }}" alt="Filme em Destaque">
                <div class="hero-card-overlay">
                    <h3>Invocação do Mal 4</h3>
                    <p>Terror • 129 min • Sala 01 VIP</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- SEÇÃO EM CARTAZ -->
<section class="featured-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Em Cartaz Hoje</h2>
            <p class="section-subtitle">Confira os lançamentos mais aguardados e garanta o seu lugar na sessão perfeita.</p>
        </div>

        <div class="movies-grid">
            @forelse($filmesEmCartaz as $filme)
                <article class="movie-card">
                    <div class="movie-poster-wrap">
                        <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}" onerror="this.src='{{ asset('img/filme1.png') }}'">
                        <div class="movie-rating-tag">
                            <i class="fas fa-star"></i> {{ $filme->classificacao ?? '12' }}
                        </div>
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">{{ $filme->titulo }}</h3>
                        <p class="movie-genre">{{ $filme->genero }}</p>
                        <div class="movie-footer">
                            <span style="font-size: 0.8rem; color: var(--gray-500);">
                                <i class="far fa-clock"></i> {{ $filme->duracao ?? '120' }} min
                            </span>
                            <a href="{{ route('filme-em-cartaz') }}" class="btn-buy-sm">Comprar</a>
                        </div>
                    </div>
                </article>
            @empty
                <!-- Fallback de Filmes quando banco estiver sem registros -->
                <article class="movie-card">
                    <div class="movie-poster-wrap">
                        <img src="{{ asset('img/Invocacao.jpg') }}" alt="Invocação do Mal 4">
                        <div class="movie-rating-tag"><i class="fas fa-star"></i> 16</div>
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">Invocação do Mal 4</h3>
                        <p class="movie-genre">Terror / Suspense</p>
                        <div class="movie-footer">
                            <span style="font-size: 0.8rem; color: var(--gray-500);"><i class="far fa-clock"></i> 129 min</span>
                            <a href="{{ route('filme-em-cartaz') }}" class="btn-buy-sm">Comprar</a>
                        </div>
                    </div>
                </article>

                <article class="movie-card">
                    <div class="movie-poster-wrap">
                        <img src="{{ asset('img/superman.webp') }}" alt="Superman">
                        <div class="movie-rating-tag"><i class="fas fa-star"></i> 12</div>
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">Superman: Legacy</h3>
                        <p class="movie-genre">Ação / Aventura</p>
                        <div class="movie-footer">
                            <span style="font-size: 0.8rem; color: var(--gray-500);"><i class="far fa-clock"></i> 142 min</span>
                            <a href="{{ route('filme-em-cartaz') }}" class="btn-buy-sm">Comprar</a>
                        </div>
                    </div>
                </article>

                <article class="movie-card">
                    <div class="movie-poster-wrap">
                        <img src="{{ asset('img/quarteto.webp') }}" alt="Quarteto Fantástico">
                        <div class="movie-rating-tag"><i class="fas fa-star"></i> 12</div>
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">Quarteto Fantástico</h3>
                        <p class="movie-genre">Ação / Sci-Fi</p>
                        <div class="movie-footer">
                            <span style="font-size: 0.8rem; color: var(--gray-500);"><i class="far fa-clock"></i> 135 min</span>
                            <a href="{{ route('filme-em-cartaz') }}" class="btn-buy-sm">Comprar</a>
                        </div>
                    </div>
                </article>

                <article class="movie-card">
                    <div class="movie-poster-wrap">
                        <img src="{{ asset('img/Rei_Feira.jpg') }}" alt="O Rei da Feira">
                        <div class="movie-rating-tag"><i class="fas fa-star"></i> 10</div>
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-title">O Rei da Feira</h3>
                        <p class="movie-genre">Comédia</p>
                        <div class="movie-footer">
                            <span style="font-size: 0.8rem; color: var(--gray-500);"><i class="far fa-clock"></i> 98 min</span>
                            <a href="{{ route('filme-em-cartaz') }}" class="btn-buy-sm">Comprar</a>
                        </div>
                    </div>
                </article>
            @endforelse
        </div>
    </div>
</section>

<!-- SEÇÃO PLANOS CINEFILMS (AZUL ESCURO PREMIUM CONTRASTE) -->
<section class="plans-section">
    <div class="container">
        <div class="section-header dark-header">
            <h2 class="section-title text-white">Planos CineFilms</h2>
            <p class="section-subtitle text-light">Assine e tenha vantagens exclusivas, ingressos com desconto e benefícios na bombonière.</p>
        </div>

        <div class="plans-grid">
            <div class="plan-card">
                <h3 class="plan-name">CineMeia</h3>
                <div class="plan-price">R$ 14,90 <span>/mês</span></div>
                <ul class="plan-features">
                    <li><i class="fas fa-check-circle"></i> Meia-entrada em qualquer dia</li>
                    <li><i class="fas fa-check-circle"></i> 10% de desconto na Bombonière</li>
                    <li><i class="fas fa-check-circle"></i> Reserva antecipada de assentos</li>
                </ul>
                <a href="{{ route('filme-em-cartaz') }}" class="btn-plan">Escolher Plano</a>
            </div>

            <div class="plan-card featured">
                <div class="plan-badge">Mais Popular</div>
                <h3 class="plan-name">CinePass VIP</h3>
                <div class="plan-price">R$ 29,90 <span>/mês</span></div>
                <ul class="plan-features">
                    <li><i class="fas fa-check-circle"></i> 2 ingressos grátis por mês</li>
                    <li><i class="fas fa-check-circle"></i> Meia-entrada em ingressos adicionais</li>
                    <li><i class="fas fa-check-circle"></i> 20% de desconto na Bombonière</li>
                    <li><i class="fas fa-check-circle"></i> Upgrade gratuito para salas 3D</li>
                </ul>
                <a href="{{ route('filme-em-cartaz') }}" class="btn-plan">Assinar VIP</a>
            </div>

            <div class="plan-card">
                <h3 class="plan-name">CineFamília</h3>
                <div class="plan-price">R$ 49,90 <span>/mês</span></div>
                <ul class="plan-features">
                    <li><i class="fas fa-check-circle"></i> 4 ingressos grátis por mês</li>
                    <li><i class="fas fa-check-circle"></i> Desconto especial em Combos Família</li>
                    <li><i class="fas fa-check-circle"></i> Isenção de taxa de serviço online</li>
                </ul>
                <a href="{{ route('filme-em-cartaz') }}" class="btn-plan">Escolher Plano</a>
            </div>
        </div>
    </div>
</section>

<!-- SEÇÃO BOMBONIÈRE PREVIEW (COM IMAGENS REAIS DE COMIDAS) -->
<section class="bomboniere-preview-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Acompanhamentos Perfeitos</h2>
            <p class="section-subtitle">Sua experiência de cinema fica completa com nossas pipocas quentinhas e bebidas geladas.</p>
        </div>

        <div class="bomboniere-grid">
            <div class="b-item-card">
                <div class="b-item-img-wrap">
                    <img src="https://images.unsplash.com/photo-1578849278619-e73505e9610f?auto=format&fit=crop&w=600&q=80" alt="Combo Salgado P">
                </div>
                <div class="b-item-body">
                    <h3 class="b-item-title">Combo Salgado P</h3>
                    <p class="b-item-desc">Pipoca Salgada Pequena + Refrigerante 500ml</p>
                    <div class="b-item-footer">
                        <span class="b-item-price">R$ 28,00</span>
                        <a href="{{ url('/sobre') }}" class="btn-buy-sm">Pedir</a>
                    </div>
                </div>
            </div>

            <div class="b-item-card">
                <div class="b-item-img-wrap">
                    <img src="https://images.unsplash.com/photo-1585647347483-22b66260dfff?auto=format&fit=crop&w=600&q=80" alt="Combo Duplo VIP">
                </div>
                <div class="b-item-body">
                    <h3 class="b-item-title">Combo Duplo VIP</h3>
                    <p class="b-item-desc">Pipoca Grande + 2 Refrigerantes 700ml</p>
                    <div class="b-item-footer">
                        <span class="b-item-price">R$ 45,00</span>
                        <a href="{{ url('/sobre') }}" class="btn-buy-sm">Pedir</a>
                    </div>
                </div>
            </div>

            <div class="b-item-card">
                <div class="b-item-img-wrap">
                    <img src="https://images.unsplash.com/photo-1582293041079-7814c2f12063?auto=format&fit=crop&w=600&q=80" alt="Combo Doce Especial">
                </div>
                <div class="b-item-body">
                    <h3 class="b-item-title">Combo Doce Especial</h3>
                    <p class="b-item-desc">Pipoca Doce Grande + M&M's + Bebida</p>
                    <div class="b-item-footer">
                        <span class="b-item-price">R$ 38,00</span>
                        <a href="{{ url('/sobre') }}" class="btn-buy-sm">Pedir</a>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ url('/sobre') }}" class="btn btn-primary">
                <i class="fas fa-store"></i> Ver Cardápio Completo
            </a>
        </div>
    </div>
</section>

<!-- PARCEIROS (SEM LOGO CODEFLIX) -->
<section class="partners-section">
    <div class="container">
        <div class="partners-logos">
            <div class="partner-box"><img src="{{ asset('img/Cinepolis.png') }}" alt="Cinépolis"></div>
            <div class="partner-box"><img src="{{ asset('img/cinemark.svg') }}" alt="Cinemark"></div>
        </div>
    </div>
</section>

@endsection
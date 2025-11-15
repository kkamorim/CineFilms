@extends('template')

@section('title', 'Início')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('content')

<!-- HERO CARROSSEL COM OVERLAY ANIMADO -->
<section class="hero-carousel">
    <div class="carousel-wrapper">
        <div class="carousel-track">
            <div class="hero-slide">
                <img src="{{ asset('img/sala3.png') }}" alt="Cinema" class="hero-img"/>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 class="hero-title">Cinefilms</h1>
                    <p class="hero-subtitle">A melhor experiência de cinema da sua vida</p>
                    <div class="hero-cta">
                        <a href="{{ route('filmes') }}" class="btn-primary">Ver Filmes</a>
                        <a href="{{ url('/sobre') }}" class="btn-secondary">Bomboniére</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <span></span>
    </div>
</section>

<!-- FILMES EM CARTAZ COM CARROSSEL 3D MELHORADO -->
<section class="featured-movies">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Filmes em Cartaz</h2>
            <p class="section-subtitle">Descubra os melhores filmes em exibição</p>
        </div>

        <div class="carousel-3d-wrapper">
            <button class="carousel-control prev-control" aria-label="Anterior">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="carousel-3d-container">
                <div class="carousel-3d">
                    @forelse($filmesEmCartaz as $filme)
                        <div class="movie-card-3d">
                            <a href="{{ route('filmes') }}" class="movie-link">
                                <div class="movie-poster">
                                    <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}">
                                    <div class="movie-overlay">
                                        <i class="fas fa-play-circle"></i>
                                        <span>Ver Detalhes</span>
                                    </div>
                                </div>
                                <div class="movie-info">
                                    <h3 class="movie-title">{{ $filme->titulo }}</h3>
                                    <div class="movie-badge">Em Cartaz</div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p class="no-movies">Nenhum filme em cartaz no momento.</p>
                    @endforelse
                </div>
            </div>

            <button class="carousel-control next-control" aria-label="Próximo">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- PRÓXIMOS LANÇAMENTOS COM CARDS MODERNOS -->
<section class="upcoming-movies">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Próximos Lançamentos</h2>
            <p class="section-subtitle">Fique por dentro das estreias que vem por aí</p>
        </div>

        <div class="movies-grid">
            <article class="movie-card modern">
                <div class="card-image">
                    <img src="{{ asset('img/Invocacao.jpg') }}" alt="Invocação do Mal 4">
                    <div class="card-badge">Em Breve</div>
                    <div class="card-overlay">
                        <button class="btn-watch">
                            <i class="fas fa-ticket-alt"></i>
                            Comprar Ingresso
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Invocação do Mal 4: O Último Ritual</h3>
                    <div class="card-meta">
                        <span class="rating">
                            <i class="fas fa-star"></i> 12
                        </span>
                        <span class="duration">
                            <i class="far fa-clock"></i> 2h 29m
                        </span>
                    </div>
                    <p class="card-cast">
                        <i class="fas fa-users"></i>
                        Vera Farmiga, Patrick Wilson, Mia Tomlinson
                    </p>
                    <div class="card-genre">
                        <span class="genre-tag">Terror</span>
                    </div>
                </div>
            </article>

            <article class="movie-card modern">
                <div class="card-image">
                    <img src="{{ asset('img/Rei_Feira.jpg') }}" alt="O Rei da Feira">
                    <div class="card-badge">Em Breve</div>
                    <div class="card-overlay">
                        <button class="btn-watch">
                            <i class="fas fa-ticket-alt"></i>
                            Comprar Ingresso
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">O Rei da Feira</h3>
                    <div class="card-meta">
                        <span class="rating">
                            <i class="fas fa-star"></i> 14
                        </span>
                        <span class="duration">
                            <i class="far fa-clock"></i> 1h 27m
                        </span>
                    </div>
                    <p class="card-cast">
                        <i class="fas fa-users"></i>
                        Leandro Hassum, Pedro Wagner, Luana Martau
                    </p>
                    <div class="card-genre">
                        <span class="genre-tag">Comédia</span>
                    </div>
                </div>
            </article>

            <article class="movie-card modern">
                <div class="card-image">
                    <img src="{{ asset('img/Caras_Malvados.webp') }}" alt="Os Caras Malvados 2">
                    <div class="card-badge">Em Breve</div>
                    <div class="card-overlay">
                        <button class="btn-watch">
                            <i class="fas fa-ticket-alt"></i>
                            Comprar Ingresso
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Os Caras Malvados 2</h3>
                    <div class="card-meta">
                        <span class="rating">
                            <i class="fas fa-star"></i> L
                        </span>
                        <span class="duration">
                            <i class="far fa-clock"></i> 1h 44m
                        </span>
                    </div>
                    <p class="card-cast">
                        <i class="fas fa-users"></i>
                        Sam Rockwell, Craig Robinson, Anthony Ramos
                    </p>
                    <div class="card-genre">
                        <span class="genre-tag">Animação</span>
                        <span class="genre-tag">Família</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- SEÇÃO DE BENEFÍCIOS -->
<section class="benefits">
    <div class="container">
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-couch"></i>
                </div>
                <h3>Poltronas Premium</h3>
                <p>Conforto excepcional com poltronas reclináveis</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>Projeção 4K</h3>
                <p>Imagem e som de última geração</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-popcorn"></i>
                </div>
                <h3>Bomboniére Premium</h3>
                <p>Snacks e bebidas exclusivas</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Ingresso Digital</h3>
                <p>Compre pelo app e evite filas</p>
            </div>
        </div>
    </div>
</section>

<!-- PARCEIROS COM ANIMAÇÃO -->
<section class="partners">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Nossos Parceiros</h2>
            <p class="section-subtitle">Trabalhamos com as melhores redes de cinema</p>
        </div>
        <div class="partners-grid">
            <div class="partner-logo">
                <img src="{{ asset('img/Cinepolis.png') }}" alt="Cinépolis">
            </div>

           <div class="partner-logo">
                <img src="{{ asset('img/codeflix-black.png') }}" alt="codeflix">
            </div>
    
            <div class="partner-logo">
                <img src="{{ asset('img/cinemark.svg') }}" alt="Cinemark">
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
// ===== CARROSSEL 3D AVANÇADO =====
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel-3d');
    const cards = document.querySelectorAll('.movie-card-3d');
    const prevBtn = document.querySelector('.prev-control');
    const nextBtn = document.querySelector('.next-control');
    
    if (!carousel || cards.length === 0) return;
    
    const total = cards.length;
    const angleStep = 360 / total;
    const radius = 450;
    let currentIndex = 0;
    let isAnimating = false;

    // Posicionar cards inicialmente
    function positionCards() {
        cards.forEach((card, i) => {
            const angle = (i * angleStep) * (Math.PI / 180);
            const x = Math.sin(angle) * radius;
            const z = Math.cos(angle) * radius;
            
            card.style.transform = `translateX(${x}px) translateZ(${z}px) rotateY(${-i * angleStep}deg)`;
            
            // Ajustar opacidade baseado na posição
            const distanceFromCenter = Math.abs(i - currentIndex);
            const normalizedDistance = Math.min(distanceFromCenter, total - distanceFromCenter);
            const opacity = 1 - (normalizedDistance / total) * 0.7;
            card.style.opacity = opacity;
            
            // Card central em destaque
            if (i === currentIndex) {
                card.style.zIndex = 100;
                card.classList.add('active');
            } else {
                card.style.zIndex = 50 - normalizedDistance;
                card.classList.remove('active');
            }
        });
    }

    function rotateCarousel(direction) {
        if (isAnimating) return;
        isAnimating = true;

        currentIndex = direction === 'next' 
            ? (currentIndex + 1) % total 
            : (currentIndex - 1 + total) % total;

        const rotation = -currentIndex * angleStep;
        carousel.style.transform = `rotateY(${rotation}deg)`;

        setTimeout(() => {
            positionCards();
            isAnimating = false;
        }, 500);
    }

    nextBtn?.addEventListener('click', () => rotateCarousel('next'));
    prevBtn?.addEventListener('click', () => rotateCarousel('prev'));

    // Auto-rotate
    let autoRotate = setInterval(() => rotateCarousel('next'), 4000);

    carousel.addEventListener('mouseenter', () => clearInterval(autoRotate));
    carousel.addEventListener('mouseleave', () => {
        autoRotate = setInterval(() => rotateCarousel('next'), 4000);
    });

    positionCards();
});

// ===== SCROLL INDICATOR =====
window.addEventListener('scroll', function() {
    const indicator = document.querySelector('.scroll-indicator');
    if (indicator) {
        indicator.style.opacity = window.scrollY > 100 ? '0' : '1';
    }
});

// ===== ANIMAÇÃO DE ENTRADA DOS CARDS =====
const observerOptions = {
    threshold: 0.2,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add('animate-in');
            }, index * 100);
        }
    });
}, observerOptions);

document.querySelectorAll('.movie-card, .benefit-card, .partner-logo').forEach(el => {
    observer.observe(el);
});
</script>
@endsection
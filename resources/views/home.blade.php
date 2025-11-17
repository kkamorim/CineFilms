@extends('template')

@section('title', __('messages.home'))

<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('content')

<section class="hero-carousel">
    <div class="carousel-wrapper">
        <div class="carousel-track">
            <div class="hero-slide">
                <img src="{{ asset('img/sala3.png') }}" alt="Cinema" class="hero-img"/>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 class="hero-title">{{ __('messages.hero.title') }}</h1>
                    <p class="hero-subtitle">{{ __('messages.hero.subtitle') }}</p>
                    <div class="hero-cta">
                        <a href="{{ route('filmes') }}" class="btn-primary">{{ __('messages.hero.see_movies') }}</a>
                        <a href="{{ url('/sobre') }}" class="btn-secondary">{{ __('messages.hero.confectionery') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <span></span>
    </div>
</section>

<section class="featured-movies">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{ __('messages.movies.in_theaters') }}</h2>
            <p class="section-subtitle">{{ __('messages.movies.in_theaters_subtitle') }}</p>
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
                                        <span>{{ __('messages.movies.see_details') }}</span>
                                    </div>
                                </div>
                                <div class="movie-info">
                                    <h3 class="movie-title">{{ $filme->titulo }}</h3>
                                    <div class="movie-badge">{{ __('messages.movies.badge_in_theaters') }}</div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p class="no-movies">{{ __('messages.movies.no_movies') }}</p>
                    @endforelse
                </div>
            </div>

            <button class="carousel-control next-control" aria-label="Próximo">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<section class="upcoming-movies">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{ __('messages.upcoming.title') }}</h2>
            <p class="section-subtitle">{{ __('messages.upcoming.subtitle') }}</p>
        </div>

        <div class="movies-grid">
            <article class="movie-card modern">
                <div class="card-image">
                    <img src="{{ asset('img/Invocacao.jpg') }}" alt="Invocação do Mal 4">
                    <div class="card-badge">{{ __('messages.upcoming.badge_coming_soon') }}</div>
                    <div class="card-overlay">
                        <button class="btn-watch">
                            <i class="fas fa-ticket-alt"></i>
                            {{ __('messages.upcoming.buy_ticket') }}
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
                    <div class="card-badge">{{ __('messages.upcoming.badge_coming_soon') }}</div>
                    <div class="card-overlay">
                        <button class="btn-watch">
                            <i class="fas fa-ticket-alt"></i>
                            {{ __('messages.upcoming.buy_ticket') }}
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
                    <div class="card-badge">{{ __('messages.upcoming.badge_coming_soon') }}</div>
                    <div class="card-overlay">
                        <button class="btn-watch">
                            <i class="fas fa-ticket-alt"></i>
                            {{ __('messages.upcoming.buy_ticket') }}
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
                <h3>{{ __('messages.benefits.premium_seats.title') }}</h3>
                <p>{{ __('messages.benefits.premium_seats.description') }}</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>{{ __('messages.benefits.projection_4k.title') }}</h3>
                <p>{{ __('messages.benefits.projection_4k.description') }}</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-popcorn"></i>
                </div>
                <h3>{{ __('messages.benefits.premium_confectionery.title') }}</h3>
                <p>{{ __('messages.benefits.premium_confectionery.description') }}</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>{{ __('messages.benefits.digital_ticket.title') }}</h3>
                <p>{{ __('messages.benefits.digital_ticket.description') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="partners">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{ __('messages.partners.title') }}</h2>
            <p class="section-subtitle">{{ __('messages.partners.subtitle') }}</p>
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

    function positionCards() {
        cards.forEach((card, i) => {
            const angle = (i * angleStep) * (Math.PI / 180);
            const x = Math.sin(angle) * radius;
            const z = Math.cos(angle) * radius;
            
            card.style.transform = `translateX(${x}px) translateZ(${z}px) rotateY(${-i * angleStep}deg)`;
            
            const distanceFromCenter = Math.abs(i - currentIndex);
            const normalizedDistance = Math.min(distanceFromCenter, total - distanceFromCenter);
            const opacity = 1 - (normalizedDistance / total) * 0.7;
            card.style.opacity = opacity;
            
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

window.addEventListener('scroll', function() {
    const indicator = document.querySelector('.scroll-indicator');
    if (indicator) {
        indicator.style.opacity = window.scrollY > 100 ? '0' : '1';
    }
});

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
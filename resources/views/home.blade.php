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
    const cards = Array.from(document.querySelectorAll('.movie-card-3d'));
    const nextBtn = document.querySelector('.next-control');
    const prevBtn = document.querySelector('.prev-control');

    if (!carousel || cards.length === 0) return;

    const total = cards.length;
    let currentIndex = 0;
    let isAnimating = false;

    // Coverflow layout config
    const CARD_GAP     = 290;   // px between card centers
    const SIDE_SCALE   = 0.78;  // scale for adjacent cards
    const SIDE_OPACITY = 0.55;

    // Build dot indicators
    const dotsContainer = document.createElement('div');
    dotsContainer.className = 'carousel-dots';
    for (let i = 0; i < total; i++) {
        const dot = document.createElement('button');
        dot.className = 'carousel-dot' + (i === 0 ? ' active' : '');
        dot.setAttribute('aria-label', 'Ir para filme ' + (i + 1));
        dot.addEventListener('click', () => goTo(i));
        dotsContainer.appendChild(dot);
    }
    carousel.closest('.carousel-3d-wrapper').appendChild(dotsContainer);

    function updateDots() {
        dotsContainer.querySelectorAll('.carousel-dot').forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
    }

    function positionCards() {
        cards.forEach((card, i) => {
            let offset = i - currentIndex;
            // Wrap around for circular effect
            if (offset > total / 2)  offset -= total;
            if (offset < -total / 2) offset += total;

            const translateX = offset * CARD_GAP;
            const isActive   = offset === 0;
            const absOffset  = Math.abs(offset);
            const visible    = absOffset <= 2;

            const scale   = isActive ? 1 : Math.max(0.55, SIDE_SCALE - Math.max(0, absOffset - 1) * 0.06);
            const opacity = isActive ? 1 : Math.max(0, SIDE_OPACITY - Math.max(0, absOffset - 1) * 0.2);
            const zIndex  = isActive ? 10 : Math.max(0, 5 - absOffset);

            card.style.transform    = `translateX(${translateX}px) scale(${scale})`;
            card.style.opacity      = visible ? opacity : 0;
            card.style.zIndex       = zIndex;
            card.style.pointerEvents = isActive ? 'auto' : 'none';
            card.classList.toggle('active', isActive);
        });

        updateDots();
    }

    function goTo(index) {
        if (isAnimating) return;
        isAnimating = true;
        currentIndex = ((index % total) + total) % total;
        positionCards();
        setTimeout(() => { isAnimating = false; }, 520);
    }

    function rotateCarousel(direction) {
        const next = direction === 'next'
            ? (currentIndex + 1) % total
            : (currentIndex - 1 + total) % total;
        goTo(next);
    }

    nextBtn?.addEventListener('click', () => rotateCarousel('next'));
    prevBtn?.addEventListener('click', () => rotateCarousel('prev'));

    // Touch / swipe support
    let touchStartX = 0;
    carousel.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
    carousel.addEventListener('touchend', e => {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) rotateCarousel(diff > 0 ? 'next' : 'prev');
    });

    // Auto-rotate
    let autoRotate = setInterval(() => rotateCarousel('next'), 4500);
    carousel.addEventListener('mouseenter', () => clearInterval(autoRotate));
    carousel.addEventListener('mouseleave', () => {
        autoRotate = setInterval(() => rotateCarousel('next'), 4500);
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
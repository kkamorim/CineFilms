@extends('template')

@section('title', 'Filmes em Cartaz')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/filmes.css') }}">
@endsection

@section('content')

<!-- HERO CINEMATOGRÁFICO -->
<section class="cinema-hero">
    <div class="hero-background">
        <img src="{{ asset('img/sala.jpg') }}" class="hero-bg-image" alt="Sala de cinema">
        <div class="hero-gradient"></div>
        <div class="hero-particles"></div>
    </div>
    
    <div class="hero-content-wrapper">
        <div class="hero-badge">
            <i class="fas fa-film"></i>
            <span>Em Cartaz Agora</span>
        </div>
        <h1 class="hero-main-title">Cinefilms</h1>
        <p class="hero-tagline">Viva a magia do cinema em alta definição</p>
        
        <div class="hero-stats">
            <div class="stat-item">
                <i class="fas fa-ticket-alt"></i>
                <div class="stat-info">
                    <span class="stat-number">{{ count($filmes) }}</span>
                    <span class="stat-label">Filmes</span>
                </div>
            </div>
            <div class="stat-item">
                <i class="fas fa-star"></i>
                <div class="stat-info">
                    <span class="stat-number">4K</span>
                    <span class="stat-label">Qualidade</span>
                </div>
            </div>
            <div class="stat-item">
                <i class="fas fa-couch"></i>
                <div class="stat-info">
                    <span class="stat-number">Premium</span>
                    <span class="stat-label">Conforto</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="scroll-down">
        <span>Arraste para ver a programação</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- FILTROS E NAVEGAÇÃO AVANÇADA -->
<section class="filters-section">
    <div class="container">
        <div class="filters-header">
            <h2 class="filters-title">
                <i class="fas fa-calendar-alt"></i>
                Escolha seu dia
            </h2>
            <div class="view-toggle">
                <button class="toggle-btn active" data-view="list">
                    <i class="fas fa-list"></i> Lista
                </button>
                <button class="toggle-btn" data-view="grid">
                    <i class="fas fa-th-large"></i> Grade
                </button>
            </div>
        </div>

        <!-- SELETOR DE SEMANA MODERNO -->
        <div class="week-calendar">
            <button class="calendar-nav prev-week" aria-label="Semana anterior">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="days-container">
                <div class="day-card selected" data-dia="dom">
                    <span class="day-name">Domingo</span>
                    <span class="day-number">03</span>
                    <span class="day-month">NOV</span>
                </div>
                <div class="day-card" data-dia="seg">
                    <span class="day-name">Segunda</span>
                    <span class="day-number">04</span>
                    <span class="day-month">NOV</span>
                </div>
                <div class="day-card" data-dia="ter">
                    <span class="day-name">Terça</span>
                    <span class="day-number">05</span>
                    <span class="day-month">NOV</span>
                </div>
                <div class="day-card" data-dia="qua">
                    <span class="day-name">Quarta</span>
                    <span class="day-number">06</span>
                    <span class="day-month">NOV</span>
                </div>
                <div class="day-card" data-dia="qui">
                    <span class="day-name">Quinta</span>
                    <span class="day-number">07</span>
                    <span class="day-month">NOV</span>
                </div>
                <div class="day-card" data-dia="sex">
                    <span class="day-name">Sexta</span>
                    <span class="day-number">08</span>
                    <span class="day-month">NOV</span>
                </div>
                <div class="day-card" data-dia="sab">
                    <span class="day-name">Sábado</span>
                    <span class="day-number">09</span>
                    <span class="day-month">NOV</span>
                </div>
            </div>
            
            <button class="calendar-nav next-week" aria-label="Próxima semana">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- FILTROS ADICIONAIS -->
        <div class="additional-filters">
            <div class="filter-group">
                <label>
                    <i class="fas fa-theater-masks"></i>
                    Gênero
                </label>
                <select class="filter-select" id="genreFilter">
                    <option value="">Todos os gêneros</option>
                    <option value="acao">Ação</option>
                    <option value="comedia">Comédia</option>
                    <option value="drama">Drama</option>
                    <option value="terror">Terror</option>
                    <option value="animacao">Animação</option>
                </select>
            </div>

            <div class="filter-group">
                <label>
                    <i class="fas fa-star"></i>
                    Classificação
                </label>
                <select class="filter-select" id="ratingFilter">
                    <option value="">Todas</option>
                    <option value="L">Livre</option>
                    <option value="10">10 anos</option>
                    <option value="12">12 anos</option>
                    <option value="14">14 anos</option>
                    <option value="16">16 anos</option>
                    <option value="18">18 anos</option>
                </select>
            </div>

            <div class="filter-group">
                <label>
                    <i class="fas fa-clock"></i>
                    Horário
                </label>
                <select class="filter-select" id="timeFilter">
                    <option value="">Todos os horários</option>
                    <option value="manha">Manhã (até 12h)</option>
                    <option value="tarde">Tarde (12h-18h)</option>
                    <option value="noite">Noite (após 18h)</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- LISTA DE FILMES PREMIUM -->
<section class="movies-showcase">
    <div class="container">
        <div class="movies-grid-container list-view" id="moviesContainer">
            @forelse($filmes as $index => $filme)
            <article class="movie-item" data-index="{{ $index }}">
                <div class="movie-poster-wrapper">
                    <div class="poster-container">
                        <img src="{{ asset('storage/' . $filme->imagem) }}" 
                             alt="{{ $filme->titulo }}" 
                             class="movie-poster">
                        <div class="poster-overlay">
                            <button class="play-trailer" data-movie="{{ $filme->id }}">
                                <i class="fas fa-play"></i>
                                <span>Ver Trailer</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="movie-rating-badge">
                        <i class="fas fa-star"></i>
                        <span>{{ $filme->classificacao ?? 'N/A' }}</span>
                    </div>
                </div>

                <div class="movie-details">
                    <div class="movie-header">
                        <h3 class="movie-title">{{ $filme->titulo }}</h3>
                        <button class="favorite-btn" aria-label="Adicionar aos favoritos">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>

                    <div class="movie-meta">
                        <span class="meta-item">
                            <i class="fas fa-theater-masks"></i>
                            {{ $filme->genero }}
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-clock"></i>
                            {{ $filme->duracao ?? '120' }} min
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-users"></i>
                            {{ $filme->classificacao }}
                        </span>
                    </div>

                    <p class="movie-synopsis">
                        <strong>Sinopse:</strong> 
                        {{ Str::limit($filme->descricao, 200) }}
                    </p>

                    <!-- SESSÕES DISPONÍVEIS -->
                    <div class="movie-sessions">
                        <h4 class="sessions-title">
                            <i class="fas fa-ticket-alt"></i>
                            Sessões Disponíveis
                        </h4>
                        <div class="sessions-grid">
                            <button class="session-time" data-time="14:30">14:30</button>
                            <button class="session-time" data-time="17:00">17:00</button>
                            <button class="session-time" data-time="19:30">19:30</button>
                            <button class="session-time" data-time="22:00">22:00</button>
                        </div>
                    </div>

                    <!-- TECNOLOGIAS -->
                    <div class="movie-tech">
                        <span class="tech-badge">
                            <i class="fas fa-film"></i> 4K
                        </span>
                        <span class="tech-badge">
                            <i class="fas fa-volume-up"></i> Dolby Atmos
                        </span>
                        <span class="tech-badge">
                            <i class="fas fa-glasses"></i> 3D
                        </span>
                    </div>

                    <div class="movie-actions">
                        <button class="btn-buy-ticket">
                            <i class="fas fa-ticket-alt"></i>
                            Comprar Ingresso
                        </button>
                        <button class="btn-more-info">
                            <i class="fas fa-info-circle"></i>
                            Mais Informações
                        </button>
                    </div>
                </div>
            </article>
            @empty
            <div class="no-movies">
                <i class="fas fa-film"></i>
                <h3>Nenhum filme em cartaz</h3>
                <p>Volte em breve para conferir nossa programação</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- NEWSLETTER CINEMATOGRÁFICA -->
<section class="cinema-newsletter">
    <div class="container">
        <div class="newsletter-content">
            <div class="newsletter-icon">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <div class="newsletter-text">
                <h3>Receba nossa programação</h3>
                <p>Fique por dentro dos lançamentos e promoções exclusivas</p>
            </div>
            <form class="newsletter-form">
                <input type="email" placeholder="Coloque seu e-mail aqui" required>
                <button type="submit">
                    <i class="fas fa-paper-plane"></i>
                    Inscrever-se
                </button>
            </form>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== SELETOR DE DIAS =====
    const dayCards = document.querySelectorAll('.day-card');
    
    dayCards.forEach(card => {
        card.addEventListener('click', function() {
            dayCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            
            // Animação de feedback
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 100);
        });
    });

    // ===== NAVEGAÇÃO DE SEMANA =====
    const prevWeek = document.querySelector('.prev-week');
    const nextWeek = document.querySelector('.next-week');
    const daysContainer = document.querySelector('.days-container');

    prevWeek?.addEventListener('click', () => {
        daysContainer.scrollBy({ left: -200, behavior: 'smooth' });
    });

    nextWeek?.addEventListener('click', () => {
        daysContainer.scrollBy({ left: 200, behavior: 'smooth' });
    });

    // ===== TOGGLE VIEW (LISTA/GRADE) =====
    const toggleBtns = document.querySelectorAll('.toggle-btn');
    const moviesContainer = document.getElementById('moviesContainer');

    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            toggleBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const view = this.dataset.view;
            moviesContainer.className = view === 'grid' 
                ? 'movies-grid-container grid-view' 
                : 'movies-grid-container list-view';
        });
    });

    // ===== FAVORITOS =====
    const favoriteBtns = document.querySelectorAll('.favorite-btn');
    
    favoriteBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const icon = this.querySelector('i');
            icon.classList.toggle('far');
            icon.classList.toggle('fas');
            
            if (icon.classList.contains('fas')) {
                this.style.color = '#ff6b6b';
                showToast('Adicionado aos favoritos!');
            } else {
                this.style.color = '';
                showToast('Removido dos favoritos');
            }
        });
    });

    // ===== SELEÇÃO DE SESSÕES =====
    const sessionTimes = document.querySelectorAll('.session-time');
    
    sessionTimes.forEach(time => {
        time.addEventListener('click', function() {
            const parent = this.closest('.movie-sessions');
            parent.querySelectorAll('.session-time').forEach(t => {
                t.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });

    // ===== PLAY TRAILER =====
    const playBtns = document.querySelectorAll('.play-trailer');
    
    playBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const movieId = this.dataset.movie;
            showToast('Abrindo trailer...');
            // Aqui você pode abrir um modal com o trailer
        });
    });

    // ===== FILTROS =====
    const genreFilter = document.getElementById('genreFilter');
    const ratingFilter = document.getElementById('ratingFilter');
    const timeFilter = document.getElementById('timeFilter');

    [genreFilter, ratingFilter, timeFilter].forEach(filter => {
        filter?.addEventListener('change', function() {
            applyFilters();
        });
    });

    function applyFilters() {
        // Implementar lógica de filtros aqui
        showToast('Filtros aplicados!');
    }

    // ===== ANIMAÇÃO DE ENTRADA DOS CARDS =====
    const movieItems = document.querySelectorAll('.movie-item');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-in');
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    movieItems.forEach(item => observer.observe(item));

    // ===== SCROLL SUAVE NO HERO =====
    const scrollDown = document.querySelector('.scroll-down');
    
    scrollDown?.addEventListener('click', () => {
        document.querySelector('.filters-section').scrollIntoView({ 
            behavior: 'smooth' 
        });
    });

    // ===== TOAST NOTIFICATION =====
    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.innerHTML = `
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
        `;
        document.body.appendChild(toast);
        
        setTimeout(() => toast.classList.add('show'), 100);
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // ===== NEWSLETTER =====
    const newsletterForm = document.querySelector('.newsletter-form');
    
    newsletterForm?.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('input').value;
        showToast('Inscrição realizada com sucesso!');
        this.reset();
    });
});
</script>
@endsection
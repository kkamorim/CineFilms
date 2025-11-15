@extends('template')

@section('title', 'Quem Somos - Cinefilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/quem-somos.css') }}">
@endsection

@section('content')

<!-- HERO CINEMATOGRÁFICO -->
<section class="about-hero">
    <div class="hero-parallax" style="background-image: url('{{ asset('img/sala.jpg') }}')">
        <div class="hero-overlay"></div>
        <div class="hero-particles"></div>
    </div>
    
    <div class="hero-content-about">
        <div class="hero-badge-about">
            <i class="fas fa-film"></i>
            <span>Desde 2024</span>
        </div>
        <h1 class="hero-title-about">Nossa História</h1>
        <p class="hero-subtitle-about">Descubra novas emoções e viva o cinema como nunca antes no CineFilms!</p>
        <div class="hero-scroll">
            <span>Conheça nossa jornada</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</section>

<!-- NOSSA HISTÓRIA -->
<section class="our-story">
    <div class="container">
        <div class="story-content">
            <div class="story-media">
                <div class="media-card">
                    <img src="{{ asset('img/sala.jpg') }}" alt="Cinema Cinefilms">
                    <div class="media-overlay">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
                <div class="story-stats">
                    <div class="stat-box">
                        <span class="stat-number" data-count="5000">0</span>
                        <span class="stat-label">Clientes Felizes</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number" data-count="150">0</span>
                        <span class="stat-label">Filmes Exibidos</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number" data-count="10">0</span>
                        <span class="stat-label">Salas Premium</span>
                    </div>
                </div>
            </div>

            <div class="story-text">
                <div class="section-label">
                    <i class="fas fa-star"></i>
                    <span>Quem Somos</span>
                </div>
                <h2 class="section-title-about">Bem-vindo à CineFilms!</h2>
                <p class="story-description">
                    Somos uma plataforma dedicada à paixão pelo cinema! Nossa missão é tornar sua experiência única, confortável e envolvente, desde a escolha do filme até o último segundo da sessão.
                </p>
                <p class="story-description">
                    Com tecnologia de ponta, ambiente confortável e uma equipe apaixonada, transformamos cada visita em uma experiência cinematográfica inesquecível. Aqui, o cinema não é apenas entretenimento – é uma jornada sensorial completa.
                </p>

                <div class="story-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-film"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Projeção 4K</h4>
                            <p>Imagem cristalina e cores vibrantes</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-volume-up"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Som Dolby Atmos</h4>
                            <p>Áudio imersivo de última geração</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-couch"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Poltronas Premium</h4>
                            <p>Conforto excepcional e reclinável</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MISSÃO, VISÃO E VALORES -->
<section class="values-section">
    <div class="container">
        <div class="values-header">
            <div class="section-label">
                <i class="fas fa-bullseye"></i>
                <span>Nossos Pilares</span>
            </div>
            <h2 class="section-title-about">O que nos move</h2>
            <p class="section-subtitle">Os valores e propósitos que guiam cada decisão na CineFilms</p>
        </div>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon-wrapper">
                    <div class="value-icon mission">
                        <i class="fas fa-bullseye"></i>
                    </div>
                </div>
                <h3 class="value-title">Missão</h3>
                <p class="value-description">
                    Oferecer uma experiência cinematográfica moderna, prática e acessível para todos os públicos, democratizando o acesso à cultura e ao entretenimento de qualidade.
                </p>
                <div class="value-badge">Nosso Propósito</div>
            </div>

            <div class="value-card featured">
                <div class="featured-badge">
                    <i class="fas fa-crown"></i>
                    <span>Destaque</span>
                </div>
                <div class="value-icon-wrapper">
                    <div class="value-icon vision">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                <h3 class="value-title">Visão</h3>
                <p class="value-description">
                    Ser referência nacional em inovação e tecnologia para agendamentos de sessões de cinema, sempre pioneiros em soluções que facilitam a vida dos cinéfilos.
                </p>
                <div class="value-badge">Nosso Objetivo</div>
            </div>

            <div class="value-card">
                <div class="value-icon-wrapper">
                    <div class="value-icon values">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <h3 class="value-title">Valores</h3>
                <p class="value-description">
                    Compromisso com a excelência, respeito ao cliente, inovação constante, ética em todas as relações e, acima de tudo, paixão genuína pelo cinema.
                </p>
                <div class="value-badge">Nossa Essência</div>
            </div>
        </div>
    </div>
</section>

<!-- DIFERENCIAIS -->
<section class="differentials-section">
    <div class="container">
        <div class="differentials-header">
            <div class="section-label">
                <i class="fas fa-award"></i>
                <span>Diferenciais</span>
            </div>
            <h2 class="section-title-about">Por que escolher a CineFilms?</h2>
        </div>

        <div class="differentials-grid">
            <div class="differential-item">
                <div class="differential-number">01</div>
                <div class="differential-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Tecnologia Avançada</h3>
                <p>Plataforma intuitiva para compra de ingressos online com apenas alguns cliques</p>
            </div>

            <div class="differential-item">
                <div class="differential-number">02</div>
                <div class="differential-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Segurança Total</h3>
                <p>Seus dados protegidos com criptografia de ponta e pagamentos 100% seguros</p>
            </div>

            <div class="differential-item">
                <div class="differential-number">03</div>
                <div class="differential-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h3>Promoções Exclusivas</h3>
                <p>Descontos especiais e benefícios para membros da comunidade CineFilms</p>
            </div>

            <div class="differential-item">
                <div class="differential-number">04</div>
                <div class="differential-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Suporte Premium</h3>
                <p>Atendimento personalizado e ágil para resolver qualquer dúvida ou problema</p>
            </div>
        </div>
    </div>
</section>

<!-- EQUIPE -->
<section class="team-section">
    <div class="container">
        <div class="team-header">
            <div class="section-label">
                <i class="fas fa-users"></i>
                <span>Equipe</span>
            </div>
            <h2 class="section-title-about">Conheça Nossa Equipe</h2>
            <p class="section-subtitle">Os profissionais apaixonados que tornaram este projeto realidade</p>
        </div>

        <div class="team-grid">
            <article class="team-card">
                <div class="team-image-wrapper">
                    <div class="team-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="team-overlay">
                        <div class="social-links">
                            <a href="https://www.linkedin.com/in/kaua-amorim" target="_blank" class="social-link" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://github.com/kauaamorim" target="_blank" class="social-link" aria-label="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="mailto:kaua@cinefilms.com" class="social-link" aria-label="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3 class="team-name">Kauã Amorim</h3>
                    <p class="team-role">Front-End Developer</p>
                    <p class="team-description">
                        Criador de interfaces modernas e intuitivas, focado em experiência do usuário excepcional.
                    </p>
                    <div class="team-skills">
                        <span class="skill-tag">HTML/CSS</span>
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag">UI/UX</span>
                    </div>
                </div>
            </article>

            <article class="team-card featured-member">
                <div class="featured-label">
                    <i class="fas fa-crown"></i>
                    <span>Destaque</span>
                </div>
                <div class="team-image-wrapper">
                    <div class="team-avatar featured-avatar">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="team-overlay">
                        <div class="social-links">
                            <a href="https://www.linkedin.com/in/gabriel-arruda" target="_blank" class="social-link" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://github.com/gabrielarruda" target="_blank" class="social-link" aria-label="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="mailto:gabriel@cinefilms.com" class="social-link" aria-label="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3 class="team-name">Gabriel Arruda</h3>
                    <p class="team-role">Full Stack Developer</p>
                    <p class="team-description">
                        Especialista em desenvolvimento completo, responsável pela arquitetura e implementação do sistema.
                    </p>
                    <div class="team-skills">
                        <span class="skill-tag">Laravel</span>
                        <span class="skill-tag">HTML/CSS</span>
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag">APIs</span>
                        <span class="skill-tag">MySQL</span>
                    </div>
                </div>
            </article>

            <article class="team-card">
                <div class="team-image-wrapper">
                    <div class="team-avatar">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="team-overlay">
                        <div class="social-links">
                            <a href="https://www.linkedin.com/in/lucas-dev" target="_blank" class="social-link" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://github.com/lucasdev" target="_blank" class="social-link" aria-label="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="mailto:lucas@cinefilms.com" class="social-link" aria-label="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3 class="team-name">Lucas</h3>
                    <p class="team-role">Back-End Developer</p>
                    <p class="team-description">
                        Especialista em lógica de negócios e APIs robustas, garantindo performance e segurança.
                    </p>
                    <div class="team-skills">
                        <span class="skill-tag">PHP</span>
                        <span class="skill-tag">APIs</span>
                        <span class="skill-tag">Database</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- CALL TO ACTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <div class="cta-icon">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <div class="cta-text">
                <h2>Pronto para viver a experiência?</h2>
                <p>Descubra os filmes em cartaz e reserve seu ingresso agora mesmo</p>
            </div>
            <div class="cta-actions">
                <a href="{{ url('/filme-em-cartaz.blade') }}" class="cta-button primary">
                    <i class="fas fa-film"></i>
                    Ver Filmes
                </a>
                <a href="{{ url('/contato') }}" class="cta-button secondary">
                    <i class="fas fa-envelope"></i>
                    Fale Conosco
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== PARALLAX EFFECT =====
    const heroParallax = document.querySelector('.hero-parallax');
    
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const rate = scrolled * 0.5;
        if (heroParallax) {
            heroParallax.style.transform = `translateY(${rate}px)`;
        }
    });

    // ===== COUNTER ANIMATION =====
    const counters = document.querySelectorAll('.stat-number');
    
    const animateCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current) + '+';
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target + '+';
            }
        };
        
        updateCounter();
    };

    // ===== INTERSECTION OBSERVER =====
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                
                // Animar contadores quando visíveis
                if (entry.target.classList.contains('story-stats')) {
                    counters.forEach(counter => animateCounter(counter));
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observar elementos
    document.querySelectorAll('.story-media, .story-text, .value-card, .differential-item, .team-card, .cta-content').forEach(el => {
        observer.observe(el);
    });

    // ===== SCROLL SUAVE =====
    const heroScroll = document.querySelector('.hero-scroll');
    
    heroScroll?.addEventListener('click', () => {
        document.querySelector('.our-story').scrollIntoView({ 
            behavior: 'smooth' 
        });
    });

    // ===== HOVER EFFECT NOS CARDS =====
    const valueCards = document.querySelectorAll('.value-card');
    
    valueCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });

    // ===== TEAM CARD FLIP EFFECT =====
    const teamCards = document.querySelectorAll('.team-card');
    
    teamCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const overlay = this.querySelector('.team-overlay');
            if (overlay) {
                overlay.style.opacity = '1';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            const overlay = this.querySelector('.team-overlay');
            if (overlay) {
                overlay.style.opacity = '0';
            }
        });
    });

    // ===== MEDIA PLAY BUTTON =====
    const playButton = document.querySelector('.media-overlay');
    
    playButton?.addEventListener('click', function() {
        alert('Funcionalidade de vídeo em breve!');
    });

    // ===== SCROLL REVEAL ANIMATION =====
    const revealElements = document.querySelectorAll('.differential-item, .feature-item');
    
    revealElements.forEach((el, index) => {
        setTimeout(() => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
        }, 0);
        
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.transition = 'all 0.6s ease';
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        
        revealObserver.observe(el);
    });
});
</script>
@endsection
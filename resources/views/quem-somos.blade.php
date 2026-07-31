@extends('template')

@section('title', 'Quem Somos - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/quem-somos.css') }}">
@endsection

@section('content')

<div class="about-header">
    <div class="container">
        <h1 class="about-title">Nossa História & Paixão pelo Cinema</h1>
        <p class="about-subtitle">Transformando simples exibições em momentos inesquecíveis de pura magia cinematográfica.</p>
    </div>
</div>

<div class="about-section">
    <div class="container">
        <div class="about-grid">
            <div>
                <h2 style="font-size:2rem; font-weight:800; color:var(--gray-900); margin-bottom:16px;">Inovação e Tradição</h2>
                <p style="color:var(--gray-600); margin-bottom:16px; line-height:1.7;">
                    Fundada em 2024, a <strong>CineFilms</strong> nasceu da vontade de revolucionar a experiência do espectador. Investimos constantemente na melhoria técnica de nossas salas de exibição, trazendo o que há de mais moderno em projeção a laser 4K e acústica Dolby Atmos.
                </p>
                <p style="color:var(--gray-600); line-height:1.7;">
                    Além de salas confortáveis com poltronas reclináveis ultra-macias, oferecemos uma compra de ingressos ágil e sem complicações através da nossa plataforma digital.
                </p>
            </div>
            <div>
                <img src="{{ asset('img/sala.jpg') }}" class="about-img" alt="Cinema CineFilms">
            </div>
        </div>
    </div>
</div>

<!-- MISSÃO VISÃO VALORES -->
<div style="background:var(--gray-50); padding:80px 0; border-top:1px solid var(--gray-200); border-bottom:1px solid var(--gray-200);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Nossos Pilares</h2>
            <p class="section-subtitle">Os compromissos que nos guiam diariamente.</p>
        </div>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-bullseye"></i></div>
                <h3 class="value-title">Missão</h3>
                <p style="color:var(--gray-600); font-size:0.9rem; line-height:1.6;">Proporcionar momentos inesquecíveis através da exibição cinematográfica de alta qualidade e atendimento impecável.</p>
            </div>

            <div class="value-card">
                <div class="value-icon"><i class="fas fa-eye"></i></div>
                <h3 class="value-title">Visão</h3>
                <p style="color:var(--gray-600); font-size:0.9rem; line-height:1.6;">Ser a principal referência regional em inovação no setor de cinema e entretenimento audiovisual.</p>
            </div>

            <div class="value-card">
                <div class="value-icon"><i class="fas fa-heart"></i></div>
                <h3 class="value-title">Valores</h3>
                <p style="color:var(--gray-600); font-size:0.9rem; line-height:1.6;">Paixão pela arte, respeito ao cliente, excelência operacional, acessibilidade e inovação contínua.</p>
            </div>
        </div>
    </div>
</div>

<!-- EQUIPE -->
<div class="about-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Equipe Desenvolvedora</h2>
            <p class="section-subtitle">Mentes dedicadas a criar a melhor experiência digital do CineFilms.</p>
        </div>

        <div class="team-grid">
            <div class="team-card">
                <img src="{{ asset('img/kaua.png') }}" class="team-avatar" alt="Kauã Amorim" onerror="this.src='{{ asset('img/do-utilizador.png') }}'">
                <h3 class="team-name">Kauã Amorim</h3>
                <div class="team-role">Front-End Developer</div>
                <p style="font-size:0.85rem; color:var(--gray-500);">Especialista em UI/UX e design de interfaces focadas no usuário.</p>
                <div class="social-links-equipe">
                    <a href="https://github.com/kkamorim" target="_blank" aria-label="Github">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/kauaamorim/" target="_blank" aria-label="Linkedin">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('img/arruda.png') }}" class="team-avatar" alt="Gabriel Arruda" onerror="this.src='{{ asset('img/do-utilizador.png') }}'">
                <h3 class="team-name">Gabriel Arruda</h3>
                <div class="team-role">Full Stack Developer</div>
                <p style="font-size:0.85rem; color:var(--gray-500);">Arquiteto do sistema, integração de APIs e infraestrutura Laravel.</p>
                <div class="social-links-equipe">
                    <a href="https://github.com/Gabrielarruda177/" target="_blank" aria-label="Github">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/gabriel-arruda-47845b1aa/" target="_blank" aria-label="Linkedin">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('img/lukas.png') }}" class="team-avatar" alt="Lucas" onerror="this.src='{{ asset('img/do-utilizador.png') }}'">
                <h3 class="team-name">Lucas</h3>
                <div class="team-role">Back-End Developer</div>
                <p style="font-size:0.85rem; color:var(--gray-500);">Desenvolvimento da lógica de negócios e segurança de dados.</p>
                <div class="social-links-equipe">
                    <a href="#" target="_blank" aria-label="Github">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" target="_blank" aria-label="Linkedin">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
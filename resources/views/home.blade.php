@extends('template')

@section('title', 'Início - Cinefilms')

@section('content')

<section class="hero-section">
    <img src="{{ asset('img/sala3.png') }}" class="hero-image" alt="Pessoas felizes assistindo a um filme no cinema">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h2>Cinefilms, A melhor experiência de cinema!</h2>
    </div>
</section>

<h1>Filmes em Cartaz</h1>

<section class="carousel3d-container">
    <button class="carousel-btn prev-btn"><i class="fas fa-chevron-left"></i></button>

    <div class="carousel3d">
        <div class="carousel3d-card" data-filme="0">
            <h2>SUPERMAN</h2>
            <a href="#">
                <img src="{{ asset('img/superman.jpg') }}" class="carrossel3d-img" alt="Superman">
            </a>
        </div>
        <div class="carousel3d-card" data-filme="1">
            <h2>VINGADORES</h2>
            <a href="#">
                <img src="{{ asset('img/vingadores.jpg') }}" class="carrossel3d-img" alt="Vingadores">
            </a>
        </div>
        <div class="carousel3d-card" data-filme="2">
            <h2>HOMEM-ARANHA</h2>
            <a href="#">
                <img src="{{ asset('img/aranha.jpg') }}" class="carrossel3d-img" alt="Homem-Aranha">
            </a>
        </div>
        <div class="carousel3d-card" data-filme="3">
            <h2>BATMAN</h2>
            <a href="#">
                <img src="{{ asset('img/batman.jpg') }}" class="carrossel3d-img" alt="Batman">
            </a>
        </div>
        </div>

    <button class="carousel-btn next-btn"><i class="fas fa-chevron-right"></i></button>
</section>

<section class="produtos">
    <h2>Próximos lançamentos</h2>
    <div class="grid-produtos">
        
        <div class="card">
            <img src="{{ asset('img/Invocacao.jpg') }}" alt="Invocação do Mal 4: O Último Ritual">
            <div class="filme-desc">
                <h3>Invocação do Mal 4: O Último Ritual</h3>
                <p><b>12 • 2h 29m</b></p>
                <p><b>Elenco</b>: Vera Farmiga, Patrick Wilson, Mia Tomlinson</p>
                <p><b>Gênero</b>: Terror</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('img/Rei_Feira.jpg') }}" alt="O Rei da Feira">
            <div class="filme-desc">
                <h3>O Rei da Feira</h3>
                <p><b>14 • 1 hr 27 min</b></p>
                <p><b>Elenco</b>: Leandro Hassum, Pedro Wagner, Luana Martau</p>
                <p><b>Gênero</b>: Comédia</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('img/Caras_Malvados.webp') }}" alt="Os Caras Malvados 2">
            <div class="filme-desc">
                <h3>Os Caras Malvados 2</h3>
                <p><b>Livre • 1 hr 44 min</b></p>
                <p><b>Elenco</b>: Sam Rockwell, Craig Robinson, Anthony Ramos</p>
                <p><b>Gênero</b>: Animação, Filme para família, Comédia</p>
            </div>
        </div>
    </div>
</section>

<section class="parceiros">
    <h2>Nossos Parceiros</h2>
    <div class="logos-parceiros">
        <img src="{{ asset('img/Cinepolis.png') }}" alt="Cinépolis">
        <img src="{{ asset('img/cinemark.svg') }}" alt="Cinemark">
    </div>
</section>

@endsection

@section('scripts')
<script>
    const carousel = document.querySelector('.carousel3d');
    const cards = document.querySelectorAll('.carousel3d-card');
    const total = cards.length;
    // Ângulo ajustado para 4 cards: 360 graus dividido por 4
    const angleStep = 360 / total; 
    const distance = 400; 

    let currentAngle = 0;
    let currentIndex = 0;

    // Posiciona os cards na inicialização
    cards.forEach((card, i) => {
        const rotationAngle = i * angleStep;
        card.style.transform = `rotateY(${rotationAngle}deg) translateZ(${distance}px)`;
    });

    // Função para atualizar a rotação do carrossel
    function updateCarousel() {
        currentAngle = -currentIndex * angleStep;
        carousel.style.transform = `rotateY(${currentAngle}deg)`;
    }

    document.querySelector('.next-btn').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % total;
        updateCarousel();
    });

    document.querySelector('.prev-btn').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + total) % total;
        updateCarousel();
    });
</script>
@endsection
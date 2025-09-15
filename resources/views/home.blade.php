@extends('template')

@section('title', 'Início')

@section('content')

<section class="carrossel-container">
    <div class="carrossel-slide">
        <div class="fundo">
            <img src="{{ asset('img/sala3.png') }}" class="carrossel-img"/>
            <div class="fundo-conteudo">
                <h2>Cinefilms, A melhor experiência de cinema!</h2>
            </div>
        </div>
    </div>
</section>

<h1>Filmes em Cartaz</h1>

<section class="carousel3d-container">
    <button class="carousel-btn prev-btn">&#10094;</button>

    <div class="carousel3d">
        @forelse($filmesEmCartaz as $filme)
            <div class="carousel3d-card">
                <h2>{{ $filme->titulo }}</h2>
                <a href="{{ route('filmes') }}">
                    <img src="{{ asset('storage/' . $filme->imagem) }}" class="carrossel3d-img" alt="{{ $filme->titulo }}">
                </a>
            </div>
        @empty
            <p>Nenhum filme em cartaz.</p>
        @endforelse
    </div>

    <button class="carousel-btn next-btn">&#10095;</button>
</section>

<section class="produtos">
    <h2>Próximos lançamentos</h2>
    <div class="grid-produtos">
        <div class="card">
            <img src="{{ asset('img/Invocacao.jpg') }}" alt="Vingadores Guerra Infinita">
            <div class="filme-desc">
                <h3>Invocação do Mal 4: O Último Ritual</h3>
                <p><b>12 • 2h 29m</b></p>
                <p><b>Elenco</b>: Vera Farmiga, Patrick Wilson, Mia Tomlinson</p>
                <p><b>Gênero</b>: Terror</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('img/Rei_Feira.jpg') }}" alt="Avatar 2">
            <div class="filme-desc">
                <h3>O Rei da Feira</h3>
                <p><b>14 • 1 hr 27 min</b></p>
                <p><b>Elenco</b>: Leandro Hassum, Pedro Wagner, Luana Martau</p>
                <p><b>Gênero</b>: Comédia</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('img/Caras_Malvados.webp') }}" alt="Como Treinar o Seu Dragão">
            <div class="filme-desc">
                <h3>Os Caras Malvados 2</h3>
                <p><b>1 hr 44 min</b></p>
                <p><b>Elenco</b>: Sam Rockwell, Craig Robinson, Anthony Ramos</p>
                <p><b>Gênero</b>: Animação, Filme para família, Comédi</p>
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
    const angleStep = 270 / total; 
    const distance = 400; 

    let currentAngle = 0;
    let currentIndex = 0;

    cards.forEach((card, i) => {
        card.style.transform = `rotateY(${i * angleStep}deg) translateZ(${distance}px)`;
    });

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carrosselSlide = document.querySelector('.carrossel-slide');
        const carrosselImgs = document.querySelectorAll('.carrossel-img');
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');

        let counter = 0;
        let size = carrosselImgs[0].clientWidth;

        function updateSlide() {
            carrosselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        }

        nextBtn?.addEventListener('click', () => {
            counter++;
            if (counter >= carrosselImgs.length) {
                counter = 0;
            }
            updateSlide();
        });

        prevBtn?.addEventListener('click', () => {
            counter--;
            if (counter < 0) {
                counter = carrosselImgs.length - 1;
            }
            updateSlide();
        });

        window.addEventListener('resize', () => {
            size = carrosselImgs[0].clientWidth;
            carrosselSlide.style.transition = 'none';
            carrosselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
            setTimeout(() => {
                carrosselSlide.style.transition = 'transform 0.5s ease-in-out';
            }, 50);
        });
    });
</script>
@endsection
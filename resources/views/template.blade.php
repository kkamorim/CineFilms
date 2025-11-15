<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cinefilms - A melhor experiência de cinema">
    <meta name="keywords" content="cinema, filmes, ingressos, bomboniére">
    <title>@yield('title', 'Cinefilms - Cinema')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/cinefilms2.png') }}">

    <!-- CSS Local -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('head')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
          integrity="sha512-bdPjeF7O3pckYpFZa5VlE2R9OwMgiGvKQQfnrH/2+2Jh5p+zKpc3rTNN+ItzXn+vZypqVjovT+QmtB5fAoAdw==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- HEADER -->
    <header>
        <nav class="navbar" id="navbar">
            <div class="logo-container">
                <a href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('img/cinefilms2.png') }}" alt="Cinefilms Logo">
                </a>
            </div>

            <ul class="menu">
                <li><a href="{{ url('/') }}">Início</a></li>
                <li><a href="{{ route('filme-em-cartaz') }}">Em Cartaz</a></li>
                <li><a href="{{ url('/sobre') }}">Bomboniére</a></li>
                <li><a href="{{ url('/contato') }}">Contato</a></li>
                <li><a href="{{ url('/quem-somos') }}">Quem Somos</a></li>
                @guest
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @endguest
            </ul>

            <div class="header-icons">
                <a href="{{ url('/carrinho') }}" title="Carrinho de Compras">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                @auth
                <div class="user-profile-container">
                    <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('img/default-avatar.png') }}"
                        alt="Usuário" class="user-avatar" id="userAvatar">

                    <div class="user-modal" id="userModal">
                        <div class="user-modal-header">
                            <h3>{{ auth()->user()->name }}</h3>
                            <button id="closeModal" aria-label="Fechar">&times;</button>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ route('perfil') }}">
                                    <i class="fas fa-user"></i> Meu Perfil
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('meus.ingressos') }}">
                                    <i class="fas fa-ticket-alt"></i> Meus Ingressos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('historico') }}">
                                    <i class="fas fa-history"></i> Histórico
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-btn">
                                        <i class="fas fa-sign-out-alt"></i> Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <a href="{{ url('/login') }}" title="Minha Conta">
                    <i class="fas fa-user"></i>
                </a>
                @endauth
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Cinefilms. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- SCRIPTS GLOBAIS -->
    <script>
        // ===== NAVBAR SCROLL EFFECT =====
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // ===== USER MODAL =====
        document.addEventListener('DOMContentLoaded', function() {
            const userAvatar = document.getElementById('userAvatar');
            const userModal = document.getElementById('userModal');
            const closeModal = document.getElementById('closeModal');

            if (userAvatar && userModal) {
                userAvatar.addEventListener('click', () => {
                    userModal.classList.toggle('active');
                });

                closeModal?.addEventListener('click', () => {
                    userModal.classList.remove('active');
                });

                // Fechar ao clicar fora
                window.addEventListener('click', (e) => {
                    if (!userModal.contains(e.target) && e.target !== userAvatar) {
                        userModal.classList.remove('active');
                    }
                });

                // Fechar com ESC
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && userModal.classList.contains('active')) {
                        userModal.classList.remove('active');
                    }
                });
            }
        });

        // ===== INTERSECTION OBSERVER PARA ANIMAÇÕES =====
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            // Observar elementos que precisam de animação
            document.querySelectorAll('.carrossel-container, .quem-somos').forEach(el => {
                observer.observe(el);
            });
        });
    </script>

    @yield('scripts')

</body>
</html>
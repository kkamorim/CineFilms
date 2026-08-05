<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CineFilms - A melhor experiência de cinema. Compre ingressos, veja filmes em cartaz e aproveite nossa bombonière.">
    <meta name="keywords" content="cinema, filmes, ingressos, bombonière, CineFilms">
    <title>@yield('title', 'CineFilms - Cinema')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/cinefilms2.png') }}">

    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS Global -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('head')
</head>

<body>

    <!-- HEADER -->
    <header>
        <nav class="navbar" id="navbar">
            <div class="logo-container">
                <a href="{{ url('/') }}" style="display:flex;align-items:center;gap:10px;">
                    <span class="logo-text">CineFilms</span>
                </a>
            </div>

            <button class="menu-toggle" id="menuToggle" aria-label="Abrir menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="menu">
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Início</a></li>
                <li><a href="{{ route('filme-em-cartaz') }}" class="{{ request()->is('filme-em-cartaz') ? 'active' : '' }}">Em Cartaz</a></li>
                <li><a href="{{ url('/sobre') }}" class="{{ request()->is('sobre') ? 'active' : '' }}">Bombonière</a></li>
                <li><a href="{{ url('/contato') }}" class="{{ request()->is('contato') ? 'active' : '' }}">Contato</a></li>
                <li><a href="{{ url('/quem-somos') }}" class="{{ request()->is('quem-somos') ? 'active' : '' }}">Quem Somos</a></li>
                @guest
                    <li><a href="{{ url('/login') }}" class="{{ request()->is('login') ? 'active' : '' }}">Entrar</a></li>
                @endguest
            </ul>

            <div class="header-icons">
                <a href="{{ url('/carrinho') }}" title="Carrinho de Compras" id="cartIcon">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-badge" id="cartBadge">0</span>
                </a>

                @auth
                <div class="user-profile-container">
                    <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('img/do-utilizador.png') }}"
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
                                    <i class="fas fa-clock-rotate-left"></i> Histórico
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-btn">
                                        <i class="fas fa-arrow-right-from-bracket"></i> Sair
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
            <div class="footer-content">
                <div class="footer-section">
                    <h4>CineFilms</h4>
                    <p>A melhor experiência cinematográfica da região. Tecnologia de ponta, conforto e diversão para toda a família.</p>
                    <div class="social-links">
                        <a href="#" target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" target="_blank" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" target="_blank" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Navegação</h4>
                    <a href="{{ url('/') }}">Início</a>
                    <a href="{{ route('filme-em-cartaz') }}">Em Cartaz</a>
                    <a href="{{ url('/sobre') }}">Bombonière</a>
                    <a href="{{ url('/quem-somos') }}">Quem Somos</a>
                </div>
                <div class="footer-section">
                    <h4>Atendimento</h4>
                    <a href="{{ url('/contato') }}">Fale Conosco</a>
                    <a href="#">Perguntas Frequentes</a>
                    <a href="#">Termos de Uso</a>
                    <a href="#">Política de Privacidade</a>
                </div>
                <div class="footer-section">
                    <h4>Contato</h4>
                    <p><i class="fas fa-envelope"></i> contato@cinefilms.com.br</p>
                    <p><i class="fas fa-phone"></i> (19) 3251-1234</p>
                    <p><i class="fas fa-map-marker-alt"></i> Campinas, SP</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} CineFilms. Todos os direitos reservados.</p>
                
            </div>
        </div>
    </footer>

    <!-- SCRIPTS GLOBAIS -->
    <script>
        // ===== NAVBAR SCROLL EFFECT =====
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 30) {
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

                window.addEventListener('click', (e) => {
                    if (!userModal.contains(e.target) && e.target !== userAvatar) {
                        userModal.classList.remove('active');
                    }
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && userModal.classList.contains('active')) {
                        userModal.classList.remove('active');
                    }
                });
            }

            // ===== HAMBURGER MENU TOGGLE =====
            const menuToggle = document.getElementById('menuToggle');
            const menu = document.querySelector('.menu');

            if (menuToggle && menu) {
                menuToggle.addEventListener('click', function() {
                    this.classList.toggle('active');
                    menu.classList.toggle('active');
                });

                menu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        menuToggle.classList.remove('active');
                        menu.classList.remove('active');
                    });
                });

                document.addEventListener('click', (e) => {
                    if (!menu.contains(e.target) && !menuToggle.contains(e.target)) {
                        menuToggle.classList.remove('active');
                        menu.classList.remove('active');
                    }
                });
            }

            // ===== CART BADGE =====
            updateCartBadge();
        });

        // ===== CART FUNCTIONS (Global) =====
        function getCart() {
            try {
                return JSON.parse(localStorage.getItem('cinefilms_cart')) || [];
            } catch (e) {
                return [];
            }
        }

        function saveCart(cart) {
            localStorage.setItem('cinefilms_cart', JSON.stringify(cart));
            updateCartBadge();
        }

        function addToCart(item) {
            const cart = getCart();
            const existing = cart.findIndex(c =>
                c.id === item.id && c.type === item.type && c.session === item.session && c.category === item.category
            );
            if (existing >= 0) {
                cart[existing].quantity += item.quantity;
            } else {
                cart.push(item);
            }
            saveCart(cart);
            showToast(item.name + ' adicionado ao carrinho!');
        }

        function updateCartBadge() {
            const cart = getCart();
            const total = cart.reduce((sum, item) => sum + item.quantity, 0);
            const badge = document.getElementById('cartBadge');
            if (badge) {
                badge.textContent = total;
                badge.style.display = total > 0 ? 'flex' : 'none';
            }
        }

        function showToast(message) {
            const existing = document.querySelector('.toast-notification');
            if (existing) existing.remove();

            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.innerHTML = `<i class="fas fa-check-circle"></i><span>${message}</span>`;
            document.body.appendChild(toast);

            setTimeout(() => toast.classList.add('show'), 50);
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>

    @yield('scripts')

</body>
</html>
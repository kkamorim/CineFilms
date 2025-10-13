    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Cinefilms')</title>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @yield('head')

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-bdPjeF7O3pckYpFZa5VlE2R9OwMgiGvKQQfnrH/2+2Jh5p+zKpc3rTNN+ItzXn+vZypqVjovT+QmtB5fAoAdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        <header>
            <nav class="navbar">
                <div class="logo-container">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{ asset('img/cinefilms2.png') }}" alt="Cinefilms Logo">
                    </a>
                    <span>CINEFILMS</span>
                </div>

                <ul class="menu">
                    <li><a href="{{ url('/') }}">Início</a></li>
                    <li><a href="{{ route('filme-em-cartaz') }}">Em Cartaz</a></li>
                    <li><a href="{{ url('/bomboniere') }}">Bomboniére</a></li>
                    <li><a href="{{ url('/contato') }}">Contato</a></li>
                    <li><a href="{{ url('/quem-somos') }}">Quem Somos</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                </ul>

                <div class="header-icons">
                    @auth
                    <div class="user-profile-container">
                        <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('img/default-avatar.png') }}"
                            alt="Larissa" class="user-avatar" id="userAvatar">

                        <div class="user-modal" id="userModal">
                            <div class="user-modal-header">
                                Larissa
                            </div>
                            <ul>
                                <li><a href="{{ route('perfil') }}">Meu Perfil</a></li>
                                <li><a href="{{ route('meus.ingressos') }}">Meus Ingressos</a></li>
                                <li><a href="{{ route('historico') }}">Histórico</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="logout-btn">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @else
                    <a href="{{ url('/login') }}" title="Minha Conta">
                        <i class="fas fa-user user-avatar"></i>
                    </a>
                    @endauth
                </div>

            </nav>
        </header>

        <main class="main-content">
            @yield('content')
        </main>

        <footer class="footer">
            <p>&copy; {{ date('Y') }} Cinefilms. Todos os direitos reservados.</p>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const userAvatar = document.getElementById('userAvatar');
                const userModal = document.getElementById('userModal');

                if (userAvatar && userModal) {
                    userAvatar.addEventListener('click', (e) => {
                        e.stopPropagation();
                        userModal.classList.toggle('active');
                    });

                    // Fecha clicando fora
                    window.addEventListener('click', (e) => {
                        if (userModal.classList.contains('active') && !userModal.contains(e.target) && e.target !== userAvatar) {
                            userModal.classList.remove('active');
                        }
                    });
                }
            });
        </script>
        @yield('scripts')
    </body>

    </html>
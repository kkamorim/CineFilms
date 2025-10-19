<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cinefilms - Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('head')
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('img/cinefilms.png') }}" class="logo" alt="Logo">
                <span class="logo-text">CINEFILMS</span>
            </div>

            <nav>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="active">
                            <img class="nav-icon" src="{{ asset('img/casa.png') }}" alt="Início">
                            <span class="nav-text">Início</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.filmes.create') }}">
                            <img class="nav-icon" src="{{ asset('img/mais.png') }}" alt="Adicionar">
                            <span class="nav-text">Adicionar Filme</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.emcartaz') }}">
                            <img class="nav-icon" src="{{ asset('img/poster.png') }}" alt="Cartaz">
                            <span class="nav-text">Em Cartaz</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img class="nav-icon" src="{{ asset('img/perfil.png') }}" alt="Perfil">
                            <span class="nav-text">Perfil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img class="nav-icon" src="{{ asset('img/configuracao.png') }}" alt="Config">
                            <span class="nav-text">Configurações</span>
                        </a>
                    </li>
                    <li>
                        {{-- CORREÇÃO NO LINK: Usar o evento onclick para acionar o formulário POST --}}
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <img class="nav-icon" src="{{ asset('img/porta.png') }}" alt="Sair">
                            <span class="nav-text">Sair</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    {{-- FORMULÁRIO POST OBRIGATÓRIO: Movido para fora da navegação e no final do body --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @yield('scripts')
</body>
</html>

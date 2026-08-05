<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - CineFilms')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS Local -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    @yield('head')
</head>
<body>
    <div class="dashboard-container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <span class="logo-text">CineFilms Admin</span>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.filmes.create') }}" class="{{ request()->routeIs('admin.filmes.create') ? 'active' : '' }}">
                            <i class="fas fa-plus-circle"></i>
                            <span>Adicionar Filme</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.emcartaz') }}" class="{{ request()->routeIs('admin.emcartaz') ? 'active' : '' }}">
                            <i class="fas fa-film"></i>
                            <span>Filmes em Cartaz</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            <span>Ver Site</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sair</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- MAIN DASHBOARD CONTENT -->
        <main class="main-dashboard-content">
            @yield('content')
        </main>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @yield('scripts')
</body>
</html>

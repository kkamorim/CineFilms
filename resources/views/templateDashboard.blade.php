<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cinefilms - Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('head') <!-- Para CSS extra, como cartaz.css -->
</head>
<body>

    <div class="dashboard-container">

        <!-- Sidebar fixa -->
        <aside class="sidebar">

<img src="{{ asset('img/cinefilms2.png') }}" class="logo">
<hr>
<nav>
    <ul>
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <img class="icons" src="{{ asset('img/casa.png') }}" alt="Início">
            </a>
        </li>

        <li>
            <a href="{{ route('admin.filmes.create') }}">
                <img class="icons" src="{{ asset('img/mais.png') }}" alt="Adicionar Filme">
            </a>
        </li>
        <li>
            <a href="{{ route('admin.emcartaz') }}">
                <img class="icons" src="{{ asset('img/poster.png') }}" alt="Filmes em Cartaz">
            </a>
        </li>
        <li>
            <a href="#">
                <img class="icons" src="{{ asset('img/perfil.png') }}" alt="Perfil">
            </a>
        </li>
        <li>
            <a href="#">
                <img class="icons" src="{{ asset('img/configuracao.png') }}" alt="Configurações">
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}">
                <img class="icons" src="{{ asset('img/porta.png') }}" alt="Sair">
            </a>
        </li>
    </ul>
</nav>

</aside>

        <!-- Conteúdo principal -->
        <main class="main-content">
            @yield('content')
        </main>

    </div> <!-- dashboard-container -->

    <!-- Modal global para Cartaz -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <div id="modal-inner"></div>
        </div>
    </div>

    @yield('scripts') <!-- Scripts de cada página -->

    <script>
        // Funções de modal comuns a todas as páginas
        function openModal(content){
            document.getElementById('modal-inner').innerHTML = content;
            document.getElementById('modal').style.display = 'flex';
        }

        function closeModal(){
            document.getElementById('modal').style.display = 'none';
        }

        // Fecha modal ao clicar fora
        window.onclick = function(event){
            const modal = document.getElementById('modal');
            if(event.target == modal){
                closeModal();
            }
        }
    </script>

</body>
</html>

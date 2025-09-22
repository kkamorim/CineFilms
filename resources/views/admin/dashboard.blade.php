@extends('templateDashboard')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <main class="main-content">
        <div class="top-section">
            @if ($filmeDestaque)
            <div class="featured-movie" style="--bg: url('{{ asset('storage/' . $filmeDestaque->imagem) }}');">
                <img class="poster" src="{{ asset('storage/' . $filmeDestaque->imagem) }}" alt="{{ $filmeDestaque->titulo }}">
                <div class="featured-info">
                    <h1>{{ $filmeDestaque->titulo }}</h1>
                    <p>{{ $filmeDestaque->genero }}</p>
                    <p>{{ $filmeDestaque->descricao }}</p>
                    <button>▶ Assistir trailer</button>
                </div>
            </div>
            @endif

            <div class="recent-movies">
                <h2>Recentes</h2>
                <ul>
                    @forelse($filmesRecentes as $filme)
                    <li>
                        <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}">
                        <div>
                            <h3>{{ $filme->titulo }}</h3>
                            <p>{{ $filme->genero }}</p>
                            <p>Classificação: PG-{{ $filme->classificacao }}</p>
                        </div>
                    </li>
                    @empty
                    <p>Nenhum filme recente.</p>
                    @endforelse
                </ul>
            </div>
        </div>

        <h2 class="h2-filmes-section">Populares</h2>
        <section class="filmes-section">
            <div class="filmes-grid">
                <div class="card-filme">
                    <img src="{{ asset('img/Invocacao.jpg') }}">
                </div>
                <h3>Invocação do Mal 4: O Último Ritual</h3>
                <p><b>12 • 2h 29m</b></p>
                <p><b>Gênero</b>: Terror</p>
            </div>

            <div class="filmes-grid">
                <div class="card-filme">
                    <img src="{{ asset('img/quarteto.webp') }}">
                </div>
                <h3>Quarteto Fantástico</h3>
                <p><b>12 • 1 hr 55 min</b></p>
                <p><b>Gênero</b>: Ação / Ficção Científica</p>
            </div>

            <div class="filmes-grid">
                <div class="card-filme">
                    <img src="{{ asset('img/Rei_Feira.jpg') }}" >
                </div>
                <h3>O Rei da Feira</h3>
                <p><b>14 • 1 hr 27 min</b></p>
                <p><b>Gênero</b>: Comédia</p>
            </div>

            <div class="filmes-grid">
                <div class="card-filme">
                    <img src="{{ asset('img/superman.webp') }}">
                </div>
                <h3>Superman</h3>
                <p><b>14 • 2 hr 09 min</b></p>
                <p><b>Gênero</b>: Ação / Ficção Científica</p>
            </div>
        </section>
    </main>
</div>

<h2 class="h2-filmes-section">📊 Estatísticas</h2>

<div style="display: flex; flex-wrap: wrap; gap: 30px; margin-top:20px;">
    <div id="usuariosChart" style="width: 600px; height:400px;"></div>
    <div id="filmesChart" style="width: 600px; height:400px;"></div>
</div>

<div style="display: flex; flex-wrap: wrap; gap: 30px; margin-top:20px;">
    <div id="classificacaoChart" style="width: 600px; height:400px;"></div>
    <div style="width: 600px; height:400px; display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:bold; border:1px solid #ddd; border-radius:10px;">
        Total de Usuários: {{ $totalUsuarios }}
    </div>
</div>

<!-- Importando ECharts -->
<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script>
    // ------- Usuários por mês (linha) -------
    var usuariosMes = @json($usuariosPorMes);
    var usuariosChart = echarts.init(document.getElementById('usuariosChart'));
    var optionUsuarios = {
        title: { text: 'Usuários Cadastrados por Mês' },
        tooltip: {},
        xAxis: {
            type: 'category',
            data: Object.keys(usuariosMes).map(m => 'Mês ' + m)
        },
        yAxis: { type: 'value', name: 'Quantidade' },
        series: [{
            data: Object.values(usuariosMes),
            type: 'line',
            smooth: true,
            color: '#3b82f6'
        }]
    };
    usuariosChart.setOption(optionUsuarios);

    var filmesGenero = @json($filmesPorGenero);
    var filmesChart = echarts.init(document.getElementById('filmesChart'));
    var optionFilmes = {
        title: { text: 'Filmes Cadastrados por Gênero', left: 'center' },
        tooltip: { trigger: 'item' },
        series: [{
            type: 'pie',
            radius: '50%',
            data: Object.entries(filmesGenero).map(([genero, total]) => ({
                name: genero,
                value: total
            }))
        }]
    };
    filmesChart.setOption(optionFilmes);

    var filmesClassificacao = @json($filmesPorClassificacao);
    var classificacaoChart = echarts.init(document.getElementById('classificacaoChart'));
    var optionClassificacao = {
        title: { text: 'Filmes por Classificação Etária' },
        tooltip: {},
        xAxis: {
            type: 'category',
            data: Object.keys(filmesClassificacao).map(c => 'PG-' + c)
        },
        yAxis: { type: 'value', name: 'Quantidade' },
        series: [{
            data: Object.values(filmesClassificacao),
            type: 'bar',
            color: '#10b981'
        }]
    };
    classificacaoChart.setOption(optionClassificacao);
</script>
@endsection
 
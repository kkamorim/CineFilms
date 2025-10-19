@extends('templateDashboard')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-header">
    <h1>Dashboard</h1>
    
    <div class="header-actions">
        <!-- Botões de Exportação -->
        <div class="export-buttons">
            <a href="{{ route('admin.export.csv') }}" class="btn-export btn-csv">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                Exportar CSV
            </a>
            
            <a href="{{ route('admin.export.pdf') }}" class="btn-export btn-pdf">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Exportar PDF
            </a>
        </div>

        <!-- Info do Usuário -->
        <div class="user-info">
            <div class="user-avatar"></div>
            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>
    </div>
</div>

<!-- ESTATÍSTICAS -->
<div class="stats-grid">
    <div class="stat-card">
        <h3>Total de Filmes</h3>
        <div class="value">{{ $totalUsuarios }}</div>
    </div>
    <div class="stat-card">
        <h3>Usuários Cadastrados</h3>
        <div class="value">{{ $totalUsuarios }}</div>
    </div>
    <div class="stat-card">
        <h3>Filmes Recentes</h3>
        <div class="value">{{ $filmesRecentes->count() }}</div>
    </div>
    <div class="stat-card">
        <h3>Avaliação Média</h3>
        <div class="value">4.5 ⭐</div>
    </div>
</div>

<!-- SEÇÃO DESTAQUE E RECENTES -->
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

<!-- FILMES POPULARES -->
<h2 class="section-title">🔥 Populares</h2>
<div class="movies-grid">
    <div class="movie-card">
        <img class="movie-poster" src="{{ asset('img/Invocacao.jpg') }}" alt="Invocação do Mal 4">
        <div class="movie-info">
            <div class="movie-title">Invocação do Mal 4</div>
            <div class="movie-meta">Terror • PG-12</div>
        </div>
    </div>
    
    <div class="movie-card">
        <img class="movie-poster" src="{{ asset('img/quarteto.webp') }}" alt="Quarteto Fantástico">
        <div class="movie-info">
            <div class="movie-title">Quarteto Fantástico</div>
            <div class="movie-meta">Ação • PG-12</div>
            
        </div>
    </div>
    
    <div class="movie-card">
        <img class="movie-poster" src="{{ asset('img/Rei_Feira.jpg') }}" alt="O Rei da Feira">
        <div class="movie-info">
            <div class="movie-title">O Rei da Feira</div>
            <div class="movie-meta">Comédia • PG-14</div>
        </div>
    </div>
    
    <div class="movie-card">
        <img class="movie-poster" src="{{ asset('img/superman.webp') }}" alt="Superman">
        <div class="movie-info">
            <div class="movie-title">Superman</div>
            <div class="movie-meta">Ação • PG-14</div>
        </div>
    </div>
</div>

<!-- GRÁFICOS -->
<h2 class="section-title">📊 Estatísticas</h2>
<div class="charts-container">
    <div class="chart-card">
        <h3>Usuários Cadastrados por Mês</h3>
        <div id="usuariosChart" style="height: 300px;"></div>
    </div>
    <div class="chart-card">
        <h3>Filmes por Gênero</h3>
        <div id="filmesChart" style="height: 300px;"></div>
    </div>
</div>

<div class="charts-container">
    <div class="chart-card">
        <h3>Filmes por Classificação Etária</h3>
        <div id="classificacaoChart" style="height: 300px;"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script>
    // Converte os dados PHP para JSON e armazena em variáveis JS
    const usuariosPorMesData = @json($usuariosPorMes);
    const filmesPorGeneroData = @json($filmesPorGenero);
    const classificacaoData = @json($filmesPorClassificacao);

    // Mapeamento de números de mês para nomes em Português
    const monthNames = {
        1: 'Jan', 2: 'Fev', 3: 'Mar', 4: 'Abr', 5: 'Mai', 6: 'Jun', 
        7: 'Jul', 8: 'Ago', 9: 'Set', 10: 'Out', 11: 'Nov', 12: 'Dez'
    };

    // --- GRÁFICO 1: USUÁRIOS POR MÊS (Gráfico de Barras) ---
    function renderUsuariosChart() {
        const chartDom = document.getElementById('usuariosChart');
        if (!chartDom) return;
        
        const myChart = echarts.init(chartDom);
        
        // Formata os dados: chaves (meses) e valores (totais)
        const meses = Object.keys(usuariosPorMesData).map(key => monthNames[key] || key);
        const totais = Object.values(usuariosPorMesData);

        const option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: { type: 'shadow' }
            },
            xAxis: {
                type: 'category',
                data: meses
            },
            yAxis: {
                type: 'value',
                name: 'Qtd. Usuários'
            },
            series: [{
                name: 'Novos Usuários',
                type: 'bar',
                data: totais,
                itemStyle: {
                    color: '#0f2a66' // Cor principal
                }
            }]
        };

        myChart.setOption(option);
        window.addEventListener('resize', myChart.resize);
    }

    // --- GRÁFICO 2: FILMES POR GÊNERO (Gráfico de Pizza) ---
    function renderFilmesChart() {
        const chartDom = document.getElementById('filmesChart');
        if (!chartDom) return;
        
        const myChart = echarts.init(chartDom);

        // Formata os dados para o formato [ {value: 10, name: 'Ação'}, ... ]
        const data = Object.keys(filmesPorGeneroData).map(key => ({
            value: filmesPorGeneroData[key],
            name: key
        }));

        const option = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: data.map(item => item.name)
            },
            series: [
                {
                    name: 'Total de Filmes',
                    type: 'pie',
                    radius: '60%',
                    center: ['60%', '50%'],
                    data: data,
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };

        myChart.setOption(option);
        window.addEventListener('resize', myChart.resize);
    }

    // --- GRÁFICO 3: CLASSIFICAÇÃO ETÁRIA (Gráfico de Barras) ---
    function renderClassificacaoChart() {
        const chartDom = document.getElementById('classificacaoChart');
        if (!chartDom) return;
        
        const myChart = echarts.init(chartDom);

        // Formata os dados: chaves (classificações) e valores (totais)
        const classificacoes = Object.keys(classificacaoData).map(key => 'PG-' + key);
        const totais = Object.values(classificacaoData);

        const option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: { type: 'shadow' }
            },
            xAxis: {
                type: 'category',
                data: classificacoes,
                axisLabel: {
                    interval: 0,
                    rotate: 30 // Rotaciona rótulos se houver muitos
                }
            },
            yAxis: {
                type: 'value',
                name: 'Qtd. Filmes'
            },
            series: [{
                name: 'Total de Filmes',
                type: 'bar',
                data: totais,
                itemStyle: {
                    color: '#1a3d7a' // Cor secundária
                }
            }]
        };

        myChart.setOption(option);
        window.addEventListener('resize', myChart.resize);
    }

    // Inicializa todos os gráficos após o carregamento da biblioteca e dos dados
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof echarts !== 'undefined') {
            renderUsuariosChart();
            renderFilmesChart();
            renderClassificacaoChart();
        }
    });

</script>
@endsection

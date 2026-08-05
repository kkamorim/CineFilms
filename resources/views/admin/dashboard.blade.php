@extends('templateDashboard')

@section('title', 'Dashboard - Admin CineFilms')

@section('content')

<div class="dashboard-topbar">
    <div>
        <h1 class="dashboard-title">Dashboard Painel Admin</h1>
        <p style="color:var(--gray-500); font-size:0.9rem;">Visão geral de métricas, usuários e cadastro de filmes.</p>
    </div>

    <div style="display:flex; gap:12px;">
        <a href="{{ route('admin.export.csv') }}" class="btn-export btn-csv">
            <i class="fas fa-file-csv"></i> Exportar CSV
        </a>
        <a href="{{ route('admin.export.pdf') }}" class="btn-export btn-pdf">
            <i class="fas fa-file-pdf"></i> Exportar PDF
        </a>
    </div>
</div>

<!-- STATS CARDS -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-info">
            <h4>Total de Filmes</h4>
            <div class="value">{{ $totalFilmes ?? 0 }}</div>
        </div>
        <div class="stat-icon"><i class="fas fa-film"></i></div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <h4>Usuários Cadastrados</h4>
            <div class="value">{{ $totalUsuarios ?? 0 }}</div>
        </div>
        <div class="stat-icon"><i class="fas fa-users"></i></div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <h4>Filmes Recentes</h4>
            <div class="value">{{ count($filmesRecentes ?? []) }}</div>
        </div>
        <div class="stat-icon"><i class="fas fa-clock"></i></div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <h4>Avaliação Média</h4>
            <div class="value">4.8 ★</div>
        </div>
        <div class="stat-icon"><i class="fas fa-star"></i></div>
    </div>
</div>

<!-- CHARTS -->
<div class="charts-grid">
    <div class="chart-card">
        <h3>Usuários Cadastrados por Mês</h3>
        <div id="usuariosChart" style="height: 300px;"></div>
    </div>
    <div class="chart-card">
        <h3>Filmes por Gênero</h3>
        <div id="filmesChart" style="height: 300px;"></div>
    </div>
</div>

<div class="chart-card" style="margin-bottom:36px;">
    <h3>Distribuição por Classificação Etária</h3>
    <div id="classificacaoChart" style="height: 280px;"></div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script>
    const usuariosPorMesData = @json($usuariosPorMes ?? []);
    const filmesPorGeneroData = @json($filmesPorGenero ?? []);
    const classificacaoData = @json($filmesPorClassificacao ?? []);

    const monthNames = {
        1: 'Jan', 2: 'Fev', 3: 'Mar', 4: 'Abr', 5: 'Mai', 6: 'Jun', 
        7: 'Jul', 8: 'Ago', 9: 'Set', 10: 'Out', 11: 'Nov', 12: 'Dez'
    };

    function renderUsuariosChart() {
        const chartDom = document.getElementById('usuariosChart');
        if (!chartDom) return;
        const myChart = echarts.init(chartDom);
        
        const meses = Object.keys(usuariosPorMesData).map(key => monthNames[key] || key);
        const totais = Object.values(usuariosPorMesData);

        myChart.setOption({
            tooltip: { trigger: 'axis' },
            xAxis: { type: 'category', data: meses },
            yAxis: { type: 'value' },
            series: [{
                name: 'Novos Usuários',
                type: 'bar',
                data: totais,
                itemStyle: { color: '#3B82F6', borderRadius: [4, 4, 0, 0] }
            }]
        });
        window.addEventListener('resize', myChart.resize);
    }

    function renderFilmesChart() {
        const chartDom = document.getElementById('filmesChart');
        if (!chartDom) return;
        const myChart = echarts.init(chartDom);

        const data = Object.keys(filmesPorGeneroData).map(key => ({
            value: filmesPorGeneroData[key],
            name: key
        }));

        myChart.setOption({
            tooltip: { trigger: 'item' },
            legend: { orient: 'vertical', left: 'left' },
            series: [{
                name: 'Total de Filmes',
                type: 'pie',
                radius: '65%',
                data: data
            }]
        });
        window.addEventListener('resize', myChart.resize);
    }

    function renderClassificacaoChart() {
        const chartDom = document.getElementById('classificacaoChart');
        if (!chartDom) return;
        const myChart = echarts.init(chartDom);

        const classificacoes = Object.keys(classificacaoData).map(key => 'PG-' + key);
        const totais = Object.values(classificacaoData);

        myChart.setOption({
            tooltip: { trigger: 'axis' },
            xAxis: { type: 'category', data: classificacoes },
            yAxis: { type: 'value' },
            series: [{
                name: 'Quantidade',
                type: 'bar',
                data: totais,
                itemStyle: { color: '#0D1B3E', borderRadius: [4, 4, 0, 0] }
            }]
        });
        window.addEventListener('resize', myChart.resize);
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (typeof echarts !== 'undefined') {
            renderUsuariosChart();
            renderFilmesChart();
            renderClassificacaoChart();
        }
    });
</script>
@endsection

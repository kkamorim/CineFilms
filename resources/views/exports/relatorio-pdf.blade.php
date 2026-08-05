<head>
    <meta charset="UTF-8">
    <title>Relatório Cinefilms</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.6;
        }

        /* Estilo .header removido */

        .container {
            padding: 0 30px;
            padding-top: 30px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            color: #0f2a66;
            font-weight: bold;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 3px solid #0f2a66;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table thead {
            background: #0f2a66;
            color: white;
        }

        table th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }

        table td {
            padding: 10px 12px;
            border-bottom: 1px solid #e0e0e0;
        }

        table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #666;
        }

        .logo-area {
            padding: 0 30px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="logo-area">
        @if(file_exists(public_path('img/cinefilms.png')))
            <img src="{{ public_path('img/cinefilms.png') }}" alt="Logo Cinefilms" style="width: 100px; display: block;">
        @endif
    </div>

    <div class="container">

        <div class="section">
            <h2 class="section-title">Estatísticas Gerais</h2>
            <p><strong>Total de Filmes:</strong> {{ $totalFilmes }}</p>
            <p><strong>Total de Usuários:</strong> {{ $totalUsuarios }}</p>
        </div>

        <div class="section">
            <h2 class="section-title">Filmes por Gênero</h2>
            <table>
                <thead>
                    <tr>
                        <th>Gênero</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filmesPorGenero as $item)
                    <tr>
                        <td>{{ $item->genero }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2 class="section-title">Lista de Filmes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Gênero</th>
                        <th>Classificação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filmes as $filme)
                    <tr>
                        <td>{{ $filme->titulo }}</td>
                        <td>{{ $filme->genero }}</td>
                        <td>PG-{{ $filme->classificacao }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} Cinefilms - Relatório gerado em {{ $dataRelatorio }}</p>
    </div>
</body>

</html>
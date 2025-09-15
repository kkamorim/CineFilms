@extends('templateDashboard')

@section('title', 'Filmes Em Cartaz')

@section('head')
<link rel="stylesheet" href="{{ asset('css/emcartaz.css') }}">
@endsection

@section('content')
<div class="emcartaz-container">
    <h2>Filmes Em Cartaz</h2>
    <p>Aqui você pode visualizar os filmes que estão em destaque no site principal.</p>

    <div class="filmes-grid">
        @forelse($filmes as $filme)
            <div class="card-filme">
                <img src="{{ $filme->imagem ? asset('storage/' . $filme->imagem) : 'https://via.placeholder.com/300x450?text=Sem+Imagem' }}" alt="{{ $filme->titulo }}">
                
                <div class="conteudo-do-cartao">
                    <h3>{{ $filme->titulo }}</h3>
                    <p><strong>Gênero:</strong> {{ $filme->genero }}</p>
                    <p><strong>Classificação:</strong> PG-{{ $filme->classificacao }}</p>
                    <p><strong>Sala:</strong> {{ $filme->sala }}</p>
                    <p><strong>Horário:</strong> {{ \Carbon\Carbon::parse($filme->horario)->format('H:i') }}</p>
                    <p><strong>Descrição:</strong> {{ $filme->descricao }}</p>

                    <div class="acoes-filme">
                        <a href="{{ route('admin.filmes.edit', $filme->id) }}" class="btn btn-primary">✏️Editar</a>

                        <form action="{{ route('admin.filmes.destroy', $filme->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">🗑️Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="sem-filmes">Nenhum filme em cartaz foi encontrado.</p>
        @endforelse
    </div>
</div>
@endsection

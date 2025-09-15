@extends('templateDashboard')

@section('title', 'Editar Filme')

@section('head')
<link rel="stylesheet" href="{{ asset('css/editarFilmes.css') }}">
@endsection

@section('content')
    <h2 class="h2-tittle">✏ Editar Filme: {{ $filme->titulo }}</h2>

    <form action="{{ route('admin.filmes.update', $filme) }}" class="box-form" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="box-content">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="{{ $filme->titulo }}" required>
        </div>
        <div class="box-content">
            <label for="genero">Gênero:</label>
            <input type="text" name="genero" value="{{ $filme->genero }}" required>
        </div>
        <div class="box-content">
            <label for="imagem">Imagem Atual:</label>
            @if($filme->imagem)
                <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}" style="width: 100px;">
            @endif
            <p>Nova Imagem:</p>
            <input type="file" name="imagem" accept="image/*">
        </div>
        <div class="box-content">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao">{{ $filme->descricao }}</textarea>
        </div>
        <div class="box-content">
            <label for="classificacao">Classificação:</label>
            <input type="number" name="classificacao" value="{{ $filme->classificacao }}" required>
        </div>

        <div class="form-button">
            <button type="submit">↻Atualizar Filme</button>
            <a href="{{ route('admin.filmes.index') }}">⬅ Voltar para a lista</a>
        </div>
    </form>
@endsection
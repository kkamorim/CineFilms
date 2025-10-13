@extends('templateDashboard')

@section('title', 'Adicionar Filme')

@section('head')
<link rel="stylesheet" href="{{ asset('css/cadastrarFilmes.css') }}">
@endsection

@section('content')
    <div class="form-wrapper">
        <h2 class="form-title">Adicionar Novo Filme</h2>

        <form action="{{ route('admin.filmes.store') }}" class="movie-form" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="logo-container">
                <img src="{{ asset('img/cinefilms.png') }}" class="form-logo" alt="Cinefilms Logo">
            </div>

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                @error('titulo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero" value="{{ old('genero') }}" required>
                @error('genero')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="classificacao">Classificação:</label>
                <input type="number" id="classificacao" name="classificacao" value="{{ old('classificacao') }}" required>
                @error('classificacao')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sala">Sala:</label>
                <input type="text" id="sala" name="sala" value="{{ old('sala') }}" required>
                @error('sala')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="horario">Horário:</label>
                <input type="time" id="horario" name="horario" value="{{ old('horario') }}" required>
                @error('horario')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group"> 
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">
                @error('imagem')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">✅ Salvar Filme</button>
                <a href="{{ route('admin.filmes.index') }}" class="btn-secondary">⬅ Voltar para a lista</a>
            </div>
        </form>
    </div>
@endsection
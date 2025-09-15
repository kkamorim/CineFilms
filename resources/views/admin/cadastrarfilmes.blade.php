@extends('templateDashboard')

@section('title', 'Adicionar Filme')

@section('head')
<link rel="stylesheet" href="{{ asset('css/cadastrarFilmes.css') }}">
@endsection

@section('content')
    <h2 class="h2-tittle">➕ Adicionar Novo Filme</h2>

    <form action="{{ route('admin.filmes.store') }}" class="box-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-content">
        <img src="{{ asset('img/cinefilms2.png') }}" class="logo">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="{{ old('titulo') }}" required>
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="box-content">
            <label for="genero">Gênero:</label>
            <input type="text" name="genero" value="{{ old('genero') }}" required>
            @error('genero')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="box-content">
            <label for="classificacao">Classificação:</label>
            <input type="number" name="classificacao" value="{{ old('classificacao') }}" required>
            @error('classificacao')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="box-content">
            <label for="sala">Sala:</label>
            <input type="text" name="sala" value="{{ old('sala') }}" required>
            @error('sala')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="box-content">
            <label for="horario">Horário:</label>
            <input type="time" name="horario" value="{{ old('horario') }}" required>
            @error('horario')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="box-content"> 
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" accept="image/*">
            @error('imagem')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="box-content">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao">{{ old('descricao') }}</textarea>
            @error('descricao')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-button">
            <button type="submit">✅ Salvar Filme</button>
            <a href="{{ route('admin.filmes.index') }}">⬅ Voltar para a lista</a>
        </div>
    </form>

   
@endsection

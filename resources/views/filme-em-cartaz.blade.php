@extends('template')

@section('title', 'Filmes em Cartaz')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/filmes.css') }}">
@endsection

@section('content')
    <section class="hero-section">
        <img src="{{ asset('img/sala.jpg') }}" class="hero-image" alt="Sala de cinema">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2>Cinefilms!</h2>
            <p>A melhor experiência de cinema.</p>
        </div>
    </section>

    <div class="week-selector-container">
        <h2>Programação</h2>
        <div class="week-selector">
            <div class="day selected" data-dia="dom">DOM.<br>3</div>
            <div class="day" data-dia="seg">SEG.<br>4</div>
            <div class="day" data-dia="ter">TER.<br>5</div>
            <div class="day" data-dia="qua">QUA.<br>6</div>
            <div class="day" data-dia="qui">QUI.<br>7</div>
            <div class="day" data-dia="sex">SEX.<br>8</div>
            <div class="day" data-dia="sab">SÁB.<br>9</div>
            <div class="mes" type="date">MÊS<br>📅</div>
        </div>
    </div>

    <div class="filmes-lista-container">
        @forelse($filmes as $filme)
        <div class="filme">
            <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}">
            <div class="filme-desc">
                <h3>{{ $filme->titulo }}</h3>
                <p><b>Classificação:</b> {{ $filme->classificacao }}</p>
                <p><b>Gênero:</b> {{ $filme->genero }}</p>
                <p class="sinopse"><b>Sinopse:</b> {{ $filme->descricao }}</p>
                <button>Comprar Ingresso</button>
            </div>
        </div>
        @empty
            <p class="sem-filmes">Nenhum filme cadastrado para exibição.</p>
        @endforelse
    </div>
@endsection
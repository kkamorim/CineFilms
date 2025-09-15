@extends('template')

@section('title', 'Histórico de Filmes')

@section('content')
<h1>Histórico de Filmes Assistidos</h1>

@if($history->isEmpty())
    <p>Você ainda não assistiu nenhum filme.</p>
@else
    <ul>
        @foreach($history as $h)
            <li>{{ $h->movie_name }} - {{ $h->watched_at }}</li>
        @endforeach
    </ul>
@endif
@endsection

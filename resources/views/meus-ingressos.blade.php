@extends('template')

@section('title', 'Meus Ingressos')

@section('content')
<h1>Meus Ingressos</h1>

@if($tickets->isEmpty())
    <p>Você ainda não comprou ingressos.</p>
@else
    <ul>
        @foreach($tickets as $ticket)
            <li>{{ $ticket->movie_name }} - {{ $ticket->session_time }}</li>
        @endforeach
    </ul>
@endif
@endsection

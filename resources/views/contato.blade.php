@extends('template')

@section('title', 'Contato')

@section('head')
<link rel="stylesheet" href="{{ asset('css/contato.css') }}">
@endsection

@section('content')
    <h1>Contato</h1>

    

    <form action="/contato" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Seu nome" required><br>
        <input type="email" name="email" placeholder="Seu email" required><br>
        <textarea name="mensagem" placeholder="Sua mensagem" required></textarea><br>
        <button type="submit">Enviar</button>
        @if(session('success'))
         <p class="mensagem-sucesso">{{ session('success') }}</p>
        @endif
    </form>
@endsection

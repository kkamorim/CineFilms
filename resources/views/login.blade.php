@extends('template')

@section('title', 'Login')

@section('head')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="main-content">
    <h1>Login Usuário</h1>

   @if ($errors->any())
        <div class="mensagem-sucesso">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Campo E-mail -->
        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <!-- Campo Senha -->
        <input type="password" name="password" placeholder="Senha" required>
        @error('password')
            <p>{{ $message }}</p>
        @enderror

        <!-- Botão -->
        <button type="submit">Entrar</button>
    </form>

    <!-- Link para cadastro -->
    <div class="link-cadastro">
        <p>Ainda não tem conta? <a href="{{ route('register') }}">Cadastre-se aqui</a></p>
    </div>
</div>
@endsection

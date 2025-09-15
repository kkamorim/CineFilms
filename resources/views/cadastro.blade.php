@extends('template')

@section('title', 'Cadastro')

@section('head')
<link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
@endsection

@section('content')
<div class="main-content">
    <h1>Cadastro Usuário</h1>

    @if(session('success'))
        <div class="mensagem-sucesso">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Campo Nome -->
        <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}" required>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <!-- Campo Email -->
        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <!-- Campo Senha -->
        <input type="password" name="password" placeholder="Senha" required>
        @error('password')
            <p>{{ $message }}</p>
        @enderror

        <!-- Campo Confirmação de Senha -->
        <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required>

        <!-- Campo Foto -->
        <input type="file" name="photo" id="profile_image" accept="image/*">
        <label for="profile_image">Escolher Foto</label>
        <span id="file-name"></span>
        @error('photo')
            <p>{{ $message }}</p>
        @enderror

        <!-- Botão -->
        <button type="submit">Cadastrar</button>
    </form>

    <!-- Link para login -->
    <div class="link-login">
        <p>Já tem conta? <a href="{{ route('login') }}">Faça login</a></p>
    </div>
</div>

<script>
    const fileInput = document.getElementById('profile_image');
    const fileNameSpan = document.getElementById('file-name');

    fileInput.addEventListener('change', function(){
        if(this.files && this.files.length > 0){
            fileNameSpan.textContent = this.files[0].name;
            fileNameSpan.style.display = 'inline-block';
            fileNameSpan.style.marginLeft = '10px';
            fileNameSpan.style.fontSize = '14px';
            fileNameSpan.style.color = '#002366';
        }
    });
</script>
@endsection

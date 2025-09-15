@extends('template')

@section('title', 'Cadastro')

@section('content')
<div class="auth-page-container">
    <div class="auth-form-box">
        <h1 class="auth-title">Cadastre-se</h1>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                @error('name') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <p class="error-message">{{ $message }}</p> @enderror
            </div>

        <div class="form-group">
    <input id="profile_image" type="file" name="profile_image" accept="image/*">
    <label for="profile_image">Escolher Foto de Perfil</label>
    @error('profile_image') <p class="error-message">{{ $message }}</p> @enderror
</div>



            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required>
                @error('password') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="auth-button">Cadastrar</button>

            <p class="auth-link">
                Já tem login? - <a href="{{ route('login') }}">Acesse</a>
            </p>
        </form>
    </div>
</div>
@endsection

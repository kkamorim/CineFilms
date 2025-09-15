@extends('template')

@section('content')
<div class="main-content">
    <h1>Login GM/Admin</h1>

    @if(session('success'))
        <div class="mensagem-sucesso">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
        @error('email')
            <p style="color:red;">{{ $message }}</p>
        @enderror

        <input type="password" name="password" placeholder="Senha" required>
        @error('password')
            <p style="color:red;">{{ $message }}</p>
        @enderror

        <button type="submit">Entrar</button>
    </form>
</div>
@endsection

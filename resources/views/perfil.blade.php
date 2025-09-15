@extends('template')

@section('title', 'Meu Perfil')

@section('content')
<h1>Meu Perfil</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('perfil.atualizar') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <img src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : asset('img/default-avatar.png') }}" width="150" alt="Foto">
    </div>

    <div>
        <label>Nome:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
    </div>

    <div>
        <label>Foto de Perfil:</label>
        <input type="file" name="profile_image">
    </div>

    <div>
        <label>Senha:</label>
        <input type="password" name="password">
    </div>

    <div>
        <label>Confirmar Senha:</label>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit">Atualizar Perfil</button>
</form>

<hr>
<a href="{{ route('meus.ingressos') }}">Meus Ingressos</a> |
<a href="{{ route('historico') }}">Histórico</a>
@endsection

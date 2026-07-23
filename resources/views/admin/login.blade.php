@extends('template')

@section('title', 'Painel Administrativo - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="auth-page" style="background:var(--primary);">
    <div class="auth-card" style="border-top: 4px solid var(--primary-light);">
        <div class="auth-header">
            <div class="auth-logo-icon" style="background:var(--primary); color:var(--white);">
                <i class="fas fa-user-shield"></i>
            </div>
            <h1 class="auth-title">Painel Administrativo</h1>
            <p class="auth-subtitle">Acesso restrito a gerentes e administradores CineFilms.</p>
        </div>

        @if ($errors->any())
            <div style="background:#FEE2E2; color:#991B1B; padding:12px 16px; border-radius:8px; font-size:0.85rem; margin-bottom:20px;">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div style="background:#D1FAE5; color:#065F46; padding:12px 16px; border-radius:8px; font-size:0.85rem; margin-bottom:20px;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">E-mail Administrativo</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input" 
                    placeholder="admin@cinefilms.com" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <div class="password-field-wrapper">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input" 
                        placeholder="••••••••" 
                        required
                    >
                    <button type="button" class="toggle-password-btn" onclick="toggleAdminPassword()" title="Mostrar/Ocultar Senha">
                        <i class="fas fa-eye" id="adminEyeIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-auth-submit" style="background:var(--primary); margin-top:8px;">
                <i class="fas fa-sign-in-alt"></i> Entrar no Painel
            </button>
        </form>
    </div>
</div>

@section('scripts')
<script>
function toggleAdminPassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('adminEyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endsection

@endsection

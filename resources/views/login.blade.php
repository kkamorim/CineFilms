@extends('template')

@section('title', 'Entrar - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-logo-icon">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <h1 class="auth-title">Acesse sua conta</h1>
            <p class="auth-subtitle">Entre para gerenciar seus ingressos e preferências.</p>
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

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">E-mail</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input @error('email') form-input-error @enderror" 
                    placeholder="seu@email.com" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                >
                @error('email')
                    <span class="form-error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <div class="password-field-wrapper">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input @error('password') form-input-error @enderror" 
                        placeholder="••••••••" 
                        required
                    >
                    <button type="button" class="toggle-password-btn" onclick="togglePasswordVisibility('password', 'eyeIcon')" title="Mostrar/Ocultar Senha">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <span class="form-error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row-between">
                <label class="form-checkbox">
                    <input type="checkbox" name="remember">
                    <span>Lembrar de mim</span>
                </label>
                <a href="#" class="auth-link">Esqueceu a senha?</a>
            </div>

            <button type="submit" class="btn-auth-submit">
                Entrar
            </button>
        </form>

        <div style="margin-top:20px; padding:12px; background:var(--gray-100); border-radius:var(--radius-md); font-size:0.78rem; color:var(--gray-600);">
            <strong><i class="fas fa-users-cog"></i> Acesso rápido Personas (Senha: 12345678):</strong><br>
            • <strong>Admin:</strong> admin@cinefilms.com<br>
            • <strong>Coordenador:</strong> coordenador@cinefilms.com<br>
            • <strong>Usuário:</strong> user@cinefilms.com
        </div>

        <div class="auth-footer">
            Ainda não tem uma conta? <a href="{{ route('register') }}" class="auth-link">Cadastre-se grátis</a>
        </div>
    </div>
</div>

@section('scripts')
<script>
function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
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
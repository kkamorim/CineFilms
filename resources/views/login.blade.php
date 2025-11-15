@extends('template')

@section('title', 'Login - Cinefilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<!-- HERO LOGIN -->
<section class="login-hero">
    <div class="login-background">
        <div class="bg-overlay"></div>
        <div class="floating-elements">
            <div class="float-item"></div>
            <div class="float-item"></div>
            <div class="float-item"></div>
        </div>
    </div>

    <div class="login-container">
        <div class="login-wrapper">
            <!-- LADO ESQUERDO - INFORMAÇÕES -->
            <div class="login-info">
                <div class="info-content">
                    <div class="brand-section">
                        <i class="fas fa-film brand-icon"></i>
                        <h2 class="brand-title">Bem-vindo de volta!</h2>
                    </div>
                    <p class="brand-description">
                        Entre na sua conta e continue sua jornada cinematográfica. 
                        Acesse seus ingressos, favoritos e muito mais.
                    </p>
                    
                    <div class="benefits-list">
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Acesso a promoções exclusivas</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Histórico de compras e ingressos</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Notificações de lançamentos</span>
                        </div>
                    </div>

                    <div class="social-proof">
                        <div class="users-avatars">
                            <div class="avatar"></div>
                            <div class="avatar"></div>
                            <div class="avatar"></div>
                        </div>
                        <p>Junte-se a <strong>+5.000</strong> cinéfilos</p>
                    </div>
                </div>
            </div>

            <!-- LADO DIREITO - FORMULÁRIO -->
            <div class="login-form-section">
                <div class="form-header">
                    <h1 class="form-title">Entrar na conta</h1>
                    <p class="form-subtitle">Preencha seus dados para continuar</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-error" id="errorAlert">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ $errors->first() }}</span>
                        <button class="alert-close" onclick="closeAlert('errorAlert')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" id="successAlert">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                        <button class="alert-close" onclick="closeAlert('successAlert')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="login-form" id="loginForm">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i>
                            E-mail
                        </label>
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            class="form-input" 
                            placeholder="seu@email.com"
                            value="{{ old('email') }}" 
                            required
                        >
                        @error('email')
                            <span class="error-message">
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i>
                            Senha
                        </label>
                        <div class="password-wrapper">
                            <input 
                                type="password" 
                                id="password"
                                name="password" 
                                class="form-input" 
                                placeholder="••••••••"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePassword()">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="error-message">
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember">
                            <span class="checkbox-custom"></span>
                            <span>Lembrar de mim</span>
                        </label>
                        <a href="#" class="forgot-link">Esqueceu a senha?</a>
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span class="btn-text">Entrar</span>
                        <i class="fas fa-arrow-right btn-icon"></i>
                        <div class="btn-loader"></div>
                    </button>
                </form>
                
                <div class="signup-link">
                    <p>Ainda não tem uma conta? 
                        <a href="{{ route('register') }}">Cadastre-se gratuitamente</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODAL DE SUCESSO -->
<div class="modal-overlay" id="successModal">
    <div class="modal-content success">
        <div class="modal-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3 class="modal-title">Login realizado com sucesso!</h3>
        <p class="modal-text">Redirecionando para sua conta...</p>
        <div class="modal-loader">
            <div class="loader-bar"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== TOGGLE PASSWORD =====
    window.togglePassword = function() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    };

    // ===== CLOSE ALERT =====
    window.closeAlert = function(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }
    };

    // ===== AUTO CLOSE ALERTS =====
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            if (alert) closeAlert(alert.id);
        });
    }, 5000);

    // ===== FORM VALIDATION =====
    const form = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form?.addEventListener('submit', function(e) {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        // Se houver erros, o Laravel recarrega a página
        // então não precisamos remover o loading aqui
    });

    // ===== INPUT FOCUS EFFECT =====
    const inputs = document.querySelectorAll('.form-input');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });

    // ===== FLOATING ANIMATION =====
    const floatItems = document.querySelectorAll('.float-item');
    
    floatItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 2}s`;
    });
});
</script>
@endsection
@extends('template')

@section('title', 'Cadastro - Cinefilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
@endsection

@section('content')

<!-- HERO CADASTRO -->
<section class="register-hero">
    <div class="register-background">
        <div class="bg-overlay"></div>
        <div class="floating-elements">
            <div class="float-item"></div>
            <div class="float-item"></div>
            <div class="float-item"></div>
        </div>
    </div>

    <div class="register-container">
        <div class="register-wrapper">
            <!-- LADO ESQUERDO - INFORMAÇÕES -->
            <div class="register-info">
                <div class="info-content">
                    <div class="brand-section">
                        <i class="fas fa-ticket-alt brand-icon"></i>
                        <h2 class="brand-title">Junte-se a nós!</h2>
                    </div>
                    <p class="brand-description">
                        Crie sua conta gratuitamente e tenha acesso a um mundo de 
                        entretenimento cinematográfico.
                    </p>
                    
                    <div class="benefits-list">
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Compra rápida de ingressos</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Descontos exclusivos para membros</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Acesso antecipado a lançamentos</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Notificações personalizadas</span>
                        </div>
                    </div>

                    <div class="stats-section">
                        <div class="stat-item">
                            <div class="stat-number">+5.000</div>
                            <div class="stat-label">Usuários ativos</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">+10k</div>
                            <div class="stat-label">Ingressos vendidos</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LADO DIREITO - FORMULÁRIO -->
            <div class="register-form-section">
                <div class="form-header">
                    <h1 class="form-title">Criar conta</h1>
                    <p class="form-subtitle">Preencha os dados para começar</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success" id="successAlert">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                        <button class="alert-close" onclick="closeAlert('successAlert')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="register-form" id="registerForm" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Foto de Perfil -->
                    <div class="photo-upload-section">
                        <div class="photo-preview" id="photoPreview">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="photo-upload-content">
                            <label for="photo" class="photo-upload-label">
                                <i class="fas fa-camera"></i>
                                <span id="photoLabel">Escolher foto de perfil</span>
                            </label>
                            <input 
                                type="file" 
                                id="photo" 
                                name="photo" 
                                accept="image/*"
                                style="display: none;"
                            >
                            <p class="photo-hint">JPG, PNG ou GIF - Máx. 2MB</p>
                            @error('photo')
                                <span class="error-message">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Nome -->
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i>
                            Nome completo
                        </label>
                        <input 
                            type="text" 
                            id="name"
                            name="name" 
                            class="form-input" 
                            placeholder="Digite seu nome completo"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <span class="error-message">
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Email -->
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

                    <!-- Senha -->
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
                                placeholder="Mínimo 8 caracteres"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePassword('password', 'eyeIcon1')">
                                <i class="fas fa-eye" id="eyeIcon1"></i>
                            </button>
                        </div>
                        <div class="password-strength" id="passwordStrength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <span class="strength-text" id="strengthText">Força da senha</span>
                        </div>
                        @error('password')
                            <span class="error-message">
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-lock"></i>
                            Confirmar senha
                        </label>
                        <div class="password-wrapper">
                            <input 
                                type="password" 
                                id="password_confirmation"
                                name="password_confirmation" 
                                class="form-input" 
                                placeholder="Digite a senha novamente"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                                <i class="fas fa-eye" id="eyeIcon2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Termos -->
                    <div class="form-terms">
                        <label class="checkbox-label">
                            <input type="checkbox" name="terms" required>
                            <span class="checkbox-custom"></span>
                            <span>
                                Concordo com os 
                                <a href="#">Termos de Uso</a> e 
                                <a href="#">Política de Privacidade</a>
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span class="btn-text">Criar minha conta</span>
                        <i class="fas fa-arrow-right btn-icon"></i>
                        <div class="btn-loader"></div>
                    </button>
                </form>
                
                <div class="login-link">
                    <p>Já tem uma conta? 
                        <a href="{{ route('login') }}">Faça login</a>
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
        <h3 class="modal-title">Cadastro realizado com sucesso!</h3>
        <p class="modal-text">Sua conta foi criada. Redirecionando para o login...</p>
        <div class="modal-loader">
            <div class="loader-bar"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== PREVIEW DA FOTO =====
    const photoInput = document.getElementById('photo');
    const photoPreview = document.getElementById('photoPreview');
    const photoLabel = document.getElementById('photoLabel');
    
    photoInput?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                photoPreview.style.backgroundImage = `url(${e.target.result})`;
                photoPreview.style.backgroundSize = 'cover';
                photoPreview.style.backgroundPosition = 'center';
                photoPreview.innerHTML = '';
            };
            
            reader.readAsDataURL(file);
            photoLabel.textContent = file.name;
        }
    });

    // ===== TOGGLE PASSWORD =====
    window.togglePassword = function(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(iconId);
        
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

    // ===== PASSWORD STRENGTH =====
    const passwordInput = document.getElementById('password');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    
    passwordInput?.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        
        if (password.length >= 8) strength++;
        if (password.match(/[a-z]/)) strength++;
        if (password.match(/[A-Z]/)) strength++;
        if (password.match(/[0-9]/)) strength++;
        if (password.match(/[^a-zA-Z0-9]/)) strength++;
        
        const percentage = (strength / 5) * 100;
        strengthFill.style.width = percentage + '%';
        
        if (strength <= 2) {
            strengthFill.style.background = '#f44336';
            strengthText.textContent = 'Fraca';
            strengthText.style.color = '#f44336';
        } else if (strength <= 3) {
            strengthFill.style.background = '#ff9800';
            strengthText.textContent = 'Média';
            strengthText.style.color = '#ff9800';
        } else if (strength <= 4) {
            strengthFill.style.background = '#4caf50';
            strengthText.textContent = 'Forte';
            strengthText.style.color = '#4caf50';
        } else {
            strengthFill.style.background = '#2196F3';
            strengthText.textContent = 'Muito forte';
            strengthText.style.color = '#2196F3';
        }
    });

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

    // ===== FORM SUBMIT =====
    const form = document.getElementById('registerForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form?.addEventListener('submit', function(e) {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
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

    // ===== MOSTRAR MODAL SE SUCESSO =====
    @if(session('success'))
        setTimeout(() => {
            document.getElementById('successModal').classList.add('show');
            document.body.style.overflow = 'hidden';
            
            // Redirecionar após 3 segundos
            setTimeout(() => {
                window.location.href = '{{ route("login") }}';
            }, 3000);
        }, 500);
    @endif
});
</script>
@endsection
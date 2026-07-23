@extends('template')

@section('title', 'Criar Conta - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
    <style>
        .auth-card-wide {
            max-width: 650px !important;
        }
        .viacep-spinner {
            font-size: 0.8rem;
            color: var(--primary-light);
            display: none;
            margin-top: 4px;
        }
    </style>
@endsection

@section('content')

<div class="auth-page">
    <div class="auth-card auth-card-wide">
        <div class="auth-header">
            <div class="auth-logo-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1 class="auth-title">Crie sua conta no CineFilms</h1>
            <p class="auth-subtitle">Cadastre-se gratuitamente para comprar ingressos sem filas e gerenciar suas preferências.</p>
        </div>

        @if ($errors->any())
            <div style="background:#FEE2E2; color:#991B1B; padding:12px 16px; border-radius:8px; font-size:0.85rem; margin-bottom:20px;">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="registerForm">
            @csrf
            
            <div class="form-grid-2">
                <div class="form-group">
                    <label for="name" class="form-label">Nome Completo *</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input @error('name') form-input-error @enderror" 
                        placeholder="Seu nome completo" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus
                    >
                    @error('name')
                        <span class="form-error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">E-mail *</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input @error('email') form-input-error @enderror" 
                        placeholder="seu@email.com" 
                        value="{{ old('email') }}" 
                        required
                    >
                    @error('email')
                        <span class="form-error-msg">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label for="cpf" class="form-label">CPF</label>
                    <input 
                        type="text" 
                        id="cpf" 
                        name="cpf" 
                        class="form-input @error('cpf') form-input-error @enderror" 
                        placeholder="000.000.000-00" 
                        value="{{ old('cpf') }}" 
                        maxlength="14"
                    >
                    @error('cpf')
                        <span class="form-error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input 
                        type="date" 
                        id="data_nascimento" 
                        name="data_nascimento" 
                        class="form-input @error('data_nascimento') form-input-error @enderror" 
                        value="{{ old('data_nascimento') }}"
                    >
                    @error('data_nascimento')
                        <span class="form-error-msg">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label for="telefone" class="form-label">Telefone / Celular</label>
                    <input 
                        type="text" 
                        id="telefone" 
                        name="telefone" 
                        class="form-input @error('telefone') form-input-error @enderror" 
                        placeholder="(00) 00000-0000" 
                        value="{{ old('telefone') }}" 
                        maxlength="15"
                    >
                    @error('telefone')
                        <span class="form-error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cep" class="form-label">CEP (Busca ViaCEP)</label>
                    <input 
                        type="text" 
                        id="cep" 
                        name="cep" 
                        class="form-input @error('cep') form-input-error @enderror" 
                        placeholder="00000-000" 
                        value="{{ old('cep') }}" 
                        maxlength="9"
                    >
                    <div id="viacepLoading" class="viacep-spinner">
                        <i class="fas fa-spinner fa-spin"></i> Consultando CEP no ViaCEP...
                    </div>
                    @error('cep')
                        <span class="form-error-msg">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label for="endereco" class="form-label">Endereço / Logradouro</label>
                    <input 
                        type="text" 
                        id="endereco" 
                        name="endereco" 
                        class="form-input" 
                        placeholder="Rua, Av..." 
                        value="{{ old('endereco') }}"
                    >
                </div>

                <div class="form-group">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input 
                        type="text" 
                        id="bairro" 
                        name="bairro" 
                        class="form-input" 
                        placeholder="Seu bairro" 
                        value="{{ old('bairro') }}"
                    >
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input 
                        type="text" 
                        id="cidade" 
                        name="cidade" 
                        class="form-input" 
                        placeholder="Sua cidade" 
                        value="{{ old('cidade') }}"
                    >
                </div>

                <div class="form-group">
                    <label for="estado" class="form-label">UF / Estado</label>
                    <input 
                        type="text" 
                        id="estado" 
                        name="estado" 
                        class="form-input" 
                        placeholder="SP" 
                        value="{{ old('estado') }}" 
                        maxlength="2"
                        style="text-transform: uppercase;"
                    >
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label for="password" class="form-label">Senha *</label>
                    <div class="password-field-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input @error('password') form-input-error @enderror" 
                            placeholder="Mínimo 6 caracteres" 
                            required
                        >
                        <button type="button" class="toggle-password-btn" onclick="togglePass('password', 'eyeReg1')" title="Mostrar/Ocultar Senha">
                            <i class="fas fa-eye" id="eyeReg1"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="form-error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmar Senha *</label>
                    <div class="password-field-wrapper">
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="form-input" 
                            placeholder="Repita sua senha" 
                            required
                        >
                        <button type="button" class="toggle-password-btn" onclick="togglePass('password_confirmation', 'eyeReg2')" title="Mostrar/Ocultar Senha">
                            <i class="fas fa-eye" id="eyeReg2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="profile_image" class="form-label">Foto de Perfil (opcional)</label>
                <input type="file" id="profile_image" name="profile_image" class="form-input" accept="image/*">
            </div>

            <button type="submit" class="btn-auth-submit" style="margin-top: 8px;">
                <i class="fas fa-user-check"></i> Criar Minha Conta
            </button>
        </form>

        <div class="auth-footer">
            Já possui uma conta? <a href="{{ route('login') }}" class="auth-link">Faça Login</a>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function togglePass(inputId, iconId) {
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

    // Máscara de CPF
    document.getElementById('cpf').addEventListener('input', function (e) {
        let v = e.target.value.replace(/\D/g, '');
        if (v.length > 11) v = v.substring(0, 11);
        v = v.replace(/(\d{3})(\d)/, '$1.$2');
        v = v.replace(/(\d{3})(\d)/, '$1.$2');
        v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        e.target.value = v;
    });

    // Máscara de Telefone
    document.getElementById('telefone').addEventListener('input', function (e) {
        let v = e.target.value.replace(/\D/g, '');
        if (v.length > 11) v = v.substring(0, 11);
        if (v.length > 10) {
            v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        } else if (v.length > 5) {
            v = v.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
        } else if (v.length > 2) {
            v = v.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
        } else {
            v = v.replace(/^(\d*)/, '($1');
        }
        e.target.value = v;
    });

    // Máscara de CEP e Integração ViaCEP
    const cepInput = document.getElementById('cep');
    const loadingSpinner = document.getElementById('viacepLoading');

    cepInput.addEventListener('input', function (e) {
        let v = e.target.value.replace(/\D/g, '');
        if (v.length > 8) v = v.substring(0, 8);
        if (v.length > 5) {
            v = v.replace(/^(\d{5})(\d{1,3})$/, '$1-$2');
        }
        e.target.value = v;

        const rawCep = v.replace(/\D/g, '');
        if (rawCep.length === 8) {
            consultarViaCEP(rawCep);
        }
    });

    function consultarViaCEP(cep) {
        loadingSpinner.style.display = 'block';
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(res => res.json())
            .then(data => {
                loadingSpinner.style.display = 'none';
                if (!data.erro) {
                    if (data.logradouro) document.getElementById('endereco').value = data.logradouro;
                    if (data.bairro) document.getElementById('bairro').value = data.bairro;
                    if (data.localidade) document.getElementById('cidade').value = data.localidade;
                    if (data.uf) document.getElementById('estado').value = data.uf;
                }
            })
            .catch(err => {
                loadingSpinner.style.display = 'none';
                console.error('Erro no ViaCEP:', err);
            });
    }
</script>
@endsection
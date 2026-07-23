@extends('template')

@section('title', 'Meu Perfil - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="perfil-header">
    <div class="container">
        <h1 style="font-size:2.25rem; font-weight:800; margin-bottom:8px;">Minha Conta</h1>
        <p style="color:var(--gray-300);">Painel de informações do perfil e credenciais de acesso.</p>
    </div>
</div>

<div class="container perfil-container">
    <div class="perfil-card">
        @if(session('success'))
            <div style="background:#D1FAE5; color:#065F46; padding:14px 18px; border-radius:var(--radius-md); font-size:0.9rem; margin-bottom:28px;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div id="viewMode">
            <div class="perfil-avatar-wrap">
                <img 
                    src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : asset('img/do-utilizador.png') }}" 
                    class="perfil-avatar-img" 
                    alt="Foto de Perfil"
                    onerror="this.src='{{ asset('img/do-utilizador.png') }}'"
                >
                <h2 style="font-size:1.6rem; font-weight:800; color:var(--gray-900); margin-top:14px;">{{ $user->name }}</h2>
                <p style="color:var(--gray-500); font-size:0.95rem;">{{ $user->email }}</p>
                
                @if($user->role === 'admin' || ($user->is_gm && $user->role !== 'coordenador'))
                    <span style="display:inline-block; margin-top:10px; background:#FEE2E2; color:#991B1B; padding:6px 16px; border-radius:20px; font-size:0.85rem; font-weight:800;">
                        <i class="fas fa-user-shield"></i> Administrador Mestre
                    </span>
                @elseif($user->role === 'coordenador')
                    <span style="display:inline-block; margin-top:10px; background:#FEF3C7; color:#92400E; padding:6px 16px; border-radius:20px; font-size:0.85rem; font-weight:800;">
                        <i class="fas fa-user-tie"></i> Coordenador de Operações
                    </span>
                @else
                    <span style="display:inline-block; margin-top:10px; background:var(--primary-subtle); color:var(--primary-light); padding:6px 16px; border-radius:20px; font-size:0.85rem; font-weight:800;">
                        <i class="fas fa-user"></i> Cliente CineFilms
                    </span>
                @endif
            </div>

            <!-- SEÇÃO DE ESTATÍSTICAS E AÇÕES RÁPIDAS PARA ADMIN / COORDENADOR -->
            @if($user->is_gm || in_array($user->role, ['admin', 'coordenador']))
                <div style="margin-bottom: 28px; padding-bottom: 20px; border-bottom: 1px solid var(--gray-200);">
                    <h4 style="font-size: 1rem; font-weight: 800; color: var(--gray-900); margin-bottom: 14px; display:flex; align-items:center; gap:8px;">
                        <i class="fas fa-chart-line" style="color:var(--primary-light);"></i> Painel Administrativo de Controle
                    </h4>
                    
                    <div class="admin-stats-grid">
                        <div class="admin-stat-card">
                            <div class="admin-stat-number">{{ \App\Models\Filme::count() }}</div>
                            <div class="admin-stat-label">Filmes Cadastrados</div>
                        </div>
                        <div class="admin-stat-card">
                            <div class="admin-stat-number">{{ \App\Models\User::count() }}</div>
                            <div class="admin-stat-label">Usuários no Sistema</div>
                        </div>
                        <div class="admin-stat-card">
                            <div class="admin-stat-number">{{ \App\Models\Ticket::count() }}</div>
                            <div class="admin-stat-label">Ingressos Emitidos</div>
                        </div>
                    </div>

                    <div style="display:flex; flex-wrap:wrap; gap:12px; margin-top:16px;">
                        <a href="{{ route('admin.dashboard') }}" class="btn-perfil-action btn-perfil-primary">
                            <i class="fas fa-tachometer-alt"></i> Acessar Dashboard
                        </a>
                        <a href="{{ route('admin.emcartaz') }}" class="btn-perfil-action btn-perfil-secondary">
                            <i class="fas fa-film"></i> Gerenciar Filmes
                        </a>
                        <a href="{{ route('admin.export.csv') }}" class="btn-perfil-action btn-perfil-secondary">
                            <i class="fas fa-file-csv"></i> Exportar CSV
                        </a>
                        <a href="{{ route('admin.export.pdf') }}" class="btn-perfil-action btn-perfil-secondary">
                            <i class="fas fa-file-pdf"></i> Exportar PDF
                        </a>
                    </div>
                </div>
            @endif

            <!-- GRID DE INFORMAÇÕES PESSOAIS -->
            <h4 style="font-size: 1rem; font-weight: 800; color: var(--gray-900); margin-bottom: 14px;">
                <i class="fas fa-address-card" style="color:var(--primary-light);"></i> Informações Pessoais
            </h4>
            <div class="info-grid">
                <div class="info-item">
                    <label>CPF</label>
                    <span>{{ $user->cpf ?? 'Não informado' }}</span>
                </div>
                <div class="info-item">
                    <label>Telefone / Celular</label>
                    <span>{{ $user->telefone ?? 'Não informado' }}</span>
                </div>
                <div class="info-item">
                    <label>Data de Nascimento</label>
                    <span>{{ $user->data_nascimento ? date('d/m/Y', strtotime($user->data_nascimento)) : 'Não informada' }}</span>
                </div>
                <div class="info-item">
                    <label>CEP</label>
                    <span>{{ $user->cep ?? 'Não informado' }}</span>
                </div>
                <div class="info-item" style="grid-column: 1 / -1;">
                    <label>Endereço Completo</label>
                    <span>
                        @if($user->endereco)
                            {{ $user->endereco }} {{ $user->bairro ? '- ' . $user->bairro : '' }} {{ $user->cidade ? '(' . $user->cidade . '/' . $user->estado . ')' : '' }}
                        @else
                            Não informado
                        @endif
                    </span>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:28px;">
                <a href="{{ route('meus.ingressos') }}" class="btn-perfil-action btn-perfil-secondary" style="text-align:center;">
                    <i class="fas fa-ticket-alt"></i> Meus Ingressos
                </a>
                <a href="{{ route('historico') }}" class="btn-perfil-action btn-perfil-secondary" style="text-align:center;">
                    <i class="fas fa-history"></i> Histórico
                </a>
            </div>

            <button class="btn-perfil-action btn-perfil-primary" style="width:100%;" onclick="toggleEdit(true)">
                <i class="fas fa-user-edit"></i> Editar Informações do Perfil
            </button>
        </div>

        <!-- FORMULÁRIO DE EDIÇÃO -->
        <form id="editForm" class="hidden" method="POST" action="{{ route('perfil.atualizar') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="perfil-avatar-wrap">
                <img 
                    src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : asset('img/do-utilizador.png') }}" 
                    class="perfil-avatar-img" 
                    alt="Foto"
                    onerror="this.src='{{ asset('img/do-utilizador.png') }}'"
                >
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label for="name" class="form-label">Nome Completo</label>
                    <input type="text" id="name" name="name" class="form-input" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" name="email" class="form-input" value="{{ $user->email }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="profile_image" class="form-label">Nova Foto de Perfil (Opcional)</label>
                <input type="file" id="profile_image" name="profile_image" class="form-input" accept="image/*">
            </div>

            <div style="border-top:1px solid var(--gray-200); padding-top:20px; margin-top:24px;">
                <h4 style="font-size:0.95rem; font-weight:700; color:var(--gray-800); margin-bottom:12px;">Alterar Senha de Acesso</h4>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="password" class="form-label">Nova Senha</label>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Mínimo 6 caracteres">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirmar Nova Senha</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Repita a nova senha">
                    </div>
                </div>
            </div>

            <div style="display:flex; gap:16px; margin-top:28px;">
                <button type="submit" class="btn-perfil-action btn-perfil-primary" style="flex:1;">
                    <i class="fas fa-save"></i> Salvar Alterações
                </button>
                <button type="button" class="btn-perfil-action btn-perfil-secondary" onclick="toggleEdit(false)">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function toggleEdit(isEditing) {
        document.getElementById('viewMode').classList.toggle('hidden', isEditing);
        document.getElementById('editForm').classList.toggle('hidden', !isEditing);
    }
</script>
@endsection
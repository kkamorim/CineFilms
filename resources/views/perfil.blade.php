@extends('template')

@section('title', 'Meu Perfil')

@section ('head')
<link rel= "stylesheet" href="{{asset('css/perfil.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')

<div class="perfil-dashboard-container">
    
    <h1>Meu Perfil</h1>

    @if(session('success'))
        <div class="mensagem-sucesso">{{ session('success') }}</div>
    @endif
    
    <button class="btn-editar" id="btn-editar" title="Editar Perfil">
        <i class="fas fa-pen"></i> 
    </button>

    <div class="perfil-visualizacao" id="visualizacao">
        
        <div class="bloco-info-pessoal">
            <div class="perfil-foto-bloco">
                <img src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : asset('img/default-avatar.png') }}" alt="Foto de Perfil">
            </div>
            
            <div class="info-pessoal-texto">
                <div class="info-item">
                    <label>Nome</label>
                    <h2>{{ $user->name }}</h2>
                </div>
                <div class="info-item">
                    <label>Email</label>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <div class="bloco-acoes">
            <div class="bloco-titulo">Ações da Conta</div>
            
            <a href="{{ route('meus.ingressos') }}" class="acao-link">
                <div><i class="fas fa-ticket-alt"></i> Meus Ingressos</div>
                <i class="fas fa-chevron-right seta"></i>
            </a>
            
            <a href="{{ route('historico') }}" class="acao-link">
                <div><i class="fas fa-history"></i> Histórico de Compras</div>
                <i class="fas fa-chevron-right seta"></i>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('perfil.atualizar') }}" enctype="multipart/form-data" class="perfil-edicao hidden" id="edicao">
        @csrf
        
        <div class="perfil-foto-edicao">
            <img id="foto-preview" src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : asset('img/default-avatar.png') }}" alt="Foto de Perfil">
        </div>

        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="input-file-custom">
            <label>Foto de Perfil:</label>
            <div class="file-control-group">
                <label for="file-upload" class="custom-file-upload">
                    <i class="fas fa-upload"></i> Escolher Arquivo
                </label>
                <input id="file-upload" type="file" name="profile_image" style="display: none;">
                <span id="file-name-display" class="file-name-display">Nenhum arquivo escolhido</span>
            </div>
        </div>

        <hr class="senha-hr">
        <p class="senha-instrucao">Preencha os campos de senha *apenas* se desejar alterá-la.</p>
        <div>
            <label for="password">Nova Senha:</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Confirmar Nova Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn-salvar">Salvar Alterações</button>
        <button type="button" class="btn-cancelar" id="btn-cancelar">Cancelar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnEditar = document.getElementById('btn-editar');
        const btnCancelar = document.getElementById('btn-cancelar');
        const visualizacao = document.getElementById('visualizacao');
        const edicao = document.getElementById('edicao');
        const fileUpload = document.getElementById('file-upload');
        const fileNameDisplay = document.getElementById('file-name-display');
        const fotoPreview = document.getElementById('foto-preview');
        // Armazena o URL original da foto de perfil para restaurar
        const originalFotoSrc = fotoPreview.src; 

        function toggleModoEdicao(emEdicao) {
            if (emEdicao) {
                visualizacao.classList.add('hidden');
                edicao.classList.remove('hidden');
                btnEditar.classList.add('hidden');
            } else {
                visualizacao.classList.remove('hidden');
                edicao.classList.add('hidden');
                btnEditar.classList.remove('hidden');

                // Limpa campos de senha e input file ao cancelar
                document.getElementById('password').value = '';
                document.getElementById('password_confirmation').value = '';
                
                // Restaura a foto e o nome do arquivo
                fileNameDisplay.textContent = 'Nenhum arquivo escolhido';
                if(fileUpload.files.length > 0) fileUpload.value = null;
                fotoPreview.src = originalFotoSrc; 
            }
        }

        btnEditar.addEventListener('click', () => toggleModoEdicao(true));
        btnCancelar.addEventListener('click', () => toggleModoEdicao(false));

        // LÓGICA DE PREVIEW DE IMAGEM
        fileUpload.addEventListener('change', function() {
            const file = this.files[0];
            
            if (file) {
                fileNameDisplay.textContent = file.name;
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    fotoPreview.src = e.target.result;
                };
                
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = 'Nenhum arquivo escolhido';
                fotoPreview.src = originalFotoSrc;
            }
        });
    });
</script>

@endsection
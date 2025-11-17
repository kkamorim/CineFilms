@extends('templateDashboard')

@section('title', 'Adicionar Filme - Admin')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/cadastrarFilmes.css') }}">
@endsection

@section('content')

<!-- HEADER ADMIN -->
    <div class="container">
        <div class="breadcrumb">
    
        <h1 class="page-title">
            <i class="fas fa-plus-circle"></i>
            Adicionar Novo Filme
        </h1>
        <p class="page-subtitle">Preencha as informações do filme para adicionar ao catálogo</p>
    </div>
</div>

<!-- FORM SECTION -->
<section class="admin-form-section">
    <div class="container">
        <div class="form-layout">
            
            <!-- PREVIEW CARD -->
            <div class="preview-card">
                <div class="preview-header">
                    <i class="fas fa-eye"></i>
                    <h3>Preview do Filme</h3>
                </div>
                
                <div class="movie-preview">
                    <div class="preview-poster" id="previewPoster">
                        <i class="fas fa-image"></i>
                        <span>Nenhuma imagem selecionada</span>
                    </div>
                    
                    <div class="preview-info">
                        <h4 id="previewTitle">Título do Filme</h4>
                        <div class="preview-meta">
                            <span class="preview-badge" id="previewGenre">Gênero</span>
                            <span class="preview-rating" id="previewRating">
                                <i class="fas fa-star"></i> 0
                            </span>
                        </div>
                        <p id="previewDescription">A descrição do filme aparecerá aqui...</p>
                        
                        <div class="preview-details">
                            <div class="detail-item">
                                <i class="fas fa-door-open"></i>
                                <span id="previewSala">Sala -</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span id="previewHorario">--:--</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="preview-tips">
                    <h4>
                        <i class="fas fa-lightbulb"></i>
                        Dicas para o cadastro
                    </h4>
                    <ul>
                        <li>Use imagens de alta qualidade (mínimo 600x900px)</li>
                        <li>A descrição deve ter entre 100-500 caracteres</li>
                        <li>Verifique a classificação indicativa correta</li>
                        <li>Certifique-se de que a sala está disponível</li>
                    </ul>
                </div>
            </div>

            <!-- FORMULÁRIO -->
            <div class="form-card">
                @if(session('success'))
                    <div class="alert alert-success" id="successAlert">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                        <button class="alert-close" onclick="closeAlert('successAlert')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error" id="errorAlert">
                        <i class="fas fa-exclamation-circle"></i>
                        <div class="alert-content">
                            <strong>Erro ao salvar filme:</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button class="alert-close" onclick="closeAlert('errorAlert')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <form action="{{ route('admin.filmes.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data" 
                      class="movie-form"
                      id="movieForm">
                    @csrf

                    <!-- INFORMAÇÕES BÁSICAS -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            Informações Básicas
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="titulo" class="form-label required">
                                    <i class="fas fa-heading"></i>
                                    Título do Filme
                                </label>
                                <input 
                                    type="text" 
                                    id="titulo" 
                                    name="titulo" 
                                    class="form-input"
                                    placeholder="Ex: Vingadores: Ultimato"
                                    value="{{ old('titulo') }}"
                                    required
                                    maxlength="255"
                                >
                                <span class="input-helper">Nome completo do filme</span>
                                @error('titulo')
                                    <span class="error-message">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="genero" class="form-label required">
                                    <i class="fas fa-theater-masks"></i>
                                    Gênero
                                </label>
                                <select 
                                    id="genero" 
                                    name="genero" 
                                    class="form-select"
                                    required
                                >
                                    <option value="">Selecione o gênero</option>
                                    <option value="Ação" {{ old('genero') == 'Ação' ? 'selected' : '' }}>Ação</option>
                                    <option value="Aventura" {{ old('genero') == 'Aventura' ? 'selected' : '' }}>Aventura</option>
                                    <option value="Comédia" {{ old('genero') == 'Comédia' ? 'selected' : '' }}>Comédia</option>
                                    <option value="Drama" {{ old('genero') == 'Drama' ? 'selected' : '' }}>Drama</option>
                                    <option value="Terror" {{ old('genero') == 'Terror' ? 'selected' : '' }}>Terror</option>
                                    <option value="Ficção Científica" {{ old('genero') == 'Ficção Científica' ? 'selected' : '' }}>Ficção Científica</option>
                                    <option value="Romance" {{ old('genero') == 'Romance' ? 'selected' : '' }}>Romance</option>
                                    <option value="Animação" {{ old('genero') == 'Animação' ? 'selected' : '' }}>Animação</option>
                                    <option value="Suspense" {{ old('genero') == 'Suspense' ? 'selected' : '' }}>Suspense</option>
                                    <option value="Documentário" {{ old('genero') == 'Documentário' ? 'selected' : '' }}>Documentário</option>
                                </select>
                                @error('genero')
                                    <span class="error-message">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="classificacao" class="form-label required">
                                    <i class="fas fa-user-shield"></i>
                                    Classificação Indicativa
                                </label>
                                <select 
                                    id="classificacao" 
                                    name="classificacao" 
                                    class="form-select"
                                    required
                                >
                                    <option value="">Selecione</option>
                                    <option value="L" {{ old('classificacao') == 'L' ? 'selected' : '' }}>Livre</option>
                                    <option value="10" {{ old('classificacao') == '10' ? 'selected' : '' }}>10 anos</option>
                                    <option value="12" {{ old('classificacao') == '12' ? 'selected' : '' }}>12 anos</option>
                                    <option value="14" {{ old('classificacao') == '14' ? 'selected' : '' }}>14 anos</option>
                                    <option value="16" {{ old('classificacao') == '16' ? 'selected' : '' }}>16 anos</option>
                                    <option value="18" {{ old('classificacao') == '18' ? 'selected' : '' }}>18 anos</option>
                                </select>
                                @error('classificacao')
                                    <span class="error-message">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="duracao" class="form-label">
                                    <i class="fas fa-hourglass-half"></i>
                                    Duração (minutos)
                                </label>
                                <input 
                                    type="number" 
                                    id="duracao" 
                                    name="duracao" 
                                    class="form-input"
                                    placeholder="120"
                                    value="{{ old('duracao') }}"
                                    min="1"
                                    max="300"
                                >
                                <span class="input-helper">Duração total em minutos</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="form-label required">
                                <i class="fas fa-align-left"></i>
                                Sinopse / Descrição
                            </label>
                            <textarea 
                                id="descricao" 
                                name="descricao" 
                                class="form-textarea"
                                placeholder="Escreva a sinopse completa do filme..."
                                rows="5"
                                required
                                maxlength="1000"
                            >{{ old('descricao') }}</textarea>
                            <div class="textarea-footer">
                                <span class="char-counter">
                                    <span id="charCount">0</span>/1000 caracteres
                                </span>
                                <span class="input-helper">Mínimo de 100 caracteres</span>
                            </div>
                            @error('descricao')
                                <span class="error-message">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- SESSÃO E SALA -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-film"></i>
                            Informações da Sessão
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="sala" class="form-label required">
                                    <i class="fas fa-door-open"></i>
                                    Sala
                                </label>
                                <select 
                                    id="sala" 
                                    name="sala" 
                                    class="form-select"
                                    required
                                >
                                    <option value="">Selecione a sala</option>
                                    <option value="Sala 1" {{ old('sala') == 'Sala 1' ? 'selected' : '' }}>Sala 1 - Premium</option>
                                    <option value="Sala 2" {{ old('sala') == 'Sala 2' ? 'selected' : '' }}>Sala 2 - IMAX</option>
                                    <option value="Sala 3" {{ old('sala') == 'Sala 3' ? 'selected' : '' }}>Sala 3 - 3D</option>
                                    <option value="Sala 4" {{ old('sala') == 'Sala 4' ? 'selected' : '' }}>Sala 4 - VIP</option>
                                    <option value="Sala 5" {{ old('sala') == 'Sala 5' ? 'selected' : '' }}>Sala 5 - Standard</option>
                                </select>
                                @error('sala')
                                    <span class="error-message">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="horario" class="form-label required">
                                    <i class="fas fa-clock"></i>
                                    Horário da Sessão
                                </label>
                                <input 
                                    type="time" 
                                    id="horario" 
                                    name="horario" 
                                    class="form-input"
                                    value="{{ old('horario') }}"
                                    required
                                >
                                @error('horario')
                                    <span class="error-message">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="data_inicio" class="form-label">
                                    <i class="fas fa-calendar-plus"></i>
                                    Data de Início
                                </label>
                                <input 
                                    type="date" 
                                    id="data_inicio" 
                                    name="data_inicio" 
                                    class="form-input"
                                    value="{{ old('data_inicio') }}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="data_fim" class="form-label">
                                    <i class="fas fa-calendar-times"></i>
                                    Data de Término
                                </label>
                                <input 
                                    type="date" 
                                    id="data_fim" 
                                    name="data_fim" 
                                    class="form-input"
                                    value="{{ old('data_fim') }}"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- IMAGEM DO FILME -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-image"></i>
                            Imagem do Poster
                        </h3>

                        <div class="form-group">
                            <label for="imagem" class="form-label required">
                                <i class="fas fa-upload"></i>
                                Selecionar Imagem
                            </label>
                            
                            <div class="file-upload-area" id="fileUploadArea">
                                <input 
                                    type="file" 
                                    id="imagem" 
                                    name="imagem" 
                                    class="file-input"
                                    accept="image/*"
                                    required
                                >
                                <div class="upload-placeholder">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h4>Arraste a imagem aqui</h4>
                                    <p>ou clique para selecionar</p>
                                    <span class="file-types">PNG, JPG, WEBP (máx. 5MB)</span>
                                </div>
                                <div class="upload-preview" id="uploadPreview" style="display: none;">
                                    <img id="previewImage" src="" alt="Preview">
                                    <button type="button" class="remove-image" onclick="removeImage()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            
                            @error('imagem')
                                <span class="error-message">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- AÇÕES DO FORMULÁRIO -->
                    <div class="form-actions">
                        <button type="button" class="btn-cancel" onclick="confirmCancel()">
                            <i class="fas fa-times"></i>
                            Cancelar
                        </button>
                        <button type="submit" class="btn-submit" id="submitBtn">
                            <span class="btn-text">
                                <i class="fas fa-save"></i>
                                Salvar Filme
                            </span>
                            <div class="btn-loader"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- MODAL DE CONFIRMAÇÃO -->
<div class="modal-overlay" id="cancelModal">
    <div class="modal-content warning">
        <div class="modal-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h3 class="modal-title">Descartar alterações?</h3>
        <p class="modal-text">
            Todas as informações preenchidas serão perdidas. Deseja realmente cancelar?
        </p>
        <div class="modal-actions">
            <button class="btn-modal-cancel" onclick="closeModal()">
                Continuar Editando
            </button>
            <a href="{{ route('admin.filmes.index') }}" class="btn-modal-confirm">
                Sim, Descartar
            </a>
        </div>
    </div>
</div>

<!-- MODAL DE SUCESSO -->
<div class="modal-overlay" id="successModal">
    <div class="modal-content success">
        <div class="modal-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3 class="modal-title">Filme cadastrado com sucesso!</h3>
        <p class="modal-text">O filme foi adicionado ao catálogo e já está disponível.</p>
        <div class="modal-actions">
            <a href="{{ route('admin.filmes.index') }}" class="btn-modal-ok">
                Ver Lista de Filmes
            </a>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== PREVIEW EM TEMPO REAL =====
    const tituloInput = document.getElementById('titulo');
    const generoSelect = document.getElementById('genero');
    const classificacaoSelect = document.getElementById('classificacao');
    const salaSelect = document.getElementById('sala');
    const horarioInput = document.getElementById('horario');
    const descricaoTextarea = document.getElementById('descricao');
    
    // Título
    tituloInput?.addEventListener('input', function() {
        document.getElementById('previewTitle').textContent = this.value || 'Título do Filme';
    });
    
    // Gênero
    generoSelect?.addEventListener('change', function() {
        document.getElementById('previewGenre').textContent = this.value || 'Gênero';
    });
    
    // Classificação
    classificacaoSelect?.addEventListener('change', function() {
        document.getElementById('previewRating').innerHTML = `<i class="fas fa-star"></i> ${this.value || '0'}`;
    });
    
    // Sala
    salaSelect?.addEventListener('change', function() {
        document.getElementById('previewSala').textContent = this.value || 'Sala -';
    });
    
    // Horário
    horarioInput?.addEventListener('change', function() {
        document.getElementById('previewHorario').textContent = this.value || '--:--';
    });
    
    // Descrição
    descricaoTextarea?.addEventListener('input', function() {
        const text = this.value || 'A descrição do filme aparecerá aqui...';
        document.getElementById('previewDescription').textContent = text;
    });

    // ===== CONTADOR DE CARACTERES =====
    const charCount = document.getElementById('charCount');
    
    descricaoTextarea?.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;
        
        if (count > 1000) {
            this.value = this.value.substring(0, 1000);
            charCount.textContent = 1000;
        }
    });

    // ===== UPLOAD DE IMAGEM =====
    const fileInput = document.getElementById('imagem');
    const fileUploadArea = document.getElementById('fileUploadArea');
    const uploadPreview = document.getElementById('uploadPreview');
    const previewImage = document.getElementById('previewImage');
    const previewPoster = document.getElementById('previewPoster');
    
    // Click no upload area
    fileUploadArea?.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-image') || e.target.closest('.remove-image')) {
            return;
        }
        fileInput.click();
    });
    
    // Drag and drop
    fileUploadArea?.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
    });
    
    fileUploadArea?.addEventListener('dragleave', function() {
        this.classList.remove('dragover');
    });
    
    fileUploadArea?.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleImageUpload(files[0]);
        }
    });
    
    // Change no input
    fileInput?.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            handleImageUpload(this.files[0]);
        }
    });
    
    function handleImageUpload(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                uploadPreview.style.display = 'block';
                fileUploadArea.querySelector('.upload-placeholder').style.display = 'none';
                
                // Atualizar preview do card
                previewPoster.style.backgroundImage = `url(${e.target.result})`;
                previewPoster.innerHTML = '';
            };
            
            reader.readAsDataURL(file);
        }
    }
    
    window.removeImage = function() {
        fileInput.value = '';
        uploadPreview.style.display = 'none';
        fileUploadArea.querySelector('.upload-placeholder').style.display = 'flex';
        previewImage.src = '';
        
        // Resetar preview do card
        previewPoster.style.backgroundImage = '';
        previewPoster.innerHTML = '<i class="fas fa-image"></i><span>Nenhuma imagem selecionada</span>';
    };

    // ===== FORM SUBMIT =====
    const form = document.getElementById('movieForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form?.addEventListener('submit', function(e) {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
    });

    // ===== MODAL FUNCTIONS =====
    window.confirmCancel = function() {
        const modal = document.getElementById('cancelModal');
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    };
    
    window.closeModal = function() {
        const modals = document.querySelectorAll('.modal-overlay');
        modals.forEach(modal => {
            modal.classList.remove('show');
        });
        document.body.style.overflow = '';
    };

    // ===== CLOSE ALERT =====
    window.closeAlert = function(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }
    };

    // Auto close alerts
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            if (alert) closeAlert(alert.id);
        });
    }, 5000);
});
</script>
@endsection
@extends('templateDashboard')

@section('title', 'Editar Filme - Admin')

@section('head')
<link rel="stylesheet" href="{{ asset('css/editarFilmes.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')

<div class="cartaz-header">
    <div class="header-content">
        <div class="header-text">
            <h1 class="page-title">
                <i class="fas fa-edit"></i>
                Editar Filme
            </h1>
            <p class="page-subtitle">{{ $filme->titulo }}</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.filmes.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                <span>Voltar</span>
            </a>
        </div>
    </div>
</div>

<section class="edit-form-section">
    <div class="container">
        <div class="form-layout">

            <!-- PREVIEW CARD -->
            <div class="preview-card">
                <div class="preview-header">
                    <i class="fas fa-eye"></i>
                    <h3>Preview do Filme</h3>
                </div>

                <div class="movie-preview">
                    <div class="preview-poster" id="previewPoster"
                         @if($filme->imagem)
                         style="background-image: url('{{ asset('storage/' . $filme->imagem) }}');"
                         @endif>
                        @if(!$filme->imagem)
                        <i class="fas fa-image"></i>
                        <span>Sem imagem</span>
                        @endif
                    </div>

                    <div class="preview-info">
                        <h4 id="previewTitle">{{ $filme->titulo }}</h4>
                        <div class="preview-meta">
                            <span class="preview-badge" id="previewGenre">{{ $filme->genero }}</span>
                            <span class="preview-rating" id="previewRating">
                                <i class="fas fa-star"></i> {{ $filme->classificacao }}
                            </span>
                        </div>
                        <p id="previewDescription">{{ Str::limit($filme->descricao, 100) }}</p>

                        <div class="preview-details">
                            <div class="detail-item">
                                <i class="fas fa-door-open"></i>
                                <span id="previewSala">{{ $filme->sala ?? 'Sala -' }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span id="previewHorario">{{ $filme->horario ? \Carbon\Carbon::parse($filme->horario)->format('H:i') : '--:--' }}</span>
                            </div>
                            @if($filme->duracao)
                            <div class="detail-item">
                                <i class="fas fa-hourglass-half"></i>
                                <span id="previewDuracao">{{ $filme->duracao }}min</span>
                            </div>
                            @endif
                        </div>
                    </div>
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
                            <strong>Erro ao atualizar filme:</strong>
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

                <form action="{{ route('admin.filmes.update', $filme) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="movie-form"
                      id="editForm">
                    @csrf
                    @method('PUT')

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
                                <input type="text" id="titulo" name="titulo" class="form-input"
                                       placeholder="Ex: Vingadores: Ultimato"
                                       value="{{ old('titulo', $filme->titulo) }}" required maxlength="255">
                                @error('titulo')
                                    <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="genero" class="form-label required">
                                    <i class="fas fa-theater-masks"></i>
                                    Gênero
                                </label>
                                <select id="genero" name="genero" class="form-select" required>
                                    <option value="">Selecione o gênero</option>
                                    @foreach(['Ação','Aventura','Comédia','Drama','Terror','Ficção Científica','Romance','Animação','Suspense','Documentário'] as $gen)
                                        <option value="{{ $gen }}" {{ old('genero', $filme->genero) == $gen ? 'selected' : '' }}>{{ $gen }}</option>
                                    @endforeach
                                </select>
                                @error('genero')
                                    <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="classificacao" class="form-label required">
                                    <i class="fas fa-user-shield"></i>
                                    Classificação Indicativa
                                </label>
                                <select id="classificacao" name="classificacao" class="form-select" required>
                                    <option value="">Selecione</option>
                                    @foreach(['L'=>'Livre','10'=>'10 anos','12'=>'12 anos','14'=>'14 anos','16'=>'16 anos','18'=>'18 anos'] as $val => $label)
                                        <option value="{{ $val }}" {{ old('classificacao', $filme->classificacao) == $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('classificacao')
                                    <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="duracao" class="form-label">
                                    <i class="fas fa-hourglass-half"></i>
                                    Duração (minutos)
                                </label>
                                <input type="number" id="duracao" name="duracao" class="form-input"
                                       placeholder="120" value="{{ old('duracao', $filme->duracao) }}" min="1" max="300">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="form-label required">
                                <i class="fas fa-align-left"></i>
                                Sinopse / Descrição
                            </label>
                            <textarea id="descricao" name="descricao" class="form-textarea"
                                      placeholder="Escreva a sinopse completa do filme..."
                                      rows="5" required maxlength="1000">{{ old('descricao', $filme->descricao) }}</textarea>
                            <div class="textarea-footer">
                                <span class="char-counter"><span id="charCount">{{ strlen(old('descricao', $filme->descricao ?? '')) }}</span>/1000 caracteres</span>
                            </div>
                            @error('descricao')
                                <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
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
                                <label for="sala" class="form-label">
                                    <i class="fas fa-door-open"></i>
                                    Sala
                                </label>
                                <select id="sala" name="sala" class="form-select">
                                    <option value="">Selecione a sala</option>
                                    @foreach(['Sala 1 - Premium','Sala 2 - IMAX','Sala 3 - 3D','Sala 4 - VIP','Sala 5 - Standard'] as $sala)
                                        <option value="{{ $sala }}" {{ old('sala', $filme->sala) == $sala ? 'selected' : '' }}>{{ $sala }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="horario" class="form-label">
                                    <i class="fas fa-clock"></i>
                                    Horário da Sessão
                                </label>
                                <input type="time" id="horario" name="horario" class="form-input"
                                       value="{{ old('horario', $filme->horario) }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="data_inicio" class="form-label">
                                    <i class="fas fa-calendar-plus"></i>
                                    Data de Início
                                </label>
                                <input type="date" id="data_inicio" name="data_inicio" class="form-input"
                                       value="{{ old('data_inicio', $filme->data_inicio) }}">
                            </div>

                            <div class="form-group">
                                <label for="data_fim" class="form-label">
                                    <i class="fas fa-calendar-times"></i>
                                    Data de Término
                                </label>
                                <input type="date" id="data_fim" name="data_fim" class="form-input"
                                       value="{{ old('data_fim', $filme->data_fim) }}">
                            </div>
                        </div>
                    </div>

                    <!-- IMAGEM -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-image"></i>
                            Imagem do Poster
                        </h3>

                        <div class="form-group">
                            <label for="imagem" class="form-label">
                                <i class="fas fa-upload"></i>
                                Nova Imagem (deixe vazio para manter a atual)
                            </label>

                            <div class="file-upload-area" id="fileUploadArea">
                                <input type="file" id="imagem" name="imagem" class="file-input" accept="image/*">
                                <div class="upload-placeholder">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h4>Clique para selecionar</h4>
                                    <p>PNG, JPG, WEBP (máx. 5MB)</p>
                                </div>
                                <div class="upload-preview" id="uploadPreview" style="display: none;">
                                    <img id="previewImage" src="" alt="Preview">
                                    <button type="button" class="remove-image" onclick="removeImage()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            @error('imagem')
                                <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- AÇÕES -->
                    <div class="form-actions">
                        <a href="{{ route('admin.filmes.index') }}" class="btn-cancel">
                            <i class="fas fa-times"></i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn-submit" id="submitBtn">
                            <span class="btn-text">
                                <i class="fas fa-save"></i>
                                Atualizar Filme
                            </span>
                            <div class="btn-loader"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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
    const charCount = document.getElementById('charCount');

    tituloInput?.addEventListener('input', function() {
        document.getElementById('previewTitle').textContent = this.value || '{{ $filme->titulo }}';
    });

    generoSelect?.addEventListener('change', function() {
        document.getElementById('previewGenre').textContent = this.value || '{{ $filme->genero }}';
    });

    classificacaoSelect?.addEventListener('change', function() {
        document.getElementById('previewRating').innerHTML = `<i class="fas fa-star"></i> ${this.value || '{{ $filme->classificacao }}'}`;
    });

    salaSelect?.addEventListener('change', function() {
        document.getElementById('previewSala').textContent = this.value || '{{ $filme->sala ?? "Sala -" }}';
    });

    horarioInput?.addEventListener('change', function() {
        document.getElementById('previewHorario').textContent = this.value || '{{ $filme->horario ? \Carbon\Carbon::parse($filme->horario)->format("H:i") : "--:--" }}';
    });

    descricaoTextarea?.addEventListener('input', function() {
        const text = this.value || '{{ Str::limit($filme->descricao, 100) }}';
        document.getElementById('previewDescription').textContent = text;
        charCount.textContent = this.value.length;
        if (this.value.length > 1000) {
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

    fileUploadArea?.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-image') || e.target.closest('.remove-image')) return;
        fileInput.click();
    });

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

    fileInput?.addEventListener('change', function() {
        if (this.files && this.files[0]) handleImageUpload(this.files[0]);
    });

    function handleImageUpload(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                uploadPreview.style.display = 'block';
                fileUploadArea.querySelector('.upload-placeholder').style.display = 'none';
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
        @if($filme->imagem)
        previewPoster.style.backgroundImage = 'url({{ asset("storage/" . $filme->imagem) }})';
        previewPoster.innerHTML = '';
        @else
        previewPoster.style.backgroundImage = '';
        previewPoster.innerHTML = '<i class="fas fa-image"></i><span>Sem imagem</span>';
        @endif
    };

    // ===== FORM SUBMIT =====
    const form = document.getElementById('editForm');
    const submitBtn = document.getElementById('submitBtn');

    form?.addEventListener('submit', function() {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
    });

    // ===== CLOSE ALERT =====
    window.closeAlert = function(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }
    };

    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            if (alert) window.closeAlert(alert.id);
        });
    }, 5000);
});
</script>
@endsection

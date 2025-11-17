@extends('templateDashboard')
@section('title', 'Filmes Em Cartaz')
@section('head')
<link rel="stylesheet" href="{{ asset('css/emcartaz.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content')

<div class="cartaz-header">
    <div class="header-content">
        <div class="header-text">
            <h1 class="page-title">
                <i class="fas fa-film"></i>
                Filmes Em Cartaz
            </h1>
            <p class="page-subtitle">Gerencie todos os filmes disponíveis no cinema</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.filmes.create') }}" class="btn-add-movie">
                <i class="fas fa-plus-circle"></i>
                <span>Adicionar Filme</span>
            </a>
        </div>
    </div>
</div>

<div class="emcartaz-container">
    <div class="filter-section">
        <div class="search-wrapper">
            <i class="fas fa-search"></i>
            <input 
                type="text" 
                id="searchInput" 
                class="search-input" 
                placeholder="Buscar por título, gênero ou sala..."
            >
        </div>

        <div class="filter-controls">
            <div class="filter-group">
                <label for="filterGenre">
                    <i class="fas fa-masks-theater"></i>
                    Gênero
                </label>
                <select id="filterGenre" class="filter-select">
                    <option value="">Todos os Gêneros</option>
                    <option value="Ação">Ação</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Comédia">Comédia</option>
                    <option value="Drama">Drama</option>
                    <option value="Terror">Terror</option>
                    <option value="Ficção Científica">Ficção Científica</option>
                    <option value="Romance">Romance</option>
                    <option value="Animação">Animação</option>
                    <option value="Suspense">Suspense</option>
                    <option value="Documentário">Documentário</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="filterSala">
                    <i class="fas fa-door-open"></i>
                    Sala
                </label>
                <select id="filterSala" class="filter-select">
                    <option value="">Todas as Salas</option>
                    <option value="Sala 1">Sala 1</option>
                    <option value="Sala 2">Sala 2</option>
                    <option value="Sala 3">Sala 3</option>
                    <option value="Sala 4">Sala 4</option>
                    <option value="Sala 5">Sala 5</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="sortBy">
                    <i class="fas fa-sort"></i>
                    Ordenar Por
                </label>
                <select id="sortBy" class="filter-select">
                    <option value="recent">Mais Recentes</option>
                    <option value="title-asc">Título (A-Z)</option>
                    <option value="title-desc">Título (Z-A)</option>
                    <option value="genre">Gênero</option>
                    <option value="room">Sala</option>
                    <option value="time">Horário</option>
                </select>
            </div>

            <button class="btn-clear-filters" id="clearFilters">
                <i class="fas fa-times-circle"></i>
                Limpar Filtros
            </button>
        </div>

        <div class="results-info">
            <span class="results-count">
                <i class="fas fa-ticket-alt"></i>
                <span id="resultsCount">{{ $filmes->count() }}</span> filme(s) encontrado(s)
            </span>
            <div class="view-toggle">
                <button class="view-btn active" data-view="grid" title="Visualização em Grade">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="view-btn" data-view="list" title="Visualização em Lista">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- MOVIES GRID -->
    <div class="filmes-grid" id="filmesGrid">
        @forelse($filmes as $filme)
            <div class="card-filme" 
                 data-title="{{ strtolower($filme->titulo) }}"
                 data-genre="{{ $filme->genero }}"
                 data-room="{{ $filme->sala }}"
                 data-time="{{ $filme->horario }}">
                
                <div class="card-image-wrapper">
                    <img src="{{ $filme->imagem ? asset('storage/' . $filme->imagem) : 'https://via.placeholder.com/300x450?text=Sem+Imagem' }}" 
                         alt="{{ $filme->titulo }}"
                         loading="lazy">
                    <div class="card-overlay">
                        <div class="overlay-badges">
                            <span class="badge badge-genre">
                                <i class="fas fa-theater-masks"></i>
                                {{ $filme->genero }}
                            </span>
                            <span class="badge badge-rating">
                                <i class="fas fa-star"></i>
                                {{ $filme->classificacao }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="conteudo-do-cartao">
                    <h3 class="movie-title">{{ $filme->titulo }}</h3>
                    
                    <div class="movie-info">
                        <div class="info-item">
                            <i class="fas fa-door-open"></i>
                            <span>{{ $filme->sala }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <span>{{ \Carbon\Carbon::parse($filme->horario)->format('H:i') }}</span>
                        </div>
                        @if($filme->duracao)
                        <div class="info-item">
                            <i class="fas fa-hourglass-half"></i>
                            <span>{{ $filme->duracao }}min</span>
                        </div>
                        @endif
                    </div>

                    <p class="movie-description">{{ Str::limit($filme->descricao, 120) }}</p>
                    
                    <div class="acoes-filme">
                        <a href="{{ route('admin.filmes.edit', $filme->id) }}" 
                           class="btn btn-edit" 
                           title="Editar Filme">
                            <i class="fas fa-edit"></i>
                            <span>Editar</span>
                        </a>
                        <button type="button" 
                                class="btn btn-delete" 
                                onclick="confirmDelete({{ $filme->id }}, '{{ $filme->titulo }}')"
                                title="Excluir Filme">
                            <i class="fas fa-trash-alt"></i>
                            <span>Excluir</span>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="sem-filmes">
                <i class="fas fa-film-slash"></i>
                <h3>Nenhum filme encontrado</h3>
                <p>Adicione novos filmes ao catálogo para começar.</p>
                <a href="{{ route('admin.filmes.create') }}" class="btn-add-first">
                    <i class="fas fa-plus-circle"></i>
                    Adicionar Primeiro Filme
                </a>
            </div>
        @endforelse
    </div>

    <div class="no-results" id="noResults" style="display: none;">
        <i class="fas fa-search-minus"></i>
        <h3>Nenhum resultado encontrado</h3>
        <p>Tente ajustar os filtros ou fazer uma nova busca.</p>
    </div>
</div>

<div class="modal-overlay" id="deleteModal">
    <div class="modal-content">
        <div class="modal-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h3 class="modal-title">Excluir Filme?</h3>
        <p class="modal-text">
            Tem certeza que deseja excluir o filme <strong id="movieToDelete"></strong>?
            Esta ação não pode ser desfeita.
        </p>
        <form id="deleteForm" method="POST" style="display: contents;">
            @csrf
            @method('DELETE')
            <div class="modal-actions">
                <button type="button" class="btn-modal-cancel" onclick="closeDeleteModal()">
                    Cancelar
                </button>
                <button type="submit" class="btn-modal-confirm">
                    <i class="fas fa-trash-alt"></i>
                    Sim, Excluir
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterGenre = document.getElementById('filterGenre');
    const filterSala = document.getElementById('filterSala');
    const sortBy = document.getElementById('sortBy');
    const clearFilters = document.getElementById('clearFilters');
    const filmesGrid = document.getElementById('filmesGrid');
    const resultsCount = document.getElementById('resultsCount');
    const noResults = document.getElementById('noResults');
    const viewButtons = document.querySelectorAll('.view-btn');

    function filterAndSortMovies() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedGenre = filterGenre.value;
        const selectedSala = filterSala.value;
        const sortOption = sortBy.value;

        let movies = Array.from(document.querySelectorAll('.card-filme'));
        let visibleCount = 0;

        movies.forEach(movie => {
            const title = movie.getAttribute('data-title');
            const genre = movie.getAttribute('data-genre');
            const room = movie.getAttribute('data-room');

            const matchesSearch = !searchTerm || 
                title.includes(searchTerm) || 
                genre.toLowerCase().includes(searchTerm) ||
                room.toLowerCase().includes(searchTerm);
            
            const matchesGenre = !selectedGenre || genre === selectedGenre;
            const matchesSala = !selectedSala || room === selectedSala;

            if (matchesSearch && matchesGenre && matchesSala) {
                movie.style.display = '';
                visibleCount++;
            } else {
                movie.style.display = 'none';
            }
        });

        const visibleMovies = movies.filter(m => m.style.display !== 'none');
        
        visibleMovies.sort((a, b) => {
            switch(sortOption) {
                case 'title-asc':
                    return a.getAttribute('data-title').localeCompare(b.getAttribute('data-title'));
                case 'title-desc':
                    return b.getAttribute('data-title').localeCompare(a.getAttribute('data-title'));
                case 'genre':
                    return a.getAttribute('data-genre').localeCompare(b.getAttribute('data-genre'));
                case 'room':
                    return a.getAttribute('data-room').localeCompare(b.getAttribute('data-room'));
                case 'time':
                    return a.getAttribute('data-time').localeCompare(b.getAttribute('data-time'));
                default: 
                    return 0;
            }
        });

        visibleMovies.forEach(movie => filmesGrid.appendChild(movie));

        resultsCount.textContent = visibleCount;

        if (visibleCount === 0) {
            noResults.style.display = 'flex';
            filmesGrid.style.display = 'none';
        } else {
            noResults.style.display = 'none';
            filmesGrid.style.display = 'grid';
        }
    }

    searchInput.addEventListener('input', filterAndSortMovies);
    filterGenre.addEventListener('change', filterAndSortMovies);
    filterSala.addEventListener('change', filterAndSortMovies);
    sortBy.addEventListener('change', filterAndSortMovies);

    clearFilters.addEventListener('click', function() {
        searchInput.value = '';
        filterGenre.value = '';
        filterSala.value = '';
        sortBy.value = 'recent';
        filterAndSortMovies();
    });

    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            viewButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const view = this.getAttribute('data-view');
            filmesGrid.className = view === 'list' ? 'filmes-list' : 'filmes-grid';
        });
    });

    window.confirmDelete = function(id, title) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const movieTitle = document.getElementById('movieToDelete');
        
        form.action = `/admin/filmes/${id}`;
        movieTitle.textContent = title;
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    };

    window.closeDeleteModal = function() {
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('show');
        document.body.style.overflow = '';
    };

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
});
</script>
@endsection
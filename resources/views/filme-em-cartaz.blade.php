@extends('template')

@section('title', 'Filmes em Cartaz & Programação - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/filmes.css') }}">
@endsection

@section('content')

<div class="filmes-page-wrapper">
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Programação & Filmes em Cartaz</h1>
            <p class="page-subtitle">Escolha o dia, o horário e garanta seus ingressos para a melhor experiência de cinema.</p>
        </div>
    </div>

    <!-- FILTERS & CALENDAR BAR -->
    <div class="filters-bar">
        <div class="container">
            <!-- SELETOR DE CALENDÁRIO & MÊS -->
            <div class="calendar-section">
                <div class="calendar-header-toolbar">
                    <div class="calendar-title-group">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Programação por Mês & Dia</span>
                    </div>

                    <div class="calendar-quick-actions">
                        <button class="btn-quick-date active" id="btnDateToday" onclick="selectQuickDate('today')">
                            <i class="fas fa-clock"></i> Hoje
                        </button>
                        <button class="btn-quick-date" id="btnDateTomorrow" onclick="selectQuickDate('tomorrow')">
                            Amanhã
                        </button>
                        <button class="btn-quick-date" id="btnDateWeekend" onclick="selectQuickDate('weekend')">
                            Fim de Semana
                        </button>
                        
                        <!-- CALENDÁRIO PICKER DE MÊS/DIA -->
                        <div class="custom-datepicker-control" title="Clique para escolher qualquer dia e mês">
                            <i class="fas fa-calendar-day"></i>
                            <input type="date" id="calendarPickerInput" onchange="onCustomDateSelect(this.value)">
                            <span id="selectedDateLabel">Escolher Data...</span>
                        </div>
                    </div>
                </div>

                <!-- RÉGUA DE DIAS DA SEMANA DINÂMICA -->
                <div class="days-container" id="daysCalendar">
                    <!-- Gerado dinamicamente via JS -->
                </div>
            </div>

            <!-- FILTROS ADICIONAIS & TOGGLE VIEW -->
            <div class="filters-wrapper">
                <div class="filter-left">
                    <div class="filter-group">
                        <span class="filter-label"><i class="fas fa-filter"></i> Gênero:</span>
                        <select class="filter-select" id="genreFilter" onchange="filterMovies()">
                            <option value="all">Todos os Gêneros</option>
                            <option value="Ação">Ação</option>
                            <option value="Terror">Terror</option>
                            <option value="Comédia">Comédia</option>
                            <option value="Animação">Animação</option>
                            <option value="Drama">Drama</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <span class="filter-label"><i class="fas fa-shield-alt"></i> Classificação:</span>
                        <select class="filter-select" id="ratingFilter" onchange="filterMovies()">
                            <option value="all">Todas as faixas</option>
                            <option value="L">Livre</option>
                            <option value="10">10 Anos</option>
                            <option value="12">12 Anos</option>
                            <option value="14">14 Anos</option>
                            <option value="16">16 Anos</option>
                        </select>
                    </div>
                </div>

                <div class="view-toggle">
                    <button class="toggle-btn active" id="btnListView" onclick="setViewMode('list')">
                        <i class="fas fa-list"></i> Lista
                    </button>
                    <button class="toggle-btn" id="btnGridView" onclick="setViewMode('grid')">
                        <i class="fas fa-th-large"></i> Grade
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- CATALOG CONTENT -->
    <div class="container">
        <div class="movies-list-container list-view" id="moviesListContainer">
            @php
                $hasMovies = isset($filmes) && count($filmes) > 0;
            @endphp

            @if($hasMovies)
                @foreach($filmes as $filme)
                    <article class="movie-catalog-card" data-genre="{{ $filme->genero }}" data-rating="{{ $filme->classificacao }}">
                        <div class="movie-catalog-poster">
                            <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}" onerror="this.src='{{ asset('img/Invocacao.jpg') }}'">
                        </div>
                        <div class="movie-catalog-details">
                            <div class="movie-catalog-header">
                                <h2 class="movie-catalog-title">{{ $filme->titulo }}</h2>
                                <span class="meta-badge">PG-{{ $filme->classificacao ?? '12' }}</span>
                            </div>

                            <div class="movie-catalog-meta">
                                <span><i class="fas fa-film"></i> {{ $filme->genero }}</span>
                                <span><i class="far fa-clock"></i> {{ $filme->duracao ?? '120' }} min</span>
                                <span><i class="fas fa-door-open"></i> Sala {{ $filme->sala ?? '01 Premium' }}</span>
                            </div>

                            <div class="movie-tech-badges">
                                <span class="tech-tag"><i class="fas fa-tv"></i> 4K Laser</span>
                                <span class="tech-tag"><i class="fas fa-volume-up"></i> Dolby Atmos</span>
                                <span class="tech-tag"><i class="fas fa-glasses"></i> 3D Available</span>
                            </div>

                            <p class="movie-catalog-synopsis">
                                {{ Str::limit($filme->descricao, 240) }}
                            </p>

                            <div class="sessions-section">
                                <div class="sessions-title">Horários Disponíveis (Sessões Hoje)</div>
                                <div class="sessions-buttons">
                                    @php
                                        $horarios = explode(',', $filme->horario ?? '14:30, 17:00, 19:30, 22:00');
                                    @endphp
                                    @foreach($horarios as $h)
                                        @php $hTrim = trim($h); @endphp
                                        <button class="btn-session" onclick="openTicketModal('{{ $filme->id }}', '{{ addslashes($filme->titulo) }}', '{{ asset('storage/' . $filme->imagem) }}', '{{ $hTrim }}', 'Sala {{ $filme->sala ?? '01' }}')">
                                            {{ $hTrim }}
                                            <span class="room">Sala {{ $filme->sala ?? '01' }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <!-- FULL DEFAULT PROGRAMMING LIST IF DB IS UNSEEDED -->
                <!-- MOVIE 1 -->
                <article class="movie-catalog-card" data-genre="Terror" data-rating="16">
                    <div class="movie-catalog-poster">
                        <img src="{{ asset('img/Invocacao.jpg') }}" alt="Invocação do Mal 4">
                    </div>
                    <div class="movie-catalog-details">
                        <div class="movie-catalog-header">
                            <h2 class="movie-catalog-title">Invocação do Mal 4: O Último Ritual</h2>
                            <span class="meta-badge">PG-16</span>
                        </div>

                        <div class="movie-catalog-meta">
                            <span><i class="fas fa-film"></i> Terror / Suspense</span>
                            <span><i class="far fa-clock"></i> 129 min</span>
                            <span><i class="fas fa-door-open"></i> Sala 01 VIP</span>
                        </div>

                        <div class="movie-tech-badges">
                            <span class="tech-tag"><i class="fas fa-tv"></i> 4K Laser</span>
                            <span class="tech-tag"><i class="fas fa-volume-up"></i> Dolby Atmos</span>
                            <span class="tech-tag"><i class="fas fa-couch"></i> Reclinável</span>
                        </div>

                        <p class="movie-catalog-synopsis">
                            Ed e Lorraine Warren encaram seu último e mais assustador caso investigando fenômenos paranormais aterrorizantes em uma propriedade isolada.
                        </p>

                        <div class="sessions-section">
                            <div class="sessions-title">Horários Disponíveis (Hoje)</div>
                            <div class="sessions-buttons">
                                <button class="btn-session" onclick="openTicketModal('m1', 'Invocação do Mal 4', '{{ asset('img/Invocacao.jpg') }}', '14:30', 'Sala 01 VIP')">
                                    14:30 <span class="room">Sala 01 VIP</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m1', 'Invocação do Mal 4', '{{ asset('img/Invocacao.jpg') }}', '17:15', 'Sala 01 VIP')">
                                    17:15 <span class="room">Sala 01 VIP</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m1', 'Invocação do Mal 4', '{{ asset('img/Invocacao.jpg') }}', '20:00', 'Sala 01 VIP')">
                                    20:00 <span class="room">Sala 01 VIP</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m1', 'Invocação do Mal 4', '{{ asset('img/Invocacao.jpg') }}', '22:30', 'Sala 01 VIP')">
                                    22:30 <span class="room">Sala 01 VIP</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- MOVIE 2 -->
                <article class="movie-catalog-card" data-genre="Ação" data-rating="12">
                    <div class="movie-catalog-poster">
                        <img src="{{ asset('img/superman.webp') }}" alt="Superman: Legacy">
                    </div>
                    <div class="movie-catalog-details">
                        <div class="movie-catalog-header">
                            <h2 class="movie-catalog-title">Superman: Legacy</h2>
                            <span class="meta-badge">PG-12</span>
                        </div>

                        <div class="movie-catalog-meta">
                            <span><i class="fas fa-film"></i> Ação / Aventura</span>
                            <span><i class="far fa-clock"></i> 142 min</span>
                            <span><i class="fas fa-door-open"></i> Sala 02 IMAX</span>
                        </div>

                        <div class="movie-tech-badges">
                            <span class="tech-tag"><i class="fas fa-tv"></i> IMAX 3D</span>
                            <span class="tech-tag"><i class="fas fa-volume-up"></i> Dolby Atmos</span>
                        </div>

                        <p class="movie-catalog-synopsis">
                            Superman tenta conciliar sua herança kryptoniana com sua criação humana em Metropolis enquanto novas ameaças colocam em risco o mundo.
                        </p>

                        <div class="sessions-section">
                            <div class="sessions-title">Horários Disponíveis (Hoje)</div>
                            <div class="sessions-buttons">
                                <button class="btn-session" onclick="openTicketModal('m2', 'Superman: Legacy', '{{ asset('img/superman.webp') }}', '15:00', 'Sala 02 IMAX')">
                                    15:00 <span class="room">Sala 02 IMAX</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m2', 'Superman: Legacy', '{{ asset('img/superman.webp') }}', '18:15', 'Sala 02 IMAX')">
                                    18:15 <span class="room">Sala 02 IMAX</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m2', 'Superman: Legacy', '{{ asset('img/superman.webp') }}', '21:30', 'Sala 02 IMAX')">
                                    21:30 <span class="room">Sala 02 IMAX</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- MOVIE 3 -->
                <article class="movie-catalog-card" data-genre="Ação" data-rating="12">
                    <div class="movie-catalog-poster">
                        <img src="{{ asset('img/quarteto.webp') }}" alt="Quarteto Fantástico">
                    </div>
                    <div class="movie-catalog-details">
                        <div class="movie-catalog-header">
                            <h2 class="movie-catalog-title">Quarteto Fantástico: Primeiros Passos</h2>
                            <span class="meta-badge">PG-12</span>
                        </div>

                        <div class="movie-catalog-meta">
                            <span><i class="fas fa-film"></i> Ação / Ficção Científica</span>
                            <span><i class="far fa-clock"></i> 135 min</span>
                            <span><i class="fas fa-door-open"></i> Sala 03 Premium</span>
                        </div>

                        <div class="movie-tech-badges">
                            <span class="tech-tag"><i class="fas fa-tv"></i> 4K Laser</span>
                            <span class="tech-tag"><i class="fas fa-glasses"></i> 3D</span>
                        </div>

                        <p class="movie-catalog-synopsis">
                            A primeira família da Marvel precisa unir forças para defender a Terra da ameaça de Galactus e seu enigmático arauto, o Surfista Prateado.
                        </p>

                        <div class="sessions-section">
                            <div class="sessions-title">Horários Disponíveis (Hoje)</div>
                            <div class="sessions-buttons">
                                <button class="btn-session" onclick="openTicketModal('m3', 'Quarteto Fantástico', '{{ asset('img/quarteto.webp') }}', '14:00', 'Sala 03 Premium')">
                                    14:00 <span class="room">Sala 03 Premium</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m3', 'Quarteto Fantástico', '{{ asset('img/quarteto.webp') }}', '16:45', 'Sala 03 Premium')">
                                    16:45 <span class="room">Sala 03 Premium</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m3', 'Quarteto Fantástico', '{{ asset('img/quarteto.webp') }}', '19:30', 'Sala 03 Premium')">
                                    19:30 <span class="room">Sala 03 Premium</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m3', 'Quarteto Fantástico', '{{ asset('img/quarteto.webp') }}', '22:15', 'Sala 03 Premium')">
                                    22:15 <span class="room">Sala 03 Premium</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- MOVIE 4 -->
                <article class="movie-catalog-card" data-genre="Comédia" data-rating="10">
                    <div class="movie-catalog-poster">
                        <img src="{{ asset('img/Rei_Feira.jpg') }}" alt="O Rei da Feira">
                    </div>
                    <div class="movie-catalog-details">
                        <div class="movie-catalog-header">
                            <h2 class="movie-catalog-title">O Rei da Feira</h2>
                            <span class="meta-badge">PG-10</span>
                        </div>

                        <div class="movie-catalog-meta">
                            <span><i class="fas fa-film"></i> Comédia Nacional</span>
                            <span><i class="far fa-clock"></i> 98 min</span>
                            <span><i class="fas fa-door-open"></i> Sala 04</span>
                        </div>

                        <div class="movie-tech-badges">
                            <span class="tech-tag"><i class="fas fa-tv"></i> 4K Laser</span>
                        </div>

                        <p class="movie-catalog-synopsis">
                            Uma comédia hilária sobre as confusões e rivalidades nas feiras livres mais movimentadas da cidade, recheada de humor e reviravoltas.
                        </p>

                        <div class="sessions-section">
                            <div class="sessions-title">Horários Disponíveis (Hoje)</div>
                            <div class="sessions-buttons">
                                <button class="btn-session" onclick="openTicketModal('m4', 'O Rei da Feira', '{{ asset('img/Rei_Feira.jpg') }}', '15:30', 'Sala 04')">
                                    15:30 <span class="room">Sala 04</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m4', 'O Rei da Feira', '{{ asset('img/Rei_Feira.jpg') }}', '17:45', 'Sala 04')">
                                    17:45 <span class="room">Sala 04</span>
                                </button>
                                <button class="btn-session" onclick="openTicketModal('m4', 'O Rei da Feira', '{{ asset('img/Rei_Feira.jpg') }}', '20:15', 'Sala 04')">
                                    20:15 <span class="room">Sala 04</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            @endif
        </div>
    </div>
</div>

<!-- MODAL SELEÇÃO DE INGRESSOS -->
<div class="modal-backdrop" id="ticketModalBackdrop">
    <div class="ticket-modal">
        <div class="modal-header">
            <div>
                <h3 id="modalMovieTitle">Título do Filme</h3>
                <span id="modalMovieMeta" style="font-size:0.8rem; opacity:0.85;">19:30 • Sala 01</span>
            </div>
            <button class="modal-close-btn" onclick="closeTicketModal()">&times;</button>
        </div>

        <div class="modal-body">
            <p style="font-size:0.85rem; color:var(--gray-500); margin-bottom:16px;">
                Selecione os tipos e quantidades de ingresso desejados:
            </p>

            <!-- INTEIRA -->
            <div class="ticket-option-row">
                <div>
                    <div class="ticket-name">Inteira</div>
                    <div class="ticket-desc">Ingresso comum individual</div>
                </div>
                <div style="display:flex; align-items:center; gap:16px;">
                    <div class="ticket-price">R$ 32,00</div>
                    <div class="qty-control">
                        <button class="qty-btn" onclick="changeQty('inteira', -1)">-</button>
                        <span class="qty-val" id="qty_inteira">0</span>
                        <button class="qty-btn" onclick="changeQty('inteira', 1)">+</button>
                    </div>
                </div>
            </div>

            <!-- MEIA ENTRADA -->
            <div class="ticket-option-row">
                <div>
                    <div class="ticket-name">Meia-Entrada</div>
                    <div class="ticket-desc">Estudantes, idosos e PCDs</div>
                </div>
                <div style="display:flex; align-items:center; gap:16px;">
                    <div class="ticket-price">R$ 16,00</div>
                    <div class="qty-control">
                        <button class="qty-btn" onclick="changeQty('meia', -1)">-</button>
                        <span class="qty-val" id="qty_meia">0</span>
                        <button class="qty-btn" onclick="changeQty('meia', 1)">+</button>
                    </div>
                </div>
            </div>

            <!-- PLANO CINEFILMS -->
            <div class="ticket-option-row">
                <div>
                    <div class="ticket-name">Plano CineFilms <i class="fas fa-crown" style="color:var(--accent);"></i></div>
                    <div class="ticket-desc">Exclusivo para assinantes de planos</div>
                </div>
                <div style="display:flex; align-items:center; gap:16px;">
                    <div class="ticket-price">R$ 22,00</div>
                    <div class="qty-control">
                        <button class="qty-btn" onclick="changeQty('plano', -1)">-</button>
                        <span class="qty-val" id="qty_plano">0</span>
                        <button class="qty-btn" onclick="changeQty('plano', 1)">+</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <div class="modal-total">
                Total: <span id="modalTotalPrice">R$ 0,00</span>
            </div>
            <button class="btn" style="background: #132e69; color: white; padding: 12px 24px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;" onclick="confirmAddToCart()">
                <i class="fas fa-cart-plus"></i> Adicionar ao Carrinho
            </button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    let activeMovie = null;
    let ticketQuantities = { inteira: 0, meia: 0, plano: 0 };
    const ticketPrices = { inteira: 32.00, meia: 16.00, plano: 22.00 };
    
    let currentDateSelected = new Date();

    const dayNames = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
    const monthNamesShort = ['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'];
    const monthNamesFull = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

    document.addEventListener('DOMContentLoaded', function() {
        renderCalendarStrip(currentDateSelected);
    });

    function renderCalendarStrip(baseDate) {
        const calendarContainer = document.getElementById('daysCalendar');
        if (!calendarContainer) return;

        calendarContainer.innerHTML = '';

        // Generate 7 consecutive days starting from baseDate
        for (let i = 0; i < 7; i++) {
            let d = new Date(baseDate);
            d.setDate(d.getDate() + i);

            let dayName = dayNames[d.getDay()];
            let dayNum = String(d.getDate()).padStart(2, '0');
            let monthShort = monthNamesShort[d.getMonth()];
            let fullDateStr = d.toISOString().split('T')[0];

            let card = document.createElement('div');
            card.className = `day-card ${i === 0 ? 'selected' : ''}`;
            card.dataset.date = fullDateStr;
            card.onclick = function() { selectDayCard(this, d); };

            card.innerHTML = `
                <span class="day-name">${dayName}</span>
                <span class="day-number">${dayNum}</span>
                <span class="day-month">${monthShort}</span>
            `;

            calendarContainer.appendChild(card);
        }

        // Update date label on picker
        updateDatePickerLabel(baseDate);
    }

    function selectDayCard(cardElement, dateObj) {
        document.querySelectorAll('.day-card').forEach(c => c.classList.remove('selected'));
        cardElement.classList.add('selected');

        currentDateSelected = dateObj;
        updateDatePickerLabel(dateObj);

        let dayFormatted = String(dateObj.getDate()).padStart(2, '0');
        let monthFormatted = monthNamesFull[dateObj.getMonth()];
        showToast(`Exibindo filmes para ${dayFormatted} de ${monthFormatted}`);
    }

    function updateDatePickerLabel(dateObj) {
        const label = document.getElementById('selectedDateLabel');
        const picker = document.getElementById('calendarPickerInput');
        
        let dateIso = dateObj.toISOString().split('T')[0];
        if (picker) picker.value = dateIso;

        if (label) {
            let dayNum = String(dateObj.getDate()).padStart(2, '0');
            let monthShort = monthNamesShort[dateObj.getMonth()];
            label.textContent = `${dayNum} ${monthShort} ${dateObj.getFullYear()}`;
        }
    }

    function onCustomDateSelect(dateValue) {
        if (!dateValue) return;
        let selectedDate = new Date(dateValue + 'T00:00:00');
        currentDateSelected = selectedDate;
        
        // Remove active class from quick buttons
        document.querySelectorAll('.btn-quick-date').forEach(btn => btn.classList.remove('active'));
        
        renderCalendarStrip(selectedDate);
        
        let dayNum = String(selectedDate.getDate()).padStart(2, '0');
        let monthName = monthNamesFull[selectedDate.getMonth()];
        showToast(`Calendário atualizado para ${dayNum} de ${monthName}`);
    }

    function selectQuickDate(type) {
        document.querySelectorAll('.btn-quick-date').forEach(btn => btn.classList.remove('active'));

        let targetDate = new Date();
        if (type === 'today') {
            document.getElementById('btnDateToday')?.classList.add('active');
        } else if (type === 'tomorrow') {
            document.getElementById('btnDateTomorrow')?.classList.add('active');
            targetDate.setDate(targetDate.getDate() + 1);
        } else if (type === 'weekend') {
            document.getElementById('btnDateWeekend')?.classList.add('active');
            let dayOfWeek = targetDate.getDay();
            let distanceToSaturday = (6 - dayOfWeek + 7) % 7;
            targetDate.setDate(targetDate.getDate() + distanceToSaturday);
        }

        currentDateSelected = targetDate;
        renderCalendarStrip(targetDate);
        
        let dayNum = String(targetDate.getDate()).padStart(2, '0');
        let monthName = monthNamesFull[targetDate.getMonth()];
        showToast(`Programação para ${dayNum} de ${monthName}`);
    }

    function setViewMode(mode) {
        const container = document.getElementById('moviesListContainer');
        const btnList = document.getElementById('btnListView');
        const btnGrid = document.getElementById('btnGridView');

        if (mode === 'grid') {
            container.className = 'movies-list-container grid-view';
            btnGrid.classList.add('active');
            btnList.classList.remove('active');
        } else {
            container.className = 'movies-list-container list-view';
            btnList.classList.add('active');
            btnGrid.classList.remove('active');
        }
    }

    function openTicketModal(id, title, poster, sessionTime, room) {
        activeMovie = { id, title, poster, sessionTime, room };
        ticketQuantities = { inteira: 0, meia: 0, plano: 0 };
        
        document.getElementById('modalMovieTitle').textContent = title;
        document.getElementById('modalMovieMeta').textContent = `${sessionTime} • ${room}`;
        
        updateModalUI();
        document.getElementById('ticketModalBackdrop').classList.add('active');
    }

    function closeTicketModal() {
        document.getElementById('ticketModalBackdrop').classList.remove('active');
    }

    function changeQty(type, delta) {
        ticketQuantities[type] = Math.max(0, ticketQuantities[type] + delta);
        updateModalUI();
    }

    function updateModalUI() {
        document.getElementById('qty_inteira').textContent = ticketQuantities.inteira;
        document.getElementById('qty_meia').textContent = ticketQuantities.meia;
        document.getElementById('qty_plano').textContent = ticketQuantities.plano;

        let total = (ticketQuantities.inteira * ticketPrices.inteira) +
                    (ticketQuantities.meia * ticketPrices.meia) +
                    (ticketQuantities.plano * ticketPrices.plano);

        document.getElementById('modalTotalPrice').textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
    }

    function confirmAddToCart() {
        const totalTickets = ticketQuantities.inteira + ticketQuantities.meia + ticketQuantities.plano;
        if (totalTickets === 0) {
            showToast('Por favor, selecione ao menos 1 ingresso.');
            return;
        }

        const typeLabels = { inteira: 'Inteira', meia: 'Meia-Entrada', plano: 'Plano CineFilms' };

        for (let type in ticketQuantities) {
            if (ticketQuantities[type] > 0) {
                addToCart({
                    id: `${activeMovie.id}_${type}_${activeMovie.sessionTime}`,
                    type: 'ticket',
                    category: typeLabels[type],
                    name: `${activeMovie.title} (${typeLabels[type]})`,
                    price: ticketPrices[type],
                    quantity: ticketQuantities[type],
                    session: activeMovie.sessionTime,
                    room: activeMovie.room,
                    image: activeMovie.poster
                });
            }
        }

        closeTicketModal();
    }

    function filterMovies() {
        const genre = document.getElementById('genreFilter').value;
        const rating = document.getElementById('ratingFilter').value;

        const cards = document.querySelectorAll('.movie-catalog-card');

        cards.forEach(card => {
            const cardGenre = card.dataset.genre || '';
            const cardRating = card.dataset.rating || '';

            const matchGenre = genre === 'all' || cardGenre.toLowerCase().includes(genre.toLowerCase());
            const matchRating = rating === 'all' || cardRating.toString() === rating.toString();

            card.style.display = (matchGenre && matchRating) ? (card.parentElement.classList.contains('grid-view') ? 'block' : 'grid') : 'none';
        });
    }
</script>
@endsection
@extends('template')

@section('title', 'Bombonière - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/bomboniere.css') }}">
@endsection

@section('content')

<div class="bomboniere-header">
    <div class="container">
        <h1 class="b-title">Bombonière CineFilms</h1>
        <p class="b-subtitle">Peça seus acompanhamentos e retire rapidamente sem filas ou receba diretamente na sua poltrona.</p>
        
        <!-- BANNER PROMOCIONAL -->
        <div class="b-hero-banner">
            <div class="banner-content">
                <span class="banner-tag"><i class="fas fa-bolt"></i> OPORTUNIDADE CINEFILMS</span>
                <h2>Peça Pelo App ou Site e Ganhe 15% OFF!</h2>
                <p>Evite filas no balcão principal. Escolha seus combos, pipocas e bebidas favoritos e retire no Express Counter com seu QR Code.</p>
            </div>
            <div class="banner-badge">
                <span>CÓDIGO:</span>
                <strong>PROMOPOP15</strong>
            </div>
        </div>
    </div>
</div>

<div class="container bomboniere-layout">
    
    <!-- ASIDE SIDEBAR DE SEÇÕES -->
    <aside class="bomboniere-sidebar">
        <div class="sidebar-card">
            <h3 class="sidebar-title"><i class="fas fa-list-ul"></i> Seções do Cardápio</h3>
            <ul class="sidebar-menu">
                <li>
                    <button class="sidebar-link active" data-category="all" onclick="filterCategory('all', this)">
                        <span><i class="fas fa-border-all"></i> Todos os Produtos</span>
                        <span class="sidebar-count">8</span>
                    </button>
                </li>
                <li>
                    <button class="sidebar-link" data-category="combos" onclick="filterCategory('combos', this)">
                        <span><i class="fas fa-boxes-packing"></i> Combos Promocionais</span>
                        <span class="sidebar-badge">PROMO</span>
                    </button>
                </li>
                <li>
                    <button class="sidebar-link" data-category="pipocas" onclick="filterCategory('pipocas', this)">
                        <span><i class="fas fa-popcorn"></i> Pipocas Gourmet</span>
                        <span class="sidebar-count">3</span>
                    </button>
                </li>
                <li>
                    <button class="sidebar-link" data-category="bebidas" onclick="filterCategory('bebidas', this)">
                        <span><i class="fas fa-glass-water"></i> Bebidas & Refrescos</span>
                        <span class="sidebar-count">1</span>
                    </button>
                </li>
                <li>
                    <button class="sidebar-link" data-category="doces" onclick="filterCategory('doces', this)">
                        <span><i class="fas fa-candy-cane"></i> Doces & Chocolates</span>
                        <span class="sidebar-count">1</span>
                    </button>
                </li>
            </ul>

            <div class="sidebar-info-box">
                <div class="info-icon"><i class="fas fa-bolt"></i></div>
                <div>
                    <h4>Retirada Rápida</h4>
                    <p>Apresente o comprovante digital na fila prioritária da Bombonière.</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- CONTENT GRID AREA -->
    <main class="bomboniere-main">

        <!-- COMBOS -->
        <section class="b-section" id="section-combos" data-cat="combos">
            <h2 class="b-category-title"><i class="fas fa-boxes-packing"></i> Combos Promocionais</h2>
            <div class="b-products-grid">
                
                <div class="b-product-card" data-category="combos">
                    <div class="b-card-badge promo">Mais Vendido</div>
                    <div class="b-product-img-wrapper">
                        <img src="{{ asset('img/bomboniere/combo_individual.png') }}" alt="Combo Individual">
                    </div>
                    <div class="b-card-body">
                        <h3 class="b-product-name">Combo Individual</h3>
                        <p class="b-product-desc">1 Pipoca Média Salgada quentinha + 1 Refrigerante 500ml de sua escolha.</p>
                        <div class="b-product-footer">
                            <div class="price-container">
                                <span class="b-product-price">R$ 25,00</span>
                            </div>
                            <button class="btn-add-cart" onclick="addBomboniereItem('combo_ind', 'Combo Individual', 25.00, 'Combo', '{{ asset('img/bomboniere/combo_individual.png') }}')">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="b-product-card" data-category="combos">
                    <div class="b-card-badge duo">Ideal para 2</div>
                    <div class="b-product-img-wrapper">
                        <img src="{{ asset('img/bomboniere/combo_duplo.png') }}" alt="Combo Duplo">
                    </div>
                    <div class="b-card-body">
                        <h3 class="b-product-name">Combo Duplo Especial</h3>
                        <p class="b-product-desc">1 Pipoca Grande Salgada + 2 Refrigerantes 700ml trincando de gelados.</p>
                        <div class="b-product-footer">
                            <div class="price-container">
                                <span class="b-product-price">R$ 42,00</span>
                            </div>
                            <button class="btn-add-cart" onclick="addBomboniereItem('combo_dup', 'Combo Duplo Especial', 42.00, 'Combo', '{{ asset('img/bomboniere/combo_duplo.png') }}')">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="b-product-card" data-category="combos">
                    <div class="b-card-badge vip">VIP Experience</div>
                    <div class="b-product-img-wrapper">
                        <img src="{{ asset('img/bomboniere/combo_vip.png') }}" alt="Combo VIP CineFilms">
                    </div>
                    <div class="b-card-body">
                        <h3 class="b-product-name">Combo CineFilms VIP</h3>
                        <p class="b-product-desc">1 Pipoca Gigante (Doce ou Salgada) + 2 Bebidas Grande + 1 Pacote Chocolate M&M's.</p>
                        <div class="b-product-footer">
                            <div class="price-container">
                                <span class="b-product-price">R$ 55,00</span>
                            </div>
                            <button class="btn-add-cart" onclick="addBomboniereItem('combo_vip', 'Combo CineFilms VIP', 55.00, 'Combo', '{{ asset('img/bomboniere/combo_vip.png') }}')">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- PIPOCAS -->
        <section class="b-section" id="section-pipocas" data-cat="pipocas">
            <h2 class="b-category-title"><i class="fas fa-popcorn"></i> Pipocas Gourmet</h2>
            <div class="b-products-grid">
                
                <div class="b-product-card" data-category="pipocas">
                    <div class="b-product-img-wrapper">
                        <img src="{{ asset('img/bomboniere/pipoca_salgada.png') }}" alt="Pipoca Salgada Média">
                    </div>
                    <div class="b-card-body">
                        <h3 class="b-product-name">Pipoca Salgada Clássica</h3>
                        <p class="b-product-desc">Pipoca crocantíssima preparada com milho selecionado e manteiga especial.</p>
                        <div class="b-product-footer">
                            <div class="price-container">
                                <span class="b-product-price">R$ 16,00</span>
                            </div>
                            <button class="btn-add-cart" onclick="addBomboniereItem('pip_salg_m', 'Pipoca Salgada Clássica', 16.00, 'Pipoca', '{{ asset('img/bomboniere/pipoca_salgada.png') }}')">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="b-product-card" data-category="pipocas">
                    <div class="b-card-badge gourmet">Gourmet</div>
                    <div class="b-product-img-wrapper">
                        <img src="{{ asset('img/bomboniere/pipoca_ninho.png') }}" alt="Pipoca Doce Leite Ninho">
                    </div>
                    <div class="b-card-body">
                        <h3 class="b-product-name">Pipoca Doce de Leite Ninho</h3>
                        <p class="b-product-desc">Pipoca artesanal coberta com generosa calda de Leite Ninho e chocolate branco.</p>
                        <div class="b-product-footer">
                            <div class="price-container">
                                <span class="b-product-price">R$ 22,00</span>
                            </div>
                            <button class="btn-add-cart" onclick="addBomboniereItem('pip_ninho', 'Pipoca Doce Leite Ninho', 22.00, 'Pipoca', '{{ asset('img/bomboniere/pipoca_ninho.png') }}')">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="b-product-card" data-category="pipocas">
                    <div class="b-card-badge gourmet">Gourmet</div>
                    <div class="b-product-img-wrapper">
                        <img src="{{ asset('img/bomboniere/pipoca_caramelo.png') }}" alt="Pipoca Caramelizada">
                    </div>
                    <div class="b-card-body">
                        <h3 class="b-product-name">Pipoca Caramelizada Crisp</h3>
                        <p class="b-product-desc">Pipoca crocante envolvida com autêntico caramelo artesanal dourado.</p>
                        <div class="b-product-footer">
                            <div class="price-container">
                                <span class="b-product-price">R$ 20,00</span>
                            </div>
                            <button class="btn-add-cart" onclick="addBomboniereItem('pip_caramelo', 'Pipoca Caramelizada', 20.00, 'Pipoca', '{{ asset('img/bomboniere/pipoca_caramelo.png') }}')">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- BEBIDAS -->
        <section class="b-section" id="section-bebidas" data-cat="bebidas">
            <h2 class="b-category-title"><i class="fas fa-glass-water"></i> Bebidas & Refrescos</h2>
            <div class="b-products-grid">
                
                <div class="b-product-card" data-category="bebidas">
                    <div class="b-product-img-wrapper">
                        <img src="{{ asset('img/bomboniere/refrigerante.png') }}" alt="Refrigerante 700ml">
                    </div>
                    <div class="b-card-body">
                        <h3 class="b-product-name">Refrigerante 700ml Ice</h3>
                        <p class="b-product-desc">Escolha na retirada: Coca-Cola, Guaraná Antarctica, Fanta Laranja ou Sprite.</p>
                        <div class="b-product-footer">
                            <div class="price-container">
                                <span class="b-product-price">R$ 12,00</span>
                            </div>
                            <button class="btn-add-cart" onclick="addBomboniereItem('refri_700', 'Refrigerante 700ml', 12.00, 'Bebida', '{{ asset('img/bomboniere/refrigerante.png') }}')">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- DOCES -->
        <section class="b-section" id="section-doces" data-cat="doces">
            <h2 class="b-category-title"><i class="fas fa-candy-cane"></i> Doces & Chocolates</h2>
            <div class="b-products-grid">
                
                <div class="b-product-card" data-category="doces">
                    <div class="b-product-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1581798459219-318e76aecc7b?auto=format&fit=crop&w=600&q=80" alt="Chocolate M&M's 200g">
                    </div>
                    <div class="b-card-body">
                        <h3 class="b-product-name">Chocolate M&M's 200g</h3>
                        <p class="b-product-desc">Disponível em Amendoim Crocante ou Chocolate ao Leite tradicional.</p>
                        <div class="b-product-footer">
                            <div class="price-container">
                                <span class="b-product-price">R$ 14,00</span>
                            </div>
                            <button class="btn-add-cart" onclick="addBomboniereItem('mm_200g', 'Chocolate M&M\'s 200g', 14.00, 'Doce', 'https://images.unsplash.com/photo-1581798459219-318e76aecc7b?auto=format&fit=crop&w=600&q=80')">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

</div>

@endsection

@section('scripts')
<script>
    function addBomboniereItem(id, name, price, category, image) {
        addToCart({
            id: `bomb_${id}`,
            type: 'bomboniere',
            category: category,
            name: name,
            price: price,
            quantity: 1,
            image: image || ''
        });
    }

    function filterCategory(category, button) {
        // Highlight active sidebar button
        document.querySelectorAll('.sidebar-link').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        // Show/hide sections or cards
        const sections = document.querySelectorAll('.b-section');
        sections.forEach(section => {
            if (category === 'all' || section.dataset.cat === category) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });
    }
</script>
@endsection


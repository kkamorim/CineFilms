@extends('template')

@section('title', 'Seu Carrinho - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/carrinho.css') }}">
@endsection

@section('content')

<div class="cart-header">
    <div class="container">
        <h1 class="cart-title">Carrinho de Compras</h1>
        <p class="cart-subtitle">Revise seus ingressos e acompanhamentos da bombonière antes de finalizar.</p>
    </div>
</div>

<div class="container cart-container">
    <div id="cartContent">
        <!-- JS RENDER -->
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', renderCartUI);

    function renderCartUI() {
        const cart = getCart();
        const container = document.getElementById('cartContent');

        if (cart.length === 0) {
            container.innerHTML = `
                <div class="cart-empty-state">
                    <div class="cart-empty-icon"><i class="fas fa-shopping-bag"></i></div>
                    <h3>Seu carrinho está vazio</h3>
                    <p>Você ainda não adicionou nenhum ingresso ou item da bombonière.</p>
                    <a href="{{ route('filme-em-cartaz') }}" class="btn btn-primary">
                        <i class="fas fa-film"></i> Ver Filmes em Cartaz
                    </a>
                </div>
            `;
            return;
        }

        let subtotal = 0;

        let rowsHtml = cart.map((item, index) => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;

            const categoryBadge = item.category ? `<span style="font-size:0.75rem; background:var(--primary-subtle); color:var(--primary-light); padding:2px 8px; border-radius:4px; font-weight:600;">${item.category}</span>` : '';
            const sessionInfo = item.session ? `<p style="font-size:0.8rem; color:var(--gray-500);"><i class="far fa-clock"></i> ${item.session} • ${item.room || ''}</p>` : '';

            return `
                <div class="cart-item-row">
                    <img src="${item.image || '{{ asset('img/filme1.png') }}'}" class="cart-item-img" alt="${item.name}" onerror="this.src='{{ asset('img/filme1.png') }}'">
                    <div class="cart-item-info">
                        <h4>${item.name}</h4>
                        ${sessionInfo}
                        ${categoryBadge}
                    </div>
                    <div class="cart-item-qty">
                        <button class="cart-qty-btn" onclick="updateCartItemQty(${index}, -1)">-</button>
                        <span style="font-weight:700; width:20px; text-align:center;">${item.quantity}</span>
                        <button class="cart-qty-btn" onclick="updateCartItemQty(${index}, 1)">+</button>
                    </div>
                    <div class="cart-item-price">R$ ${itemTotal.toFixed(2).replace('.', ',')}</div>
                    <button class="cart-item-remove" onclick="removeCartItem(${index})" title="Remover"><i class="fas fa-trash-alt"></i></button>
                </div>
            `;
        }).join('');

        container.innerHTML = `
            <div class="cart-grid">
                <div class="cart-items-wrapper">
                    ${rowsHtml}
                </div>
                <div class="cart-summary-card">
                    <h3 class="summary-title">Resumo do Pedido</h3>
                    <div class="summary-row">
                        <span>Subtotal (${cart.reduce((sum, i) => sum + i.quantity, 0)} itens)</span>
                        <span>R$ ${subtotal.toFixed(2).replace('.', ',')}</span>
                    </div>
                    <div class="summary-row">
                        <span>Taxa de Serviço Online</span>
                        <span style="color:var(--success); font-weight:600;">Grátis</span>
                    </div>
                    <div class="summary-total">
                        <span>Total</span>
                        <span>R$ ${subtotal.toFixed(2).replace('.', ',')}</span>
                    </div>
                    <button class="btn-checkout" onclick="checkout()">
                        <i class="fas fa-lock"></i> Finalizar Compra
                    </button>
                </div>
            </div>
        `;
    }

    function updateCartItemQty(index, delta) {
        let cart = getCart();
        cart[index].quantity += delta;
        if (cart[index].quantity <= 0) {
            cart.splice(index, 1);
        }
        saveCart(cart);
        renderCartUI();
    }

    function removeCartItem(index) {
        let cart = getCart();
        cart.splice(index, 1);
        saveCart(cart);
        renderCartUI();
    }

    function checkout() {
        const cart = getCart();
        if (!cart || cart.length === 0) {
            showToast('Seu carrinho está vazio!');
            return;
        }

        @auth
            window.location.href = "{{ route('checkout') }}";
        @else
            showToast('Faça login para prosseguir para o pagamento.');
            setTimeout(() => {
                window.location.href = "{{ route('login') }}";
            }, 1000);
        @endauth
    }
</script>
@endsection

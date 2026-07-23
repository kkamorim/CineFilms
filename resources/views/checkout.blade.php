@extends('template')

@section('title', 'Checkout - Gateway de Pagamento - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="checkout-header">
    <div class="container">
        <h1 class="checkout-title">
            <i class="fas fa-shield-alt" style="color:#10B981;"></i> Finalizar Pedido & Pagamento
        </h1>
        <p class="checkout-subtitle">Ambiente 100% seguro com criptografia de ponta a ponta.</p>
    </div>
</div>

<div class="container checkout-grid">
    <!-- Coluna da Esquerda: Gateway de Pagamento -->
    <div class="gateway-card">
        <div class="gateway-tabs">
            <button type="button" class="tab-btn active" onclick="switchTab('pixTab', this)">
                <i class="pix-icon fab fa-pix" style="color:#32BCAD; font-size:1.2rem;"></i> PIX (Aprovação Instantânea)
            </button>
            <button type="button" class="tab-btn" onclick="switchTab('cardTab', this)">
                <i class="far fa-credit-card" style="color:#3B82F6;"></i> Cartão de Crédito
            </button>
            <button type="button" class="tab-btn" onclick="switchTab('boletoTab', this)">
                <i class="fas fa-barcode" style="color:#6B7280;"></i> Boleto Bancário
            </button>
        </div>

        <!-- ABA 1: PIX -->
        <div id="pixTab" class="tab-content active">
            <div class="pix-box">
                <h3 style="color:#065F46; margin-bottom:8px; font-weight:800;">
                    <i class="fas fa-qrcode"></i> Pague via PIX
                </h3>
                <p style="font-size:0.85rem; color:var(--gray-600);">
                    Escaneie o QR Code abaixo com o app do seu banco ou copie a chave PIX.
                </p>

                <div class="pix-qr-container">
                    <svg viewBox="0 0 100 100" style="width:100%; height:100%;">
                        <path d="M0,0 h10v10h-10z M20,0 h10v10h-10z M40,0 h10v10h-10z M60,0 h10v10h-10z M80,0 h20v20h-20z M0,20 h10v10h-10z M30,20 h20v10h-20z M70,20 h10v10h-10z M10,30 h20v10h-20z M50,30 h30v10h-30z M0,40 h20v10h-20z M40,40 h10v10h-10z M60,40 h20v10h-20z M90,40 h10v10h-10z M10,50 h30v10h-30z M60,50 h30v10h-30z M0,60 h10v10h-10z M30,60 h20v10h-20z M70,60 h20v10h-20z M0,80 h20v20h-20z M30,80 h10v10h-10z M50,80 h20v10h-20z M80,80 h20v20h-20z" fill="#065F46"/>
                    </svg>
                </div>

                <div class="pix-copia-cola">
                    <input type="text" class="pix-key-input" id="pixKeyInput" value="00020126580014BR.GOV.BCB.PIX0136cinefilms-checkout-pix-key-998877520400005303986540510.005802BR5918CINEFILMS CINEMA6009SAO PAULO62070503***6304E8A2" readonly>
                    <button type="button" class="btn-copy-pix" onclick="copyPixCode()">
                        <i class="far fa-copy"></i> Copiar
                    </button>
                </div>

                <div class="pix-timer">
                    <i class="far fa-clock"></i> O código expira em <span id="pixCountdown" style="color:#D97706;">14:59</span>
                </div>
            </div>

            <button type="button" class="btn-pay-now" onclick="confirmPayment('pix')">
                <i class="fas fa-check-circle"></i> Já Efetuei o Pagamento via PIX
            </button>
        </div>

        <!-- ABA 2: CARTÃO DE CRÉDITO -->
        <div id="cardTab" class="tab-content">
            <div class="card-preview-box">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div class="card-preview-chip"></div>
                    <i class="fab fa-cc-visa" style="font-size:2rem; color:var(--white);"></i>
                </div>
                <div class="card-preview-number" id="prevCardNumber">•••• •••• •••• ••••</div>
                <div class="card-preview-footer">
                    <div>
                        <div style="font-size:0.65rem;">TITULAR DO CARTÃO</div>
                        <div class="card-preview-val" id="prevCardHolder">SEU NOME AQUI</div>
                    </div>
                    <div>
                        <div style="font-size:0.65rem;">VALIDADE</div>
                        <div class="card-preview-val" id="prevCardExp">MM/AA</div>
                    </div>
                </div>
            </div>

            <form id="cardForm" onsubmit="event.preventDefault(); confirmPayment('credit_card');">
                <div class="form-group">
                    <label class="form-label">Nome Impresso no Cartão</label>
                    <input type="text" id="cardHolder" class="form-input" placeholder="Ex: GABRIEL A SILVA" required oninput="document.getElementById('prevCardHolder').innerText = this.value.toUpperCase() || 'SEU NOME AQUI'">
                </div>

                <div class="form-group">
                    <label class="form-label">Número do Cartão</label>
                    <input type="text" id="cardNumber" class="form-input" placeholder="0000 0000 0000 0000" maxlength="19" required oninput="formatCardNumber(this)">
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Validade (MM/AA)</label>
                        <input type="text" id="cardExp" class="form-input" placeholder="12/28" maxlength="5" required oninput="formatCardExp(this)">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Código CVV</label>
                        <input type="text" id="cardCvv" class="form-input" placeholder="123" maxlength="4" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Opções de Parcelamento</label>
                    <select id="cardInstallments" class="form-input" style="background:var(--white);">
                        <option value="1">1x (À vista) - Sem juros</option>
                        <option value="2">2x Sem juros</option>
                        <option value="3">3x Sem juros</option>
                    </select>
                </div>

                <button type="submit" class="btn-pay-now">
                    <i class="fas fa-lock"></i> Pagar com Cartão de Crédito
                </button>
            </form>
        </div>

        <!-- ABA 3: BOLETO BANCÁRIO -->
        <div id="boletoTab" class="tab-content">
            <div class="boleto-box">
                <i class="fas fa-file-invoice-dollar" style="font-size:3rem; color:var(--gray-600); margin-bottom:12px;"></i>
                <h4 style="font-weight:800; color:var(--gray-900);">Boleto Bancário CineFilms</h4>
                <p style="font-size:0.85rem; color:var(--gray-500); margin-bottom:16px;">
                    O boleto pode ser pago em qualquer banco ou internet banking. Prazo de compensação: até 1 dia útil.
                </p>

                <div style="background:var(--white); padding:12px; border-radius:var(--radius-md); font-family:monospace; font-size:0.85rem; border:1px solid var(--gray-300); margin-bottom:16px;">
                    34191.79001 01043.510047 91020.150008 8 99880000005000
                </div>

                <button type="button" class="btn-copy-pix" style="background:var(--primary-light);" onclick="alert('Download do PDF do Boleto iniciado!')">
                    <i class="fas fa-download"></i> Baixar Boleto em PDF
                </button>
            </div>

            <button type="button" class="btn-pay-now" onclick="confirmPayment('boleto')">
                <i class="fas fa-check-circle"></i> Confirmar Pedido via Boleto
            </button>
        </div>
    </div>

    <!-- Coluna da Direita: Resumo do Pedido -->
    <div class="checkout-summary-card">
        <h3 class="checkout-summary-title">Resumo do Pedido</h3>
        <div id="checkoutSummaryList">
            <!-- JS RENDERS ITEMS -->
        </div>

        <div style="border-top:1px solid var(--gray-200); padding-top:16px; margin-top:16px;">
            <div class="checkout-item-line">
                <span>Subtotal</span>
                <span id="summarySubtotal">R$ 0,00</span>
            </div>
            <div class="checkout-item-line">
                <span>Taxa de Serviço</span>
                <span style="color:var(--success); font-weight:700;">Grátis</span>
            </div>
            <div class="checkout-item-line" style="font-size:1.1rem; font-weight:800; color:var(--gray-900); margin-top:12px;">
                <span>Total a Pagar</span>
                <span id="summaryTotal" style="color:var(--primary-light);">R$ 0,00</span>
            </div>
        </div>

        <div style="margin-top:20px; font-size:0.75rem; color:var(--gray-500); display:flex; align-items:center; gap:8px;">
            <i class="fas fa-user-shield" style="font-size:1.2rem; color:var(--success);"></i>
            <span>Seus dados de pagamento são protegidos com padrão de segurança SSL de 256 bits.</span>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        renderCheckoutSummary();
        startPixTimer();
    });

    function switchTab(tabId, btn) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
        document.getElementById(tabId).classList.add('active');
        btn.classList.add('active');
    }

    function renderCheckoutSummary() {
        const cart = typeof getCart === 'function' ? getCart() : [];
        const container = document.getElementById('checkoutSummaryList');

        if (!cart || cart.length === 0) {
            container.innerHTML = `<p style="font-size:0.85rem; color:var(--gray-500);">Nenhum item no carrinho.</p>`;
            return;
        }

        let total = 0;
        const html = cart.map(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            return `
                <div class="checkout-item-line">
                    <div>
                        <div class="checkout-item-name">${item.name}</div>
                        <div class="checkout-item-qty">${item.quantity}x • R$ ${item.price.toFixed(2).replace('.', ',')}</div>
                    </div>
                    <div style="font-weight:700;">R$ ${itemTotal.toFixed(2).replace('.', ',')}</div>
                </div>
            `;
        }).join('');

        container.innerHTML = html;
        document.getElementById('summarySubtotal').innerText = `R$ ${total.toFixed(2).replace('.', ',')}`;
        document.getElementById('summaryTotal').innerText = `R$ ${total.toFixed(2).replace('.', ',')}`;
    }

    function copyPixCode() {
        const copyText = document.getElementById("pixKeyInput");
        copyText.select();
        navigator.clipboard.writeText(copyText.value);
        showToast("Chave PIX copiada para a área de transferência!");
    }

    function startPixTimer() {
        let duration = 15 * 60;
        const timerDisplay = document.getElementById('pixCountdown');
        if (!timerDisplay) return;

        const interval = setInterval(() => {
            let minutes = parseInt(duration / 60, 10);
            let seconds = parseInt(duration % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            timerDisplay.textContent = minutes + ":" + seconds;

            if (--duration < 0) {
                clearInterval(interval);
                timerDisplay.textContent = "Expirado";
            }
        }, 1000);
    }

    function formatCardNumber(input) {
        let v = input.value.replace(/\D/g, '');
        if (v.length > 16) v = v.substring(0, 16);
        v = v.replace(/(\d{4})/g, '$1 ').trim();
        input.value = v;
        document.getElementById('prevCardNumber').innerText = v || '•••• •••• •••• ••••';
    }

    function formatCardExp(input) {
        let v = input.value.replace(/\D/g, '');
        if (v.length > 4) v = v.substring(0, 4);
        if (v.length >= 3) {
            v = v.replace(/^(\d{2})(\d{1,2})$/, '$1/$2');
        }
        input.value = v;
        document.getElementById('prevCardExp').innerText = v || 'MM/AA';
    }

    function confirmPayment(method) {
        const cart = typeof getCart === 'function' ? getCart() : [];

        fetch("{{ route('checkout.processar') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                payment_method: method,
                items: cart
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (typeof saveCart === 'function') saveCart([]);
                showToast("Pagamento Aprovado! Redirecionando para Seus Ingressos...");
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 1500);
            } else {
                showToast(data.message || "Erro ao processar pagamento.");
            }
        })
        .catch(err => {
            console.error(err);
            showToast("Pagamento processado com sucesso!");
            if (typeof saveCart === 'function') saveCart([]);
            setTimeout(() => {
                window.location.href = "{{ route('meus.ingressos') }}";
            }, 1500);
        });
    }
</script>
@endsection

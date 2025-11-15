@extends('template')

@section('title', 'Contato - Cinefilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/contato.css') }}">
@endsection

@section('content')

<!-- HERO CONTATO -->
<section class="contact-hero">
    <div class="hero-bg-contact">
        <div class="hero-overlay-contact"></div>
    </div>
    <div class="hero-content-contact">
        <div class="hero-badge-contact">
            <i class="fas fa-envelope"></i>
            <span>Entre em Contato</span>
        </div>
        <h1 class="hero-title-contact">Fale Conosco</h1>
        <p class="hero-subtitle-contact">
            Estamos aqui para ajudar! Envie sua mensagem e responderemos em breve.
        </p>
    </div>
</section>

<!-- CONTATO SECTION -->
<section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">
            
            <!-- INFORMAÇÕES DE CONTATO -->
            <div class="contact-info-side">
                <div class="info-header">
                    <h2>Informações de Contato</h2>
                    <p>Escolha a melhor forma de nos contatar</p>
                </div>

                <div class="contact-methods">
                    <div class="method-card">
                        <div class="method-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                <div class="method-info">
                            <h3>Telefone</h3>
                            <p>(19) 3251-1234</p>
                            <span class="method-time">Seg - Sex, 9h às 18h</span>
                        </div>
                    </div>

                    <div class="method-card">
                        <div class="method-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="method-info">
                            <h3>E-mail</h3>
                            <p>contato@cinefilms.com.br</p>
                            <span class="method-time">Resposta em até 24h</span>
                        </div>
                    </div>

                    <div class="method-card">
                        <div class="method-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="method-info">
                            <h3>Endereço</h3>
                            <p>Av. Principal, 1000</p>
                            <span class="method-time">Campinas, SP</span>
                        </div>
                    </div>

                    <div class="method-card">
                        <div class="method-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="method-info">
                            <h3>Horário de Atendimento</h3>
                            <p>Segunda a Domingo</p>
                            <span class="method-time">10h às 23h</span>
                        </div>
                    </div>
                </div>

                <div class="social-contact">
                    <h3>Redes Sociais</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon-link facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon-link instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon-link twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon-link youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- FORMULÁRIO -->
            <div class="contact-form-side">
                <div class="form-header-contact">
                    <h2>Envie sua Mensagem</h2>
                    <p>Preencha o formulário abaixo e entraremos em contato</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success" id="successAlert">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                        <button class="alert-close" onclick="closeAlert('successAlert')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error" id="errorAlert">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ session('error') }}</span>
                        <button class="alert-close" onclick="closeAlert('errorAlert')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <form action="/contato" method="POST" class="contact-form" id="contactForm">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group-contact">
                            <label for="nome" class="form-label-contact">
                                <i class="fas fa-user"></i>
                                Nome Completo
                            </label>
                            <input 
                                type="text" 
                                id="nome"
                                name="nome" 
                                class="form-input-contact" 
                                placeholder="Digite seu nome completo"
                                required
                            >
                            @error('nome')
                                <span class="error-message">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group-contact">
                            <label for="email" class="form-label-contact">
                                <i class="fas fa-envelope"></i>
                                E-mail
                            </label>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                class="form-input-contact" 
                                placeholder="seu@email.com"
                                required
                            >
                            @error('email')
                                <span class="error-message">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group-contact">
                        <label for="assunto" class="form-label-contact">
                            <i class="fas fa-tag"></i>
                            Assunto
                        </label>
                        <select 
                            id="assunto"
                            name="assunto" 
                            class="form-select-contact"
                            required
                        >
                            <option value="">Selecione um assunto</option>
                            <option value="duvida">Dúvida</option>
                            <option value="sugestao">Sugestão</option>
                            <option value="reclamacao">Reclamação</option>
                            <option value="elogio">Elogio</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>

                    <div class="form-group-contact">
                        <label for="mensagem" class="form-label-contact">
                            <i class="fas fa-comment-dots"></i>
                            Mensagem
                        </label>
                        <textarea 
                            id="mensagem"
                            name="mensagem" 
                            class="form-textarea-contact" 
                            placeholder="Escreva sua mensagem aqui..."
                            rows="6"
                            required
                        ></textarea>
                        <span class="char-count">
                            <span id="charCount">0</span>/500 caracteres
                        </span>
                        @error('mensagem')
                            <span class="error-message">
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-privacy">
                        <label class="checkbox-label-contact">
                            <input type="checkbox" name="privacy" required>
                            <span class="checkbox-custom-contact"></span>
                            <span>
                                Li e concordo com a 
                                <a href="#">Política de Privacidade</a>
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="btn-submit-contact" id="submitBtnContact">
                        <span class="btn-text-contact">Enviar Mensagem</span>
                        <i class="fas fa-paper-plane btn-icon-contact"></i>
                        <div class="btn-loader-contact"></div>
                    </button>
                </form>

                <div class="form-footer-contact">
                    <i class="fas fa-shield-alt"></i>
                    <p>Suas informações estão seguras conosco</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ RÁPIDO -->
<section class="faq-quick">
    <div class="container">
        <div class="faq-header">
            <h2>Perguntas Frequentes</h2>
            <p>Talvez sua dúvida já esteja respondida aqui</p>
        </div>

        <div class="faq-grid">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <h3>Como compro ingressos online?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Acesse a página "Em Cartaz", escolha o filme, horário e poltronas. Finalize o pagamento e receba seu ingresso digital por e-mail.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <h3>Posso cancelar ou trocar meu ingresso?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Sim! Você pode cancelar ou trocar seu ingresso até 2 horas antes da sessão através do seu perfil ou entrando em contato conosco.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <h3>Qual o horário de funcionamento?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Funcionamos de segunda a domingo, das 10h às 23h. As sessões variam conforme a programação de cada dia.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <h3>Vocês têm estacionamento?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Sim! Oferecemos estacionamento gratuito para nossos clientes com mais de 500 vagas disponíveis.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODAL DE SUCESSO -->
<div class="modal-overlay" id="contactSuccessModal">
    <div class="modal-content success">
        <button class="modal-close" onclick="closeModal()">
            <i class="fas fa-times"></i>
        </button>
        <div class="modal-icon-contact">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3 class="modal-title-contact">Mensagem Enviada!</h3>
        <p class="modal-text-contact">
            Obrigado pelo contato! Recebemos sua mensagem e responderemos em breve.
        </p>
        <div class="modal-info">
            <i class="fas fa-info-circle"></i>
            <span>Tempo médio de resposta: 24 horas</span>
        </div>
        <button class="btn-modal-ok" onclick="closeModal()">
            Entendi
        </button>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== CONTADOR DE CARACTERES =====
    const mensagemTextarea = document.getElementById('mensagem');
    const charCount = document.getElementById('charCount');
    
    if (mensagemTextarea && charCount) {
        mensagemTextarea.addEventListener('input', function() {
            const count = this.value.length;
            charCount.textContent = count;
            
            if (count > 500) {
                this.value = this.value.substring(0, 500);
                charCount.textContent = 500;
            }
        });
    }

    // ===== CLOSE ALERT =====
    window.closeAlert = function(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }
    };

    // ===== AUTO CLOSE ALERTS =====
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            if (alert) closeAlert(alert.id);
        });
    }, 5000);

    // ===== FORM SUBMIT =====
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtnContact');
    
    form?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        // Simular envio (remover em produção)
        setTimeout(() => {
            // Enviar formulário
            this.submit();
            
            // Mostrar modal (caso queira usar JavaScript ao invés de redirect)
            // showModal();
            // submitBtn.classList.remove('loading');
            // submitBtn.disabled = false;
            // form.reset();
        }, 1500);
    });

    // ===== TOGGLE FAQ =====
    window.toggleFaq = function(element) {
        const faqItem = element.parentElement;
        const answer = faqItem.querySelector('.faq-answer');
        const icon = element.querySelector('i');
        
        // Fechar outros
        document.querySelectorAll('.faq-item').forEach(item => {
            if (item !== faqItem) {
                item.classList.remove('active');
                item.querySelector('.faq-answer').style.maxHeight = null;
                item.querySelector('.faq-question i').style.transform = 'rotate(0deg)';
            }
        });
        
        // Toggle atual
        faqItem.classList.toggle('active');
        
        if (faqItem.classList.contains('active')) {
            answer.style.maxHeight = answer.scrollHeight + 'px';
            icon.style.transform = 'rotate(180deg)';
        } else {
            answer.style.maxHeight = null;
            icon.style.transform = 'rotate(0deg)';
        }
    };

    // ===== MODAL FUNCTIONS =====
    window.showModal = function() {
        const modal = document.getElementById('contactSuccessModal');
        if (modal) {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    };

    window.closeModal = function() {
        const modal = document.getElementById('contactSuccessModal');
        if (modal) {
            modal.classList.remove('show');
            document.body.style.overflow = '';
        }
    };

    // Mostrar modal se houver sucesso
    @if(session('success'))
        setTimeout(() => showModal(), 500);
    @endif

    // ===== INPUT ANIMATION =====
    const inputs = document.querySelectorAll('.form-input-contact, .form-textarea-contact, .form-select-contact');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
        
        // Verificar se já tem valor
        if (input.value) {
            input.parentElement.classList.add('focused');
        }
    });
});
</script>
@endsection        
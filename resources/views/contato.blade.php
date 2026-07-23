@extends('template')

@section('title', 'Contato - CineFilms')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/contato.css') }}">
@endsection

@section('content')

<div class="contact-auth-page">
    <div class="container contact-wrapper">

        <!-- HEADER BANNER INSIDE PAGE WRAPPER -->
        <div class="contact-card-header">
            <div class="contact-logo-icon">
                <i class="fas fa-headset"></i>
            </div>
            <h1 class="c-title">Fale Conosco</h1>
            <p class="c-subtitle">Estamos prontos para atender você. Tire suas dúvidas, envie sugestões ou suporte aos ingressos.</p>
        </div>

        <div class="contact-grid">
            <!-- CANAIS DE ATENDIMENTO -->
            <div class="contact-info-card">
                <div class="info-card-header">
                    <div class="info-badge-icon"><i class="fas fa-comments"></i></div>
                    <h3>Canais de Atendimento</h3>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="info-details">
                        <h4>Telefone & WhatsApp</h4>
                        <p><a href="tel:1932511234">(19) 3251-1234</a></p>
                        <span class="info-subtext">Segunda a Domingo, das 10h às 22h</span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-details">
                        <h4>E-mail Oficial</h4>
                        <p><a href="mailto:contato@cinefilms.com.br">contato@cinefilms.com.br</a></p>
                        <span class="info-subtext">Resposta garantida em até 24 horas</span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-details">
                        <h4>Localização</h4>
                        <p>Av. Principal, 1000 - Centro</p>
                        <span class="info-subtext">Campinas - SP • Shopping CineFilms</span>
                    </div>
                </div>

                <div class="info-footer-badge">
                    <i class="fas fa-shield-alt"></i> Suporte Prioritário CineFilms Club
                </div>
            </div>

            <!-- FORMULÁRIO DE CONTATO (ESTILO ENTRAR / LOGIN) -->
            <div class="contact-form-card">
                <h3 class="form-title"><i class="fas fa-paper-plane"></i> Envie sua mensagem</h3>

                @if(session('success'))
                    <div class="alert-success-box">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="/contato" method="POST">
                    @csrf
                    <div class="form-row-2col">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" id="nome" name="nome" class="form-input" placeholder="Digite seu nome completo" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="seu@email.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assunto" class="form-label">Assunto do Contato</label>
                        <select id="assunto" name="assunto" class="form-input form-select" required>
                            <option value="">Selecione o assunto desejado</option>
                            <option value="Dúvida">Dúvida sobre Ingressos e Sessões</option>
                            <option value="Sugestão">Sugestão de Programação / Filme</option>
                            <option value="Reclamação">Reclamação ou Feedback</option>
                            <option value="Parceria">Parcerias & Imprensa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mensagem" class="form-label">Sua Mensagem</label>
                        <textarea id="mensagem" name="mensagem" class="form-input form-textarea" rows="4" placeholder="Descreva em detalhes como podemos ajudar você..." required></textarea>
                    </div>

                    <button type="submit" class="btn-auth-submit">
                        <i class="fas fa-paper-plane"></i> Enviar Mensagem
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
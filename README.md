# 🍿 CineFilms - Sistema de Gestão e Cinema (Plataforma Completa)

> Plataforma desenvolvida para gerenciar todas as operações de um cinema, oferecendo desde a compra de ingressos e experiência digital para o cliente até o controle administrativo de sessões, salas, bilheteria e bomboniere.

---

## 🛠️ Tecnologias Utilizadas

Este projeto foi estruturado com foco em performance, controle de fluxo de caixa e separação rigorosa de permissões por perfil de usuário:

*   **Backend:** PHP / Laravel
*   **Banco de Dados:** MySQL
*   **Interface:** Tailwind CSS / Blade
*   **Controle de Versão:** Git & GitHub

---

## 💡 Sobre o Projeto

O **CineFilms** automatiza o ecossistema completo de um cinema de rua ou complexo de exibição. Ele elimina filas na bilheteria e na bomboniere ao integrar a venda digital de ingressos e combos, enquanto fornece ferramentas avançadas para a administração gerenciar a grade de programação, o estoque de produtos e o fluxo de caixa em tempo real.

---

## 👥 Perfis de Acesso (Roles)

O sistema possui uma arquitetura baseada em múltiplos papéis para garantir a segurança e a eficiência operacional:

*   👨‍💼 **Administrador:** Visão gerencial completa do negócio, controle financeiro, relatórios de bilheteria e faturamento da bomboniere, gerenciamento de funcionários, cadastro de salas, sessões, filmes e auditoria de caixa.
*   🍿 **Operador de Bomboniere / Bilheteria:** Painel rápido para vendas presenciais de balcão (ingressos avulsos, pipocas, refrigerantes e combos), controle de troco e impressão/validação de tickets.
*   🎟️ **Cliente:** Interface web/mobile interativa onde o usuário consulta os filmes em cartaz, escolhe a sessão, seleciona assentos numerados no mapa da sala, faz pedidos antecipados na bomboniere e realiza o pagamento de forma integrada.

---

## ⚙️ Principais Módulos e Funcionalidades

*   🎬 **Gestão de Filmes e Sessões:** Cadastro completo de produções, gêneros, classificações indicativas, cartazes, horários e associação direta com as salas de exibição.
*   💺 **Mapa de Assentos Interativo:** Escolha visual de poltronas numeradas por sessão, garantindo que não haja vendas duplicadas para o mesmo lugar.
*   🍿 **Gestão de Bomboniere e Estoque:** Controle de produtos alimentícios, insumos, inventário em tempo real e baixa automática de estoque a cada venda realizada (seja no caixa ou antecipada pelo cliente).
*   💳 **Fluxo de Vendas Unificado:** Integração no carrinho onde o cliente pode comprar o ingresso para o filme e o combo de pipoca em uma única transação.
*   📊 **Painel Administrativo & Relatórios:** Gráficos de ocupação das salas, filmes mais rentáveis, horários de pico e balanço financeiro diário.
*   🔒 **Controle de Acessos e Segurança:** Autenticação robusta e proteção contra acessos indevidos a rotas administrativas usando os recursos nativos do Laravel.

---

## 📈 Arquitetura

O sistema foi estruturado seguindo o padrão **MVC (Model-View-Controller)** do Laravel, garantindo código limpo, modularidade e alta capacidade de expansão para novas salas ou formas de pagamento.

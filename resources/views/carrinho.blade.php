@extends('template')

@section('title', 'Carrinho - Cinefilms')

@section('content')
<div class="main-content">
    <div class="container" style="padding: 100px 20px; text-align: center;">
        <i class="fas fa-shopping-cart" style="font-size: 5rem; color: #132e69; margin-bottom: 30px;"></i>
        <h1 style="font-size: 3rem; color: #132e69; margin-bottom: 20px;">Carrinho de Compras</h1>
        <p style="font-size: 1.2rem; color: #666; margin-bottom: 40px;">
            Seu carrinho está vazio. Navegue pelos filmes em cartaz e adicione ingressos!
        </p>
        <a href="{{ route('filme-em-cartaz') }}" style="display: inline-block; padding: 15px 40px; background: #ff6b6b; color: #fff; text-decoration: none; border-radius: 50px; font-weight: 600; font-size: 1.1rem;">
            <i class="fas fa-film"></i> Ver Filmes em Cartaz
        </a>
    </div>
</div>
@endsection

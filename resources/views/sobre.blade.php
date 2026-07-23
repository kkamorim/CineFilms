@extends('template')

@section('title', 'Bombonière - Cinefilms')

@section('content')
<div class="main-content">
    <div class="container" style="padding: 100px 20px; text-align: center;">
        <h1 style="font-size: 3rem; color: #132e69; margin-bottom: 30px;">Bombonière</h1>
        <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto 40px;">
            Em breve você poderá escolher seus produtos favoritos para acompanhar o filme!
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px; max-width: 900px; margin: 0 auto;">
            <div style="background: #fff; padding: 40px 20px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <i class="fas fa-popcorn" style="font-size: 3rem; color: #ff6b6b; margin-bottom: 20px;"></i>
                <h3 style="color: #132e69;">Pipoca</h3>
                <p style="color: #666;">Grande, média e pequena</p>
            </div>
            <div style="background: #fff; padding: 40px 20px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <i class="fas fa-wine-bottle" style="font-size: 3rem; color: #ff6b6b; margin-bottom: 20px;"></i>
                <h3 style="color: #132e69;">Bebidas</h3>
                <p style="color: #666;">Refrigerantes e sucos</p>
            </div>
            <div style="background: #fff; padding: 40px 20px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <i class="fas fa-candy-cane" style="font-size: 3rem; color: #ff6b6b; margin-bottom: 20px;"></i>
                <h3 style="color: #132e69;">Doces</h3>
                <p style="color: #666;">Variedade de guloseimas</p>
            </div>
        </div>
    </div>
</div>
@endsection

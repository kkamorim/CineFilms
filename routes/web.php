<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;

use App\Http\Controllers\CheckoutController;

// Rotas Públicas (sem autenticação)
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/filmes', [PublicController::class, 'filmes'])->name('filmes');
Route::get('/filme-em-cartaz', [PublicController::class, 'filmeEmCartaz'])->name('filme-em-cartaz');

Route::get('/quem-somos', fn() => view('quem-somos'));
Route::get('/contato', [ContatoController::class, 'create']);
Route::post('/contato', [ContatoController::class, 'store']);

Route::view('/sobre', 'sobre')->name('sobre');
Route::view('/carrinho', 'carrinho')->name('carrinho');

// Checkout e Gateway de Pagamento
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/processar', [CheckoutController::class, 'processar'])->name('checkout.processar');

// Rotas de Autenticação
Route::get('/register', [CadastroController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [CadastroController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas de Login Admin
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login']);
Route::post('/admin/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

// Área de Admin (protegida por autenticação + verificação GM)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard');
    Route::get('/em-cartaz', [PublicController::class, 'emCartaz'])->name('emcartaz');
    
    // Rotas de Exportação
    Route::get('/export/csv', [ExportController::class, 'exportCSV'])->name('export.csv');
    Route::get('/export/pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');
    
    Route::resource('filmes', FilmeController::class)->names('filmes');
});

Route::get('/users', [UserController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
    Route::post('/perfil/atualizar', [UserController::class, 'atualizarPerfil'])->name('perfil.atualizar');
    Route::get('/meus-ingressos', [UserController::class, 'meusIngressos'])->name('meus.ingressos');
    Route::get('/historico', [UserController::class, 'historico'])->name('historico');
});
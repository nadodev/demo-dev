<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

// Rotas públicas
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/public', [LandingPageController::class, 'index'])->name('public-page.index');

// Páginas públicas de detalhes
Route::get('/noticia/{news}', [LandingPageController::class, 'showNews'])->name('public.news.show');
Route::get('/servico/{service}', [LandingPageController::class, 'showService'])->name('public.service.show');
Route::get('/produto/{product}', [LandingPageController::class, 'showProduct'])->name('public.product.show');

// Páginas públicas de seções
Route::get('/clientes', [LandingPageController::class, 'clients'])->name('public.clients');
Route::get('/servicos', [LandingPageController::class, 'services'])->name('public.services');
Route::get('/produtos', [LandingPageController::class, 'products'])->name('public.products');
Route::get('/noticias', [LandingPageController::class, 'news'])->name('public.news');

// Rotas de autenticação
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rotas do dashboard
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('products', ProductController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('news', NewsController::class);
        Route::resource('services', ServiceController::class);
        
        // Rotas da página pública
        Route::prefix('public-page')->name('public-page.')->group(function () {
            Route::get('/', [PublicPageController::class, 'index'])->name('index');
            Route::put('/', [PublicPageController::class, 'update'])->name('update');
            Route::get('/hero', [PublicPageController::class, 'hero'])->name('hero');
            Route::put('/hero', [PublicPageController::class, 'updateHero'])->name('hero.update');
            Route::get('/footer', [PublicPageController::class, 'footer'])->name('footer');
            Route::put('/footer', [PublicPageController::class, 'updateFooter'])->name('footer.update');
            
            // Seções dinâmicas
            Route::get('/clients', [PublicPageController::class, 'clients'])->name('clients');
            Route::put('/clients', [PublicPageController::class, 'updateClients'])->name('clients.update');
            Route::get('/services', [PublicPageController::class, 'services'])->name('services');
            Route::put('/services', [PublicPageController::class, 'updateServices'])->name('services.update');
            Route::get('/products', [PublicPageController::class, 'products'])->name('products');
            Route::put('/products', [PublicPageController::class, 'updateProducts'])->name('products.update');
            Route::get('/news', [PublicPageController::class, 'news'])->name('news');
            Route::put('/news', [PublicPageController::class, 'updateNews'])->name('news.update');
        });
        
        // Perfil
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        
        // Usuários (apenas para admins)
        Route::resource('users', UserController::class);
    });
});

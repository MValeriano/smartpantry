<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupermarketListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmporiumController;
use App\Http\Controllers\EmporiumProductController;
use App\Http\Controllers\LarderController;

// Rotas abertas
Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', function () {
    return view('login');
})->name('login.view');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->name('oauth.redirect');
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('oauth.callback');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
// Fim das rotas abertas

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'paginaInicial'])->name('dashboard');

    Route::resource('categories', CategoryController::class)->middleware('auth');

    Route::get('/supermarket_lists/create', [SupermarketListController::class, 'create'])->name('supermarket_lists.create');
    Route::post('/supermarket_lists', [SupermarketListController::class, 'store'])
        ->name('supermarket_lists.store');
    Route::get('/supermarket_lists/{supermarket_list}', [SupermarketListController::class, 'show'])->name('supermarket_lists.show');
    Route::get('supermarket_lists/{supermarketList}/conclude', [SupermarketListController::class, 'conclude'])->name('supermarket_lists.conclude');
    Route::put('/supermarket_lists/{supermarket_list}', [SupermarketListController::class, 'update'])->name('supermarket_lists.update');

    Route::resource('products', ProductController::class)->middleware('auth');
    Route::get('/supermarket_lists/{supermarketList}/show', [SupermarketListController::class, 'exportToPdf'])->name('supermarket_lists.show');

    Route::get('/administrar-perfis', [ProfileController::class, 'index'])->name('administrar.perfis')->middleware('auth');

    Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index')->middleware('auth');
    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create')->middleware('auth');
    Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store')->middleware('auth');
    Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->name('profiles.show')->middleware('auth');
    Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit')->middleware('auth');
    Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update')->middleware('auth');
    Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->name('profiles.destroy')->middleware('auth');

    Route::get('/emporiums', [EmporiumController::class, 'index'])->name('emporiums.index')->middleware('auth');
    Route::get('/emporiums/create', [EmporiumController::class, 'create'])->name('emporiums.create')->middleware('auth');
    Route::post('/emporiums', [EmporiumController::class, 'store'])->name('emporiums.store')->middleware('auth');
    Route::get('/emporiums/{emporium}', [EmporiumController::class, 'show'])->name('emporiums.show')->middleware('auth');
    Route::get('/emporiums/{emporium}/edit', [EmporiumController::class, 'edit'])->name('emporiums.edit')->middleware('auth');
    Route::put('/emporiums/{emporium}', [EmporiumController::class, 'update'])->name('emporiums.update')->middleware('auth');
    Route::delete('/emporiums/{emporium}', [EmporiumController::class, 'destroy'])->name('emporiums.destroy')->middleware('auth');

    Route::get('/EmporiumProduct', [EmporiumProductController::class, 'index'])->name('EmporiumProduct.index')->middleware('auth');
    Route::get('/EmporiumProduct/create/{emporium}', [EmporiumProductController::class, 'create'])->name('EmporiumProduct.create')->middleware('auth');
    Route::post('/EmporiumProduct', [EmporiumProductController::class, 'store'])->name('EmporiumProduct.store')->middleware('auth');
    Route::get('/EmporiumProduct/{emporium}', [EmporiumProductController::class, 'show'])->name('EmporiumProduct.show')->middleware('auth');
    Route::get('/EmporiumProduct/{emporium}/edit', [EmporiumProductController::class, 'edit'])->name('EmporiumProduct.edit')->middleware('auth');
    Route::put('/EmporiumProduct/{emporium}', [EmporiumProductController::class, 'update'])->name('EmporiumProduct.update')->middleware('auth');
    Route::delete('/EmporiumProduct/{emporium}', [EmporiumProductController::class, 'destroy'])->name('EmporiumProduct.destroy')->middleware('auth');

    Route::resource('larders', LarderController::class);
});
// Fim das Rotas protegidas

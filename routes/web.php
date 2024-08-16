<?php

use App\Http\Controllers\ArtigosController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivesController;
use App\Http\Controllers\TrendingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/quemsomos', [ArtigosController::class, 'QuemSomosIndex'])->name('QuemSomosIndex');
Route::get('/contato', [ArtigosController::class, 'ContatoIndex'])->name('ContatoIndex');
Route::get('/noticias', [ArtigosController::class, 'NoticiasIndex'])->name('NoticiasIndex');
Route::get('/noticias/{id}', [ArtigosController::class, 'NoticiasShow'])->name('NoticiasShow');

Route::middleware(['auth'])->group(function () {

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'conteudo'])->name('conteudos');
Route::get('/{id}', [HomeController::class, 'show'])->name('conteudos.show');

Route::get('/home', [ArtigosController::class, 'index'])->name('artigos.index');
Route::delete('/home/{id}', [ArtigosController::class, 'destroy'])->name('artigos.destroy');
Route::post('/home', [ArtigosController::class, 'store'])->name('artigos.store');
Route::put('/home/{id}', [ArtigosController::class, 'update'])->name('artigos.update');

Route::get('/home', [TrendingController::class, 'index'])->name('trending.index');
Route::delete('/home1/{id}', [TrendingController::class, 'destroy'])->name('trending.destroy');
Route::post('/home1', [TrendingController::class, 'store'])->name('trending.store');
Route::put('/home1/{id}', [TrendingController::class, 'update'])->name('trending.update');

Route::get('/home', [LivesController::class, 'index'])->name('lives.index');
Route::delete('/home2/{id}', [LivesController::class, 'destroy'])->name('lives.destroy');
Route::post('/home2', [LivesController::class, 'store'])->name('lives.store');
Route::put('/home2/{id}', [LivesController::class, 'update'])->name('lives.update');

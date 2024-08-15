<?php

use App\Http\Controllers\ArtigosController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
});

#Artigos Principais
Route::get('/artigos', [ArtigosController::class, 'index'])->name('artigo.index');

Route::get('/quemsomos', [ArtigosController::class, 'QuemSomosIndex'])->name('QuemSomosIndex');
Route::get('/contato', [ArtigosController::class, 'ContatoIndex'])->name('ContatoIndex');

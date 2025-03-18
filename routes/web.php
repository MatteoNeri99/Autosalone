<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\AuthController;
use App\Models\Auto;
use Illuminate\Support\Facades\Auth;

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

Route::get('', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function () {
    $auto = Auto::count();
    return view('home', compact('auto'));
});
Route::get('/auto/search', [AutoController::class, 'search'])->name('auto.search');
Route::resource('/auto', AutoController::class);

use App\Http\Controllers\AmutoController;

Route::get('/cestino', [AutoController::class, 'trashed'])->name('auto.cestino'); // Mostra il cestino
Route::get('/cestino/ripristina/{id}', [AutoController::class, 'restore'])->name('auto.restore'); // Ripristina un'auto
Route::get('/cestino/elimina/{id}', [AutoController::class, 'forceDelete'])->name('auto.forceDelete'); // Elimina definitivamente




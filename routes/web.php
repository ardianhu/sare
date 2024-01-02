<?php

use App\Http\Controllers\FoundController;
use App\Http\Controllers\LostController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'news'])->name('news');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form_kehilangan_barang', [App\Http\Controllers\LostController::class, 'index'])->name('ilost');
Route::post('/proses_form_kehilangan_barang', [App\Http\Controllers\LostController::class, 'form'])->name('lostpost');
Route::get('/form_penemuan_barang', [App\Http\Controllers\FoundController::class, 'index'])->name('ifound');
Route::post('/proses_form_penemuan_barang', [App\Http\Controllers\FoundController::class, 'form'])->name('foundpost');
Route::post('/tandai_selesai_penemuan', [App\Http\Controllers\FoundController::class, 'done'])->name('donefound');
Route::post('/tandai_selesai_kehilangan', [App\Http\Controllers\LostController::class, 'done'])->name('donelost');

Route::prefix('items')->group(function () {
    // Other item-related routes...

    // Route to mark an item as claimed
    Route::post('/{id}/mark-lost-as-claimed', [LostController::class, 'markAsClaimed'])->name('items.markLostAsClaimed');
    Route::post('/{id}/mark-found-as-claimed', [FoundController::class, 'markAsClaimed'])->name('items.markFoundAsClaimed');
});
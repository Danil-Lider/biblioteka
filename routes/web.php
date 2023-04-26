<?php

use App\Http\Controllers\New\GetFreeTimeForOrderMainController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderBookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', [GetFreeTimeForOrderMainController::class, 'index']);

Route::get('/', [BookController::class, 'index'])->name('main')->middleware(['auth', 'verified']);


// Route::get('/myitems', [BookController::class, 'index'])->name('main')->middleware(['auth', 'verified']);


Route::resource('books', OrderBookController::class)->middleware(['auth', 'verified']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Мои брони
Route::get('/myitems', [OrderBookController::class, 'index'])->name('my_items');


Route::get('/item_destroy', [OrderBookController::class, 'destroy'])->name('delite');




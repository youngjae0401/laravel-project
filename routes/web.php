<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BoardController;

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

Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', [RegisterController::class, 'view'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'view'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function() {
        return redirect('board');
    });

    Route::get('/board', [BoardController::class, 'view'])->name('board');
    Route::get('/board/create', [BoardController::class, 'create'])->name('create');
    Route::post('/board/store', [BoardController::class, 'store'])->name('store');
    Route::get('/board/show/{id}', [BoardController::class, 'show'])->name('show');
    Route::put('/board/edit/{id}', [BoardController::class, 'edit'])->name('edit');
    Route::delete('/board/delete/{id}', [BoardController::class, 'delete'])->name('delete');
});
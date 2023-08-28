<?php

use App\Http\Controllers\ProfileController;
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

// root
Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    // 売上管理
    Route::prefix('performances')->name('performances.')->group(function () {
        // 一覧画面
        Route::get('/', [App\Http\Controllers\Performance\IndexController::class, 'index'])->name('index');

        // 新規売上作成画面
        Route::get('/create', [App\Http\Controllers\Performance\CreateController::class, 'index'])->name('create.index');

        // 新規売上作成
        Route::post('/create/submit', [App\Http\Controllers\Performance\CreateController::class, 'submit'])->name('create.submit');
    });

    // 顧客管理
    Route::prefix('customers')->name('customers.')->group(function () {
        // 一覧画面
        Route::get('/', [App\Http\Controllers\Customer\IndexController::class, 'index'])->name('index');
    });
});

require __DIR__.'/auth.php';

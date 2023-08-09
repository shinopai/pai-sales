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
});

Route::middleware('auth')->group(function () {
    // 売上管理
    Route::prefix('performances')->name('performances.')->group(function () {
        // 一覧画面
        Route::get('/', [App\Http\Controllers\Performance\IndexController::class, 'index'])->name('index');
    });
});

require __DIR__.'/auth.php';

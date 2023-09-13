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

        // 売上データ編集画面
        Route::get('/edit/{performance}', [App\Http\Controllers\Performance\EditController::class, 'index'])->name('edit.index');

        // 売上データ更新
        Route::patch('/edit/submit/{performance}', [App\Http\Controllers\Performance\EditController::class, 'submit'])->name('edit.submit');

        // 売上データ削除確認画面
        Route::get('/delete/confirm/{performance}', [App\Http\Controllers\Performance\DeleteController::class, 'confirm'])->name('delete.confirm');

        // 売上データ削除
        Route::delete('/delete/submit/{performance}', [App\Http\Controllers\Performance\DeleteController::class, 'submit'])->name('delete.submit');

        // 売上データ削除完了画面
        Route::get('/delete/complete', function () {
            return view('performances.delete.complete');
        })->name('delete.complete');

        // 売上データ検索
        Route::get('/search', [App\Http\Controllers\Performance\IndexController::class, 'search'])->name('search');
    });

    // 顧客管理
    Route::prefix('customers')->name('customers.')->group(function () {
        // 一覧画面
        Route::get('/', [App\Http\Controllers\Customer\IndexController::class, 'index'])->name('index');

        // 顧客データ検索
        Route::get('/search', [App\Http\Controllers\Customer\IndexController::class, 'search'])->name('search');
    });

    // 売れ筋商品
    Route::prefix('ranking')->name('ranking.')->group(function () {

        // 商品別販売数
        Route::get('/', [App\Http\Controllers\Ranking\IndexController::class, 'index'])->name('index');
    });
});

require __DIR__.'/auth.php';

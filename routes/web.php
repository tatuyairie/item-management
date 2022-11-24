<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/{item}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
    Route::put('/{item}/edit', [App\Http\Controllers\ItemController::class, 'itemUpdate'])->name('itemUpdate');
    Route::delete('/{item}', [App\Http\Controllers\ItemController::class, 'itemDestroy'])->name('itemDestroy');
});

// ログイン認証した人だけが使える
// Route::group(['middleware' => 'auth'], function () {
    // 売上関連画面
    Route::get('sales/list', [App\Http\Controllers\SaleController::class, 'list'])->name('list');
    Route::get('item/{id}/sales_register', [App\Http\Controllers\ItemController::class, 'salesRegister'])->name('sales_register');
    Route::put('sale/{sale}', [App\Http\Controllers\SaleController::class, 'update'])->name('update');
    Route::post('sale', [App\Http\Controllers\SaleController::class, 'store'])->name('store');
    Route::delete('sale/{sale}', [App\Http\Controllers\SaleController::class, 'destroy'])->name('destroy');
    Route::get('sales/{sale}/sales_edit', [App\Http\Controllers\SaleController::class, 'edit'])->name('sales_edit');
// });

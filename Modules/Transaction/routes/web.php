<?php

use Illuminate\Support\Facades\Route;
use Modules\Transaction\App\Http\Controllers\TransactionController;

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

Route::group([], function () {
    Route::resource('transaction', TransactionController::class)->names('transaction');
});

route::get('/main', [TransactionController::class, 'main'])->name('main');
route::get('/detail/{transaction_id}', [TransactionController::class, 'details'])->name('details');
route::get('/history', [TransactionController::class, 'history'])->name('history.transaction');
route::get('/history_details/{transaction_id}', [TransactionController::class, 'history_details'])->name('history.details');

route::get('/receipt/{transaction_id}', [TransactionController::class, 'receipt'])->name('receipt');

route::get('/create_transaction', [TransactionController::class, 'create'])->name('add.transaction');
route::post('/store_transaction', [TransactionController::class, 'store'])->name('store.transaction');

route::get('/edit_transaction/{transaction_id}', [TransactionController::class, 'edit'])->name('edit.transaction');
route::post('/update_transaction/{transaction_id}', [TransactionController::class, 'update'])->name('update.transaction');

route::get('/edit_transaction_item/{detail_id}', [TransactionController::class, 'edit_item'])->name('edit.transaction.item');
route::post('/update_transaction_item/{detail_id}', [TransactionController::class, 'update_item'])->name('update.transaction.item');

route::get('/delete_transaction_item/{detail_id}/{transaction_id}', [TransactionController::class, 'delete_item'])->name('delete.transaction.item');

route::get('/delete_transaction/{transaction_id}', [TransactionController::class, 'delete'])->name('delete.transaction');
route::get('/advance_order/{detail_id}', [TransactionController::class, 'advance'])->name('advance.transaction');
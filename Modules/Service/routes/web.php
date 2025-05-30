<?php

use Illuminate\Support\Facades\Route;
use Modules\Service\App\Http\Controllers\ServiceController;

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
    Route::resource('service', ServiceController::class)->names('service');
});

route::get('/speed', [ServiceController::class, 'speed'])->name('speed');

route::get('/create_speed', [ServiceController::class, 'create_speed'])->name('add.speed');
route::post('/store_speed', [ServiceController::class, 'store_speed'])->name('store.speed');

route::get('/edit_speed/{speed_id}', [ServiceController::class, 'edit_speed'])->name('edit.speed');
route::post('/update_speed/{speed_id}', [ServiceController::class, 'update_speed'])->name('update.speed');

route::get('/delete_speed/{speed_id}', [ServiceController::class, 'delete_speed'])->name('delete.speed');



route::get('/item', [ServiceController::class, 'item'])->name('item');

route::get('/create_item', [ServiceController::class, 'create_item'])->name('add.item');
route::post('/store_item', [ServiceController::class, 'store_item'])->name('store.item');

route::get('/edit_item/{item_id}', [ServiceController::class, 'edit_item'])->name('edit.item');
route::post('/update_item/{item_id}', [ServiceController::class, 'update_item'])->name('update.item');

route::get('/delete_item/{item_id}', [ServiceController::class, 'delete_item'])->name('delete.item');



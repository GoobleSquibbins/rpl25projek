<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\App\Http\Controllers\UsersController;

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
    Route::resource('users', UsersController::class)->names('users');
});

route::get('/', [UsersController::class, 'index']);
route::get('/login', [UsersController::class, 'index'])->name('login');
route::post('/login_proc', [UsersController::class, 'login'])->name('login_proc');

route::get('/users', [UsersController::class, 'users'])->name('user');

route::get('/show/{user_id}', [UsersController::class, 'show'])->name('show');

route::get('/register_user', [UsersController::class, 'create'])->name('register.user');
route::post('/store_user', [UsersController::class, 'store'])->name('store.user');

route::get('/edit_user/{user_id}', [UsersController::class, 'edit'])->name('edit.user');
route::post('/update_user/{user_id}', [UsersController::class, 'update'])->name('update.user');

route::get('/delete_user/{user_id}', [UsersController::class, 'delete'])->name('delete.user');

route::get('/logout', [UsersController::class, 'logout'])->name('logout');
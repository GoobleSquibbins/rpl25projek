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
route::get('/login', [UsersController::class, 'index']);
route::post('/login_proc', [UsersController::class, 'index'])->name('login_proc');
route::get('/users', [UsersController::class, 'users']);
route::get('/create_user', [UsersController::class, 'create']);
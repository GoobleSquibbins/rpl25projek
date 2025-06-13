<?php

use Illuminate\Support\Facades\Route;
use Modules\Report\App\Http\Controllers\ReportController;

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

route::get('/report', [ReportController::class, 'index'])->name('report');
route::get('/today', [ReportController::class, 'today'])->name('today');
route::get('/week', [ReportController::class, 'week'])->name('week');
route::get('/month', [ReportController::class, 'month'])->name('month');
route::get('/cust_date', [ReportController::class, 'cust_date'])->name('cust.date');

route::get('/print', [ReportController::class, 'print'])->name('print');
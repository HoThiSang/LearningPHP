<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Have to must use namespace ở đầu
use App\Http\Controllers\Admin\DashboardConntroller;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\Controller;
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

Route::get('/', [HomeController::class, 'index']);
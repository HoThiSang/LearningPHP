<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('add-products', [HomeController::class, 'getAdd']);

Route::put('add-products', [HomeController::class, 'putAdd']);

Route::get('/demo1', function(){
   
    $response = (new Response())->cookie('Content-Type','Training Unicode');
    return $response;
});


Route::get('/demo2', function(Request $request){
    return $request ->cookie('unicode');
});

Route::get('/demo3', function(){
    $response = response()->view('clients.demo-test', [
        'title'=> 'Học HTTP Response'
    ], 201)
    ->header('Content-Type', 'application/json')
    ->header('API-KEY','123456');

    return $response;
});
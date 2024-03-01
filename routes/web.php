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

Route::post('add-products', [HomeController::class, 'postAdd'])->name('post-add');


Route::put('add-products', [HomeController::class, 'putAdd']);

// Response with json, header 
Route::get('/demo1', function(){
   $contenArr = [
    'name'=>'Unicode',
    'version'=>'Laravel 10.x',
    'lesson'=>'HTTP Response in Laravel'
   ];
   return response()->json($contenArr, 201)->header('API-KEY', '123456');
});

Route::get('demo-response', function(){
    echo old('user_name');
    return view('clients.demo-test');
})->name('demo-response');

Route::post('demo-response', function(Request $request){
    if(!empty($request->user_name)){
      // return redirect(route('demo-response'));
      return back()->withInput()->with('mess', 'Validate thành công');
    }
    return redirect(route('demo-response'))->with('mess', 'Validate không thành công');
});


Route::get('download-image', [HomeController::class, 'downloadImage'])->name('download-image');

Route::get('download-doc', [HomeController::class, 'downloadDoc'])->name('download-doc');

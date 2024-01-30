<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


Route::get('/', function () {
  $html = '<h1>Welcome to My Website</h1>';
  return $html;
});

/*
Route::get('laravel', function(){
   return "Phương thức get của path laravel";
});


Route::get('laravel', function(){
   return view('form');
});


Route::post('/laravel', function(){
    return "Phương thức post của path laravel";
});

Route::put('/laravel', function(){
    return "Phương thức put của path laravel";
});

Route::delete('/laravel', function(){
    return "Phương thức delete của path laravel";
});

Route::patch('/laravel', function(){
    return "Phương thức patch của path laravel";
});

Route::match(['get', 'post'], '/laravel', function(){
  return $_SERVER['REQUEST_METHOD'];
});



Route::any('/laravel', function(Request $request){
  return $request->method();
});



Route::get('show-form',function(){
  return view('form');
});

Route::redirect('/laravel', 'show-form', 301);

Route::view('show-form','form');
*/

Route::prefix('admin')->group(function () {
  Route::get('/laravel', function () {
    return "Phương thức get của path laravel";
  });


  Route::get('/show-form', function () {
    return view('form');
  });

  Route::prefix('/products')->group(function () {
    Route::get('/', function () {
      return 'Danh sách sản phẩm';
    });

     Route::get('/add', function () {
      return 'Thêm sản phẩm';
    });

     Route::get('/edit', function () {
      return 'Sửa sản phẩm';
    });
  });
});

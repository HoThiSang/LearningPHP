<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Have to must use namespace ở đầu
use App\Http\Controllers\HomeController;
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

// Cách cũ 
Route::get('/','App\Http\Controllers\HomeController@index' )->name('home');

Route::get('/news','HomeController@getNews' )->name('news');

// Cách mới:
Route::get('/category/{id}', [HomeController::class, 'getCategory']) ;

Route::prefix('admin')->group(function () {
  
  Route::get('/laravel/{id?}/{slug?}.html', function ($id=null,$slug=null) {
    $content = "Phương thức get của path laravel với  tham số : ";
    $content.='id = '.$id.'<br/>';
    $content.='slug = '.$slug.'<br/>';

    return $content;
  })->where('id','\d')->where('slug','.+')->name('admin.laravel');


  Route::get('/show-form', function () {
    return view('form');
  })->name('admin.show-form');

  Route::prefix('/products')->middleware('checkpermission')->group(function () {
    Route::get('/', function () {
      return 'Danh sách sản phẩm';
    });

     Route::get('/add', function () {
      return 'Thêm sản phẩm';
    })->name('admin.products.add');

     Route::get('/edit', function () {
      return 'Sửa sản phẩm';
    });
  });
});

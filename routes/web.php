<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// Have to must use namespace ở đầu
use App\Http\Controllers\Admin\DashboardConntroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostController;

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
Route::get('/demo1', function () {
  $contenArr = [
    'name' => 'Unicode',
    'version' => 'Laravel 10.x',
    'lesson' => 'HTTP Response in Laravel'
  ];
  return response()->json($contenArr, 201)->header('API-KEY', '123456');
});

Route::get('demo-response', function () {
  echo old('user_name');
  return view('clients.demo-test');
})->name('demo-response');

Route::post('demo-response', function (Request $request) {
  if (!empty($request->user_name)) {
    // return redirect(route('demo-response'));
    return back()->withInput()->with('mess', 'Validate thành công');
  }
  return redirect(route('demo-response'))->with('mess', 'Validate không thành công');
});


Route::get('download-image', [HomeController::class, 'downloadImage'])->name('download-image');

Route::get('download-doc', [HomeController::class, 'downloadDoc'])->name('download-doc');




Route::get('myroute/{ten}', function ($ten) {
  return "<h2>Hello " . $ten . "</h2>";
});

Route::get('myroute/{userId?}/{name?}', function ($userId = 1, $name = "PNV") {
  return "<h2 style ='color: coral'>User Id :" . $userId . " <br>Name : " . $name . "</h2> ";
});
// Nên đặt tên cho groups để dễ xử lý
Route::prefix('users')->name('users.')->group(function () {

  Route::get('/', [UsersController::class, 'index'])->name('index');

  Route::get('/add', [UsersController::class, 'add'])->name('add');

  Route::post('/add', [UsersController::class, 'postAdd'])->name('post-add');


  Route::get('/edit/{id}', [UsersController::class, 'getEdit'])->name('edit');
  
  
  Route::post('/edit/{id}', [UsersController::class, 'postEdit'])->name('postEdit');

  Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');

});


Route::prefix('posts')->name('posts.')->group(function(){

    Route::get('/', [PostController::class, 'index']);
});
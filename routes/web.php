<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Have to must use namespace ở đầu
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


// Cleint router :: 
Route::prefix('category')->group(function() {
  // danh sách chuyên mục
    Route::get('/',[CategoriesController::class, 'index'])->name('categories.list');

  Route::get('/edit/{id}', [CategoriesController::class,'getCategory'])->name('categories.edit');

  Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory'])->name('categories');

  //Hiển thị form add dữ liệu 
  Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

  Route::post('/add', [CategoriesController::class, 'handleAddcategory']);

  // Xóa chuyên mục
  Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory']);

});

Route::prefix('admin')->group(function(){
 
    Route::resource('products', ProductsController::class);
 
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {

    }

    // Hiển thị danh sách category
    public function index()
    {
        return  view('clients/categories/list');
    }

    // GET
    public function getCategory($id)
    {
          return  view('clients/categories/edit');
    }

    // POST
    public function updateCategory($id)
    {
        return "Submit sửa category ". $id;
    }

    // POST
    public function addCategory()
    {
          return  view('clients/categories/add');
    }

    // show form thêm dữ liệu 
    public function showCategory()
    {

    }
 

    public function handleAddcategory(){
       return redirect(route('categories.add'));
     //   return "submit them chuyên mục";
    }

       public function deleteCategory($id)
    {
        return "submit xóa chuyên mục";

    }
}

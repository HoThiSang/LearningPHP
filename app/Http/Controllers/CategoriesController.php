<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
    }

    // Hiển thị danh sách category
    public function index(Request $request)
    {
        $ip = $request->ip();
        /*
        if(isset($_GET['id'])){
            echo $_GET['id'];
        }
            nếu chúng ta khởi tạo mới thì chúng ta sẽ lấy 1 request mới không phải request hiện tại
            $allData= $request->all();
            echo $allData['id'];
            dd($allData);
                
      //  $path = $request->all();
        $path = $request->fulUrl();
          $url = $request->fullUrl();
        echo $path;
        
        $url = $request->method();
        $url = $request->fullUrl();
        $url = $request->input('id.*.id');

        $id = $request->id;
        $name = $request->name;
        //  echo $url;
        dd($id);
        */
       // dd(request()->id);
       $name = request('name', 'Laravel');
       dd($name);
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
        return "Submit sửa category " . $id;
    }

    // POST
    public function addCategory(Request $request)
    {
        return  view('clients/categories/add');
    }

    // show form thêm dữ liệu 
    public function showCategory()
    {
    }


    public function handleAddcategory(Request $request)
    {
        // Ví dụ không muốn cô 
        $allData = $request->all();
        print_r($_POST);
        //   return redirect(route('categories.add'));
        //   return "submit them chuyên mục";
    }

    public function deleteCategory($id)
    {
        return "submit xóa chuyên mục";
    }
}

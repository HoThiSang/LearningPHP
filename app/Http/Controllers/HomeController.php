<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Stmt\Case_;
use PhpParser\Node\Stmt\Switch_;

class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['welcome'] = 'Học lập trình tại Laravel';
        $this->data['content'] = '<h3>Chương I nhập môn Laravel</h3>


        <p>Kiến thức 1</p>
        <p>Kiến thức 2</p>
        <p>Kiến thức 3</p>
        <p>Kiến thức 4</p>';
        $this->data['dataArr']=[];
        $this->data['index'] = 0;
        $this->data['number']=9;

        $this->data['title'] = "Đao tạo lập trình";

        $this->data['message']= "Đặt hàng thành công";
        return view('clients.home', $this->data);
    }

    public function products(){
          $this->data['title'] = "Sản phẩm";
             return view('clients.products', $this->data);
 
    }

    public function getAdd(){
        $this->data['title'] = "Thêm sản phẩm";
        return view('clients.add', $this->data);
        
    }

    public function postAdd(Request $request){
        dd($request);
    }

    
    public function putAdd(Request $request){
       return "php";
        dd($request);
    }
}


  
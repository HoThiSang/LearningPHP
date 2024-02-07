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
        <p>Kiến thức 4</p>
        ';
        $this->data['dataArr']=[];
        $this->data['index'] = 0;
        $this->data['number']=9;

        $this->data['message']= "Đặt hàng thành công";
        return view('home', $this->data);
    }


}


  
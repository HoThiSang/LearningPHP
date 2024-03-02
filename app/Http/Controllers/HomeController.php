<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Stmt\Case_;
use PhpParser\Node\Stmt\Switch_;
use App\Http\Requests\ProductRequest;
use App\Rules\UpperCase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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
           /*
        $user= DB::select('SELECT * FROM users WHERE email=:email',[
                'email'=>'sang.ho25@student.passerellesnumeriques.org'
        ]);
        dd($user);*/

       return view('clients.home', $this->data);
    }

    public function products(){
          $this->data['title'] = "Sản phẩm";
             return view('clients.products', $this->data);
 
    }

    public function getAdd(){
        $this->data['title'] = "Thêm sản phẩm";
        $this->data['errorMessage'] = "Vui lòng nhập tên sản phẩm";
        return view('clients.add', $this->data);
        
    }

   public function postAdd(Request $request)
{
    $rules = [
        'product_name' => ['required|min:6', function ($attribute, $value, $fail){
            isUppercase($value, 'Trường :attribute không hợp lệ',$fail);
        }],
        'product_price' => ['required|integer' ]
    ];

    $message = [
        'product_name.required' => 'Tên :attribute bắt buộc nhập',
        'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
        'product_price.required' => 'Giá bắt buộc là phải nhập',
        'product_price.integer' => 'Giá phải là số',
    ];

    $attributes = [
        'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
    ];
   $validator = Validator::make($request->all(), $rules, $message, $attributes);
   // $validator->validate(); // Chạy validate
   if($validator->failed()){
        $validator->errors()->add('msg','Vui lòng kiểm trả dữ liệu');
   // return redirect();
  }else{
    return redirect()->route('products');
   }
   return back()->withErrors($validator);
       
        
    }

    public function putAdd(Request $request){
       return "Phương thức Put php";
        dd($request);
    }

     public function downloadImage(Request $request){
        if(!empty($request->image)){
            $image = trim($request->image);

        //   $fileName  = basename($image);
            $fileName = 'image_'. uniqid().'.jpg';
            return response()->download($image, $fileName);
        }
       
    }
    public function downloadDoc(Request $request){
        if(!empty($request->file)){
            $image = trim($request->file);
    
            $fileName = 'tai-lieu'. uniqid().'.pdf';
       
            return response()->download($image, $fileName);
        }
    }

}


  
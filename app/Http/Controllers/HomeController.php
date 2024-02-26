<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Stmt\Case_;
use PhpParser\Node\Stmt\Switch_;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
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
        $this->data['errorMessage'] = "Vui lòng nhập tên sản phẩm";
        return view('clients.add', $this->data);
        
    }

   public function postAdd(Request $request)
{
    $rules = [
        'product_name' => 'required|min:6',
        'product_price' => 'required|integer'
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
   if($validator->fails()){
        $validator->errors()->add('msg','Vui lòng kiểm trả dữ liệu');
   // return redirect();
  }else{
    return redirect()->route('products');
   }
   return back()->withErrors($validator);
        /*
        $rules = [
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer'
        ];

       $message = [
            'product_name.required' => 'Tên :attribute bắt buộc nhập',
            'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự', // Nó sẽ hiển thị số lượng ký tự là 6 bởi vì nó sẽ lấy từ min ở trên như chúng ta đã qđ
            'product_price.required' => 'Giá bắt buộc là phải nhập',
            product_price.integer' => 'Giá phải là số',
        ];
         $message = [
            'required' => 'Trường :attribute bắt buộc nhập',
            'integer' => 'Giá phải là số',
           'min' => 'Trường :attribute không được nhỏ hơn'
        ];
        $request->validate($rules, $message);*/
        
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


  
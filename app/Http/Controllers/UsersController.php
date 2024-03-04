<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }

    public function index()
    {
        $title = "Danh sách người dùng";
        $userList = $this->users->getAllUser();
        return view("clients.users.list", compact('title', 'userList'));
    }

    public function add()
    {
        $title = "Them người dùng";
        return view("clients.users.add", compact('title'));
    }

    public function postAdd(Request $request)
    {

        $request->validate([
            'username' => 'required |min:5',
            'email' => 'required |email'
        ], [
            'username.require' => 'Họ và tên bắt buộc phải nhập',
            'username.min' => 'Họ và tên bắt buộc phải nhập',
            'email.require' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email không tồn tại trên hệ thống ',
        ]);

        $dataInsert = [
            $request->username,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);
        dd($request->all());
        // return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
        /* $validator = Validator::make([
            'username' =>'require|min:5',
            'email'=>'require|email'
        ], [
            'username.require'=>'Họ và tên bắt buộc phải nhập',
            'username.min'=>'Họ và tên bắt buộc phải nhập',            
            'email.require'=>'Email bắt buộc phải nhập',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email không tồn tại trên hệ thống ',
        ]);
        
    */
    }

   public function getEdit(Request $request, $id)
{
    $title = "Cập nhật người dùng";

    if (!empty($id)) {
        $userDetail = $this->users->getDetail($id);
        
        if (!empty($userDetail[0])) {
            $request->session()->put('id', $id);
            $userDetail = $userDetail[0];
            return view('clients.users.edit', compact('userDetail', 'title'));
        } else {
            return redirect()->route('users.index')->with('msg', 'Người dùng này không tồn tại');
        }
    } else {
        return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
    }

    // Các dòng mã cho trang 'add' nên được đặt ở đây, sau đoạn mã kiểm tra id

    // Nếu bạn muốn thực hiện các hành động cập nhật dữ liệu, hãy di chuyển nó vào đây
    $dataInsert = [
        $request->username,
        $request->email,
        date('Y-m-d H:i:s')
    ];
    $this->users->updateUser($dataInsert, $id);

    // Sử dụng with trên đối tượng redirect, không phải $this
    return back()->with('msg', "Cập nhật người dùng vừa mới");
}

    public function postEdit(Request $request, $id){
          $request->validate([
            'username' => 'required |min:5',
            'email' => 'required |email'
        ], [
            'username.require' => 'Họ và tên bắt buộc phải nhập',
            'username.min' => 'Họ và tên bắt buộc phải nhập',
            'email.require' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email không tồn tại trên hệ thống ',
        ]);

        $dataInsert = [
            $request->username,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($dataInsert,$id);
    }
}

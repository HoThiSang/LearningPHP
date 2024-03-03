<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $request ->validate([
            'username' =>'require|min:5',
            'email'=>'require|email'
        ], [
            'username.require'=>'Họ và tên bắt buộc phải nhập',
            'username.min'=>'Họ và tên bắt buộc phải nhập',            
            'email.require'=>'Email bắt buộc phải nhập',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email không tồn tại trên hệ thống ',
        ]);
     /*   $dataInsert = [
            $request->username,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);*/
        dd($request->all());
       // return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
    }

   
}

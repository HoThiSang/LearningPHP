<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Groups;

class UsersController extends Controller
{

    protected $users;
    const _PER_PAGE = 3;
    public function __construct()
    {
        $this->users = new Users();
    }

    public function index(Request $request)
    {
        //  $statement = $this->users->statementUser("DELETE FROM users ");
        //   $builder = $this->users->learningQueryBuilder();
        //   dd($builder);
        $filters = [];
        $keyword = null;
        if (!empty($request->status)) {
            $status = $request->status;
           if($status=='active'){
            $status = 1;
           }else{
            $status = 0;
           }
           $filters[] = ['users.status','=', $status];
        }

          if (!empty($request->group_id)) {
            $groupId = $request->group_id;
          
           $filters[] = ['users.status','=', $groupId];
        }
        
        
          if (!empty($request->keyword)) {
            $keyword = $request->keyword;
          
        
        }
        

        $title = "Danh sách người dùng";

        // sap xep :
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type')?$request->input('sort-type'):'asc' ;
        $allowSort = ['asc', 'desc'];

        if(!empty($sortType) && in_array($sortType, $allowSort)){
             if($sortType=='desc'){
            $sortType ='asc';
        }else{
            $sortType='desc';
        }
        }else{
            $sortType ='asc';
        }

        $sortArr = [
            'sortBy'=>$sortBy,
            'sortType'=>$sortType
        ];
       
        $userList = $this->users->getAllUser($filters, $keyword, $sortArr, self::_PER_PAGE);
        return view("clients.users.list", compact('title', 'userList', 'sortType'));
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

    public function getEdit(Request $request, $id = 0)
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

    public function postEdit(Request $request, $id)
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
        $this->users->updateUser($dataInsert, $id);
        //  return redirect()->route('users.edit', ['id'=>$id])->with('Cập nhật người dùng thành công');
        return back()->with('msg', 'Cập nhật người dùng thành công');
    }

    public function delete($id = 0)
    {
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);

            if (!empty($userDetail[0])) {

                $deletStatus =  $this->users->deleteUser($id);
                if ($deletStatus) {
                    $msg = "Xóa người dùng thành công";
                } else {
                    $msg = "Bạn không thể xóa người dùng. Vui lòng thử lại sau!!";
                }
                //    return view('clients.users.edit', compact('userDetail', 'title'));
            } else {
                $msg = "Người dùng không tòn tại";
            }
        } else {
            $msg = "Liên kết không tồn tại";
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Groups;
use App\Http\Requests\UserRequest;
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
            if ($status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['users.status', '=', $status];
        }

        if (!empty($request->group_id)) {
            $groupId = $request->group_id;

            $filters[] = ['users.status', '=', $groupId];
        }


        if (!empty($request->keyword)) {
            $keyword = $request->keyword;
        }


        $title = "Danh sách người dùng";

        // sap xep :
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type') ? $request->input('sort-type') : 'asc';
        $allowSort = ['asc', 'desc'];

        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType == 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        } else {
            $sortType = 'asc';
        }

        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType
        ];

        $userList = $this->users->getAllUser($filters, $keyword, $sortArr, self::_PER_PAGE);
        return view("clients.users.list", compact('title', 'userList', 'sortType'));
    }

    public function add()
    {
        $title = "Them người dùng";
        $allGroup = getAllGroups();

        return view("clients.users.add", compact('title', 'allGroup'));
    }

    public function postAdd(UserRequest $request)
    {
  
        $dataInsert = [
            'email' => $request->email,
            'name' => $request->username,
            'status' => $request->status,
            'group_id' => $request->group_id,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);

        //    dd($request->all());
        //  return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
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
            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng này không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        }

        $allGroup = getAllGroups();

        // Sử dụng with trên đối tượng redirect, không phải $this
        //  return back()->with('msg', "Cập nhật người dùng vừa mới");
        return view('clients.users.edit', compact('userDetail', 'title', 'allGroup'));
    }

    public function postEdit(UserRequest $request, $id)
    {
       $id = session('id');

       if(empty($id)){
            return back()->with('msg','Liên kết không tồn tại');
       }

        $dataInsert = [
            'email' => $request->email,
            'name' => $request->username,
            'status' => $request->status,
            'group_id' => $request->group_id,
            'updated_at' => date('Y-m-d H:i:s')
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

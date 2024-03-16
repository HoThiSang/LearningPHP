<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Users extends Model
{
  use HasFactory;

  protected $table = 'users';
  

  public function getAllUser($filters = [], $keyword = null, $sortByArr=null, $perPage =null)
  {
// DB::enableQueryLog();
    $users = DB::table($this->table)
      ->select('users.*', 'groupss.group_name as group_name')
      ->join('groupss', 'users.group_id', '=', 'groupss.id')
      ->where('trash',0);

    $orderBy = 'created_at';
    $orderType = 'desc';
    if(!empty($sortByArr) && is_array($sortByArr)){
      if(!empty($sortByArr['sortBy']) && !empty($sortByArr['sortType'])){
        $orderBy = trim($sortByArr['sortBy']);
        $orderType = trim($sortByArr['sortType']);


    }
      $users = $users->orderBy('users.'. $orderBy, $orderType);
      $users= $users->orderBy($orderBy,$orderType );
   
    if (!empty($filters)) {
      $users = $users->where($filters);
    }

    if (!empty($keyword)) {
      $users = $users->where(function ($query) use ($keyword) {
        $query->orwhere('name', 'like', '%' . $keyword . '%');
          $query->orwhere('email', 'like', '%' . $keyword . '%');
      });
    }
 //   $users = $users->get();

   // $sql = DB::getQueryLog();
  //  dd($sql);
  if(!empty($perPage)){
       $users = $users->paginate($perPage)->withQueryString(); // $perPage Bản ghi trên 1 trang
  }else{
    $users = $users->get();
  }
 

    return $users;
  }
  }

  public function addUser($data)
  {
 //   DB::insert('INSERT INTO users (name, email, created_at) values (?,?,?)', $data);
    return DB::table($this->table)->insert($data);
  
  }

  public function getDetail($id)
  {
    return DB::select('SELECT * FROM users WHERE id = ?', [$id]);
  }

  public function updateUser($data, $id)
  {
   // $data[] = $id;
   // return DB::update('UPDATE users SET email= ?,name=?,  updated_at=? where id = ?', $data);
  
  // 
  return DB::table($this->table)->where('id', $id)->update($data);
  
  }

  public function deleteUser($id)
  {
   // return  DB::delete("DELETE FROM users WHERE id=?", [$id]);
    return DB::table($this->table)->where('id', $id)->delete();
  }

  public function statementUser($sql)
  {
    return DB::statement($sql);
  }


  public function learningQueryBuilder()
  {
    DB::enableQueryLog();
    // DB::getQueryLog();
    // $id = 2;
    // Lấy tất cả các bản ghi của table
    //  $list = DB::table('users')
    //   ->select('users.*', 'groupss.group_name as group_name')
    //      ->join('groupss', 'users.group_id', '=', 'groupss.id')
    // Có thể thay bằng các câu lệnh như leftjoin, right 
    //  ->orderBy('id', 'DESC')
    // ->orderBy('created_at', 'asc')
    //   ->orderBy('id', 'DESC')
    // ->inRandomOrder()
    //  ->select(DB::raw('count(id) as email_count'), 'email', 'name')
    //   ->groupBy('email')
    //    ->groupBy('name')
    //     ->having('email_count', '>=',2)
    // ->limit(2)
    //   ->offset(2)
    //  ->take(2)
    //  ->skip(2)
    //     ->get();

    /*  ->where('id', 2)
        ->where(function($query) use ($id)
        {
            $query->where('id','<',$id)->orwhere('id','>',$id);
        })
      
      ->whereNotIn('id',[1,3])

    ->whereNull('updated_at','')
    ->whereDay('created_at', '=', '07')->get();
         */

    //   dd($list);
    //================================================Bài 36 
    /*   DB::table('users')->insert([
        'email'=>'van.tran25@student.passerellesnumeriques.org',
        'name'=>'Nhã Trần',
        'group_id'=>1
    ]);
*//*
      DB::table('users')
      ->where('id',7)
      ->update([
        'email'=>'sang.tran25@student.passerellesnumeriques.org',
        'name'=>'Nhã Trần',
       'updated_at'=>date('Y-m-d H:i:s')
    ]); 
    $lastId = DB::getPdo()->lastInsertId();
       dd($lastId); 
        $sql =  DB::getQueryLog();
        // Di chuyển hàm dd(DB::getQueryLog()) sau câu truy vấn để đảm bảo nó được gọi sau khi câu truy vấn thực sự được thực hiện.
*/


    $list = DB::table('users')
      //   ->where('group_id', '=', DB ::raw())
      // ->selectRaw('name, email, count(id)')
      //  ->orwhereRaw('id >8')
      // ->orderByRaw('created_at DESC')
      //  ->orderBy(DB::raw('created_at DESC'), )
      ->get();
    //  ->groupBy('email')
    //   ->groupBy('name');
    //  ->where(DB::raw('id>8'));
    // ->where('id', '>', 8);
    // $count = count($list);
    // Lấy 1 bản ghi đầu tiên của table
    $detail = DB::table($this->table)->first();
    dd($detail);
  }
}

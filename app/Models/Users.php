<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    public function getAllUser()
    {

        $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');
        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (name, email, created_at) values (?,?,?)', $data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM users WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id){
        $data[] = $id;
        return DB::update('UPDATE users SET email= ?,name=?,  updated_at=? where id = ?', $data);
    }
    
    public function deleteUser($id)
    {
      return  DB::delete("DELETE FROM users WHERE id=?", [$id]);
    }

      public function statementUser($sql)
    {
        return DB::statement($sql);
    }

    
   public function learningQueryBuilder()
{

     DB::getQueryLog();
     $id = 2;
    // Lấy tất cả các bản ghi của table
    $list = DB::table($this->table)
        ->select('users.*','groupss.name as group_name')
        ->join('groupss', 'users.group_id', '=', 'groupss.id')
        ->get();

      /*  ->where('id', 2)
        ->where(function($query) use ($id)
        {
            $query->where('id','<',$id)->orwhere('id','>',$id);
        })
      
      ->whereNotIn('id',[1,3])

    ->whereNull('updated_at','')
    ->whereDay('created_at', '=', '07')->get();
         */

  dd($list);
   $sql =  DB::getQueryLog();
    // Di chuyển hàm dd(DB::getQueryLog()) sau câu truy vấn để đảm bảo nó được gọi sau khi câu truy vấn thực sự được thực hiện.
  
 dd($sql);
    // Lấy 1 bản ghi đầu tiên của table
    $detail = DB::table($this->table)->first();
    dd($detail);
}

}

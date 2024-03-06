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
        // Lấy tất cả các bản ghi của table
       $list = DB::table($this->table)
       ->select('email', 'name')
    //   ->where('id',2)
     //  ->where('id','>',2)
     // sử dụng kết hợp sử dụng AND cách 1
     /*  ->where('id','>=',2)
       ->where('id','<=',2)

       // Cách hai sử dụng mảng hai chiều cho AND
       ->where([
        [
            'id','>=',3
        ],
         [
            'id','<=',4
        ]

       ])
       */
      // Sử dụng orderwhere 
        ->where('id',2)
        ->orWhere('id', 4)

       ->get();
       dd($list);
    

       // Lấy 1 bản ghi đầu tiên của table (Lấy thông tin không thấy tội ghê )
        $detail = DB::table($this->table)->first();
        dd($detail);
        
     }
}

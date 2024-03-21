<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use app\Http\Controllers\DB;

class PostController extends Controller
{

    public function index()
    {
        /*
       $allPost = Post::all();
       if($allPost->count()>0){
        foreach($allPost as $item){
            echo $item->title;
        }
       }
       */
        //       $detailPost = Post::find(1);
        //     dd($detailPost);
        // $activePost = DB::table('posts')->where('status',1)->orderBy('id','DESC')->get();
        /*
     $activePost = Post::where('status',1)->get();
       if($activePost->count()>0){
        foreach($activePost as $item){
            echo $item->title .'<br>';
        }
       }
       //
        $allPost = Post::all();
        $activePosst=  $allPost->reject(function($post){
            return $post->status==0;
        });

        dd($activePosst);
      
 $allPost = Post::all();
    Post::chunk(2, function ($sposts){
            foreach($sposts as  $posts ){
                echo $posts->title .'<br>';
            }

            echo "Kết thúc";
    });
  */
        $allPost = Post::cursor();

        foreach ($allPost as $item) {
            echo $item->title . '<br>';
        }
    }


    public function add()
    {
        /*
        $dataInsert = [
            'title' => 'Lịch thi đấu và trực tiếp giải Thanh Niên sinh viên hôm nay: Căng như dây đàn',
            'content' => 'Lịch thi đấu và trực tiếp giải Thanh Niên sinh viên hôm nay: Căng như dây đàn',
            'status' => 1
        ];
        $post=Post::firstOrCreate([
            'id' => 13
        ], $dataInsert);
        dd($post);
        // $post = Post::create($dataInsert);

        //    echo "Id vừa insert " . $post->id;
        // $insertStatus= Post::insert($dataInsert);
        // dd($insertStatus);
        // dd()*/
        $check = true;

        $post = new Post();
        $post->title = "Bài viết mới";
        $post->content = "Bài viết mới";
        if($check){
            $post->status=1;
        }
        // Làm chức năng quên mật khẩu 
        $post->save();
         echo "Id vừa insert " . $post->id;
        // dd($post);

    }
}

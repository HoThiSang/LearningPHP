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
}

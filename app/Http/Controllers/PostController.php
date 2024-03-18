<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Post;
class PostController extends Controller
{
    
    public function index()
    {
     //  $allPost = Post::all();

      //  dd($allPost);

      $post = new Post();
      $post->title = 'Bài viết 1';
      $post->content = 'Nội dung 1';
     /// $post->statuts = 1;
      $post->save();
    }
}

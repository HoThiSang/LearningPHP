<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function index()
    {
        $title = "Học lập trình web tại Diepthao.com";
        $content = "Học Laravel tại Diepthao.com";
        /*
        $dataView = [
            'title' => $title,
            'content' => $content
        ];
    -------
        $contentView = view('home');
        $contentView= $contentView->render();// Khi mong muốn xử lý dữ liệu thô
        echo $contentView;
          return View::make('home', compact('title', 'content'));
        return view('home')->with(['title'=>$title, 'content'=>$content]);
*/
        return view('home', compact('title', 'content'));

    }


    public function getNews()
    {
        return "Danh sách tin tức";
    }

    public function getCategory($id)
    {
        return "Danh sách category " . $id;
    }

     public function getProductDetail($id)
    {
     //  return $id;
      // return "Danh sách category " . $id;
      //  return view('clients/products/detail', compact('id'));
        return view('clients.products.detail', compact('id'));
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DashboardConntroller extends Controller
{

    public function __construct()
    {
       // echo "khởi động dashboard";
      //  return "khởi động dashboard";
      // Sử dụng session để check login 
    }
    public function index(){
        return "<h1>Welcome to admin dashboard</h1>";
    }
}

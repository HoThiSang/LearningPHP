<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return "Danh sách sản phẩm";
    }

    /**
     * Show the form for creating a new resource.
     Hiển thị form thêm sản phẩm
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     Xử lý thêm sản phẩm --> POST
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
    Lấy ra thông tin của 1 sản phảm 
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
    Hiển thị form
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

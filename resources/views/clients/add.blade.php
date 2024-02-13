@extends('layouts.client');

@section('title')
{{$title}}
@endsection

@section('sidebar')
@parent
<h1>Add products</h1>
@endsection

@section('content')
    <h1>Thêm sản phẩm</h1>
    <form action="" method="post">
        <input type="text" name="username" />
        <button type="submit">Submit</button>

        @csrf
        @method('PUT')
    
    </form>
@endsection


@section('css')

@endsection

@section('js')

@endsection
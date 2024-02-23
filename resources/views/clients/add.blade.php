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
    @if ($errors->any())
    <div class="alert alert-danger text-center">
       {{$errorMessage}}
    </div>
    @endif
    <div class="mb" -3>
        <label for="product_name">Product name: </label>
        <input type="text" name="product_name" placeholder="Product name ..." value="{{old('product_name')}}" />
        @error('product_name')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    <div class="mb" -3>
        <label for="product_name">Product price: </label>
        <input type="text" name="product_price" placeholder="Product price ..."value="{{old('product_price')}}" />
         @error('product_price')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>


    <button type="submit">Create</button>

    @csrf


</form>
@endsection


@section('css')

@endsection

@section('js')

@endsection
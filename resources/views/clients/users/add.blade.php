@extends('layouts.client')

@section('title', $title)

@section('sidebar')
    @parent
    <h1>PRODUCTS SIDEBAR</h1>
@endsection

@section('content')

    @if (session('msg'))
        <h1>Danh sách người dùng</h1>
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    
    @if($error->any())
        <div class="alert alert-danger">Dư liệu nhập không hợp lệ</div>
    @endif

    <h1>{{ $title }}</h1>
   
   <form action="" method="post">
    <div class="mb-3">
        <label for="username">Họ và tên</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Họ và tên">
        @error('username')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
     <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          @error('email')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    @csrf
    <button type="submit" class="btn btn-success">Thêm mới</button>
    <a href="{{route('user.post-add')}}" class="btn btn-warning">Quay lại</a>
   </form>
    
@endsection

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

    @if($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif

    <h1>{{ $title }}</h1>

      <form action="{{ route('users.getEdit', ['id' => $userDetail->id]) }}" method="post">
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="{{old('email') ?? $userDetail->email}}">
                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="username">Họ và tên</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Họ và tên" value="{{old('name')?? $userDetail->name}} ">
                @error('username')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            @csrf
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('users.index') }}" class="btn btn-warning">Quay lại</a>
        </form>
 
@endsection
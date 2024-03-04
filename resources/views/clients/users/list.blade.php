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

    <h1>{{ $title }}</h1>
    <a href="{{route('users.add')}}" class="btn btn-primary">Thêm khách hàng mới</a>
   <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Name</th>
                <th style="width:15%">UTime</th>
                <th width:"5%">Sửa</th>
                <th width:"5%">Xóa</th>
            </tr>
        </thead>
        
        <tbody>
            @if(!empty($userList))
                @foreach ($userList as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                                               <td>
                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

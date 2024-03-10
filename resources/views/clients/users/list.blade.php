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
<a href="{{route('users.add')}}" class="btn btn-primary mb-4">Thêm khách hàng mới</a>
<hr />
<form action="" method="get" class="mb-3">
    <div class="row">
        <div class="col-3">
            <select name="status" id="" class="form-control">
                <option value="0">Tất cả trạng thái</option>
                <option value="active" {{request()->status=='active'? 'selected': false}}>Kích hoạt</option>
                <option value="inactive" {{request()->status=='inactive'? 'selected': false}}>Chưa kích hoạt</option>
            </select>
        </div>
        <div class="col-3">
            <select name="group_id" id="" class="form-control">
                <option value="0">Tất cả nhóm</option>
                @if(!empty(getAllGroups()))
                @foreach(getAllGroups() as $item)
                <option value="{{$item ->id}}" {{request()
                             ->group_id==$item->id ? 'selected': false}}>{{$item->group_name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="col-4">
            <input type="search" name="keyword" id="" class="form-control" placeholder="Tìm kiếm......." value="{{request()->keyword}}">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
        </div>
    </div>

</form>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>STT</th>
            <th><a href="?sort-by=email&sort-type={{$sortType}}">Email</a></th>
            <th style="width:15%"><a href="?sort-by=name&sort-type={{$sortType}}">Name</a></th>
            <td>Nhóm</td>
            <td>Trạng thái</td>
            <th style="width:15%"><a href="?sort-by=created_at&sort-type={{$sortType}}">Time</a></th>
            <th width:"5%">Sửa</th>
            <th width:"5%">Xóa</th>
        </tr>
    </thead>

    <tbody>
        @if(!empty($userList))
        @foreach ($userList as $key => $user)
        <tr>
            <td>{{ 1}}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{$user ->group_name}}</td>
            <td>
                {!! $user->status == 0 ? '<button type="submit" class="btn btn-danger btn-sm">Chưa kích hoạt</button>' : '<button type="submit" class="btn btn-success btn-sm">Kích hoạt</button>' !!}
            </td>

            <td>{{ $user->created_at }}</td>
            <td>
                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
            </td>
            <td>
                <a href="{{route('users.delete',  ['id' => $user->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
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
<div class="d-flex justify-content-end">
{{$userList->links()}}
</div>
@endsection
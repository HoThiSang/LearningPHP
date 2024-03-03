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
    <a href="{{route('users.add')}}" class="btn btn-primary"></a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Name</th>
                <th style="width:15%">UTime</th>
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
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

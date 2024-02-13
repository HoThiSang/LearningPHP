@extends('layouts.client');

@section('title')
{{$title}}
@endsection

@section('sidebar')
@parent
<h1>HOME SIDEBAR</h1>
@endsection

@section('content')
    <h1>Home</h1>
    @datetime("2021-12-15 15:00:30")
    @include('clients.content.slide')
     @include('clients.content.about')
     @datetime("2024-2-14 04:55:00")
@endsection


@section('css')

@endsection

@section('js')

@endsection
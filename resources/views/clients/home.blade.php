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
    @include('clients.content.slide')
     @include('clients.content.about')
@endsection


@section('css')

@endsection

@section('js')

@endsection
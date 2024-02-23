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

     @env('production')
    <p>Môi trường production</p>
    @elseenv('test')
    <p>môi trường test</p>
    @else
    <p>Môi trường dev</p>
     @endenv

  <x-alert type="info" :content="$message" data-icon="facebook"/>
  
  
    <p><img src="https://phunugioi.com/wp-content/uploads/2020/04/ve-tranh-de-tai-ngay-tet-don-giao-thua.jpg" alt=""></p>

    <p><a href="{{route('download-image').'?image='. public_path(asset('storage/Avatar.jpg'))}}" class="btn btn-primary">Download ảnh</a></p>
    <p><a href="{{route('download-doc').'?image='. public_path(asset('storage/demo-pdf.pdf'))}}" class="btn btn-success">Download doc</a></p>


@endsection


@section('css')
<style>
    img{
        max-width: 100%;
        height: auto;
    }
</style>
@endsection

@section('js')

@endsection
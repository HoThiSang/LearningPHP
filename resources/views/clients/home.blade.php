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
  
   {{-- <x-inputs.button />
    <x-form.button />--}}
@endsection


@section('css')

@endsection

@section('js')

@endsection
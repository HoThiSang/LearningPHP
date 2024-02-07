@extends('layouts.client');

@section('title')
{{$title}}
@endsection

@section('sidebar')
@parent
<h1>HOME SIDEBAR</h1>
@endsection

@section('content')
<h1>Trang chủ</h1>
<button type="button" class="show">Show</button>
@endsection


@section('css')
<style>
    header {
        background: yellow;
    }
</style>
@endsection

@section('js')
<script>
    document.querySelector('.show').onclick = function() {
        alert('Thành công');
    }
</script>
@endsection
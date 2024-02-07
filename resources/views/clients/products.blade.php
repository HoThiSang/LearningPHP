@extends('layouts.client');

@section('title')
{{$title}}
@endsection

@section('sidebar')
@parent
<h1>PRODUCTS SIDEBAR</h1>
@endsection

@section('content')
<h1>SẢN PHẨM</h1>
<button type="button" class="show">Show</button>
@endsection


@section('css')
<style>
    header {
        background: green;
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
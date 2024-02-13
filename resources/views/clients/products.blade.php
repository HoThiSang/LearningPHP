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

    @push('scripts')
    <script>
            console.log("OK 2");
        </script>
    @endpush
@endsection


@section('css')
@endsection

@section('js')

@endsection

@prepend('scripts')
<script>
        console.log("OK 1");
    </script>
@endprepend
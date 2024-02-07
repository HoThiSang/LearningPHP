<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Trang chủ Laravel</h1>
    <h2>{{$welcome}}</h2>
    <h2>{{!empty(request()->keyword) ? request()->keyword : "Không có gì"}}</h2>
    <div class="container">
        {{!! !empty($content) ? $content : false !!}}
    </div>
    <hr>
    @php
    $message = "Đặt hàng thành công";
    @endphp
@include('parts.notice')
 

</body>

</html>
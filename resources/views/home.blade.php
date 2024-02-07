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

 /*
@forelse ($dataArr as $item)
<p>Phần tử : {{$item}}</p>
@empty 
@endforelse*/

@if($number<0)
<p>Đây là giá trị hợp lệ</p>
@elseif($number>=0 && $number<5)
<p>Số siêu nhỏ</p>
@elseif($number>=0 && $number<5)
<p>Số siêu nhỏ</p>
@elseif($number>=0 && $number<5)
<p>Số siêu nhỏ</p>
<p>Số lơn</p>
@endif

@for($i=1; $i<=10; $i++)
   <p>Phần tử : {{$i}}</p>
   @if($i==5)
   @continue
    @endif
@endfor


</body>

</html>
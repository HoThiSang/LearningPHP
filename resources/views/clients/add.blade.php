@extends('layouts.client');

@section('title')
{{$title}}
@endsection

@section('sidebar')
@parent
<h1>Add products</h1>
@endsection

@section('content')
<h1>Thêm sản phẩm</h1>
<form action="{{route('post-add')}}" method="post" id="product-form">
  
    <div class="mb" -3>
        <label for="product_name">Product name: </label>
        <input type="text" name="product_name" placeholder="Product name ..." value="{{old('product_name')}}" />
        @error('product_name')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    <div class="mb" -3>
        <label for="product_name">Product price: </label>
        <input type="text" name="product_price" placeholder="Product price ..."value="{{old('product_price')}}" />
         @error('product_price')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>


    <button type="submit">Create</button>

    @csrf


</form>
@endsection


@section('css')

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#product-form').on('submit', function(e){
            e.preventDefault();
           let product_name = $('input[name="product_name"]').val().trim();
            let product_price = $('input[name="product_name"]').val().trim();
            
            let actionUrl =  $(this).attr('action');
           let csrfToken = $(this).find('input[name="_token"]').val();
          
          $('.error');
            $.ajax({
                url:actionUrl,
                type : 'POST',
                data :{
                    product_name : product_name,
                    product_price:product_price,
                    _token: csrfToken
                },
                dataType: 'json',
                success:function(response){
                    console.log(response);
                },
                error: function(error){
                  let responseJSON = error.responseJSON.errors;

                  for(let key in responseJSON){
                    console.log(responseJSON[key]);
                    $('.'+key+'_error').text(responseJSON[key][0])
                  }
                },
            })
        })
    })
</script>
@endsection
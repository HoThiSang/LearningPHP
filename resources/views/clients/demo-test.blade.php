<h2>Demo view Tứ Diệp Thảo</h2>
@if (session('mess'))
    <div class="alert alert-success">
        {{ session('mess') }}
    </div>
@endif
<form action="" method="post">
    <input type="text" name="user_name" placeholder="Username" value="{{old('user_name')}}"/>
    <button type="submit">Submit</button>
    @csrf
</form>
<form action="/laravel" method="post">
<div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Email address</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div>
<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
<input type="hidden"  name="_method" value="delete" />
<button type="submit" class="w-100%">Submit</button>show-form
</form>
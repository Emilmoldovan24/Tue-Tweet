<!doctype html>
<body>
  <form action="{{ route('passChanged')}}" method="POST">
    <label for="fname">New password:</label><br>
    <input type="text" name="password" id='password' value=>
    <input type='hidden' name="email" id='email' value="{{$email}}">
    <input type="submit" value="Submit">
    <input type="hidden" name="_token" value="{{  Session::token() }}">
  </form> 
      
</body>
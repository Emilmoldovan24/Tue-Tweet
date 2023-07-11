<!doctype html>
<body>
  <form action="{{ route('passChangeVerify')}}" method="POST">
        <label for="fname">Email:</label><br>
        <input type="text" name="email" id='email' value=>
        <input type="submit" value="Submit">
        <input type="hidden" name="_token" value="{{  Session::token() }}">
  </form> 
      
</body>
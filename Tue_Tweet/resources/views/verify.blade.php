<!DOCTYPE html>
<body>
    You need to verify your email before continuing.
    <p>Username: {{$usr_data['username']}} </p>
    <p>Email: {{$usr_data['email']}} </p>
    <p>Password: {{$usr_data['user_password']}} </p>

    <form action="{{ route('signup')}}" method="POST">
        <input type='hidden' name="username" id='username' value="{{$usr_data['username']}}">
        <input type='hidden' name="email" id='email' value="{{$usr_data['email']}}">
        <input type='hidden' name="user_password" id='user_password' value="{{$usr_data['user_password']}}">
        <button type="submit" class="btn btn-primary"> Submit </button> <!-- Sould only be visible if Email is verified -->
        <input type="hidden" name="_token" value="{{  Session::token() }}">
    </form>
</body>
</html>
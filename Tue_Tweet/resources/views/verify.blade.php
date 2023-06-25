<!DOCTYPE html>
<body>
    You need to verify your account before continuing. We have sent you an email containing a verification code. Please enter it below!
    <p>Username: {{$usr_data['username']}} </p>
    <p>Email: {{$usr_data['email']}} </p>
    Verification Code: <input type="text" id="myCode">
    <button onclick="verifyCode()">Verify</button>
    
    <p id="code"></p>
    <script>
        function verifyCode() {
          var x = document.getElementById("myCode").value;
          if ({{$usr_data['randomNumber']}} == x) {
            document.getElementById("code").innerHTML = "The code is correct";
            document.getElementById("subBut").style.display = "";

          } else {
            document.getElementById("code").innerHTML = "The code is NOT correct";
          }
        }
        </script>

    <form action="{{ route('signup')}}" method="POST">
        <input type='hidden' name="username" id='username' value="{{$usr_data['username']}}">
        <input type='hidden' name="email" id='email' value="{{$usr_data['email']}}">
        <input type='hidden' name="user_password" id='user_password' value="{{$usr_data['user_password']}}">
        <button id="subBut" type="submit" class="btn btn-primary"> Submit </button> <!-- Sould only be visible if Email is verified -->
        <input type="hidden" name="_token" value="{{  Session::token() }}">
    </form>
    <!--
    <script>
        document.getElementById("subBut").style.display = "none";
    </script>
    -->
</body>
</html>
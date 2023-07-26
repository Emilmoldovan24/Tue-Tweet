<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verify</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
  * {
  box-sizing: border-box;
  align-items: center;
  text-align: center;
}

  #codeCorrect {
    font-size: 20px;
    font-weight: bold;
color: lightgreen;
}

#codeWrong {
  font-size: 20px;
  font-weight: bold;
color: darkred;
}


body {
  min-width: 800px;
  background-color: #a71b28;

 
  align-items: center;
  justify-content: center;
  text-align: center;
 
  margin: 0;
  color: white;
}

.container{
 margin-top: 100px;
 margin-bottom: 100px;
  align-items: center;
  justify-content: center;
  background-color: rgba(255, 255, 255, 0.3);
  border-radius: 10px;
  padding: 30px;

  text-align: center;
}

.code-container{
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin: 40px 0;
}

.code-container div{
  align-items: center;
  justify-content: center;
  text-align: center;
}

.code{
  caret-color: transparent;
  background-color: #a71b28;
  border-radius: 10px;
  border: 1px solid #eee;
  font-size: 30px;
  font-family: "Lato", sans-serif;
  width: 90%;
  margin: 10px;
  text-align: center;
  font-weight: 300;
  color: white;
}



.code::-webkit-outer-spin-button,
.code::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.code:valid {
  border-color: #00fe10;
  box-shadow: 0 10px 10px -5px rgba(0, 0, 0, 0.25);
}

.btn{
  width: 50%;
  font-family: "Lato", sans-serif;
  min-width: 400px;
  display: inline-block;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  user-select: none;
  cursor: pointer;
  border: 1px solid transparent;
  margin: 0px 0px 20px 0px;
  padding: 0.775rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 10px;
  text-transform: uppercase;
  letter-spacing: 0.7;
}

.btn-primary{
  color: #fff;
  background-color: #9861c2;
  border-color: #9861c2;
}
.tuetweetlogo {
    margin-bottom: 20px;
    width: 200px;
    border-radius: 7px;
    
}
.btn.btn-danger{
  width: 200px;
}
</style>
<body>

<div class="container">
<div class="col-12">
<img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}" alt="logo">
    <h2>You need to verify your account</h2>
     <p>We have sent you an email containing a verification code. Please enter it below!</p>
    <p>Username: {{$usr_data['username']}} </p>
    <p>Email: {{$usr_data['email']}} </p>
    <div class="code-container">
      <form>
      <div class="mb-3">
    <input type="number" class="code" placeholder="Type in your code" min="0" max="999999" required>
    </div>
      <button type="submit" class="btn btn-danger">Verify</button>
    </form>
 
    </div>
    <div
      id="codeCorrect">
</div>
<div
      id="codeWrong">
</div>
    
    <script>
         document.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault(); // Verhindert das Standardverhalten des Submit-Buttons

      var inputs = document.querySelectorAll('.code');
      var ScannedNumber = '';

      for (var i = 0; i < inputs.length; i++) {
        ScannedNumber += inputs[i].value;
      }
      
 
          if ({{$usr_data['randomNumber']}} == ScannedNumber) {
            document.getElementById("codeCorrect").innerHTML = "The code is correct";
            document.getElementById("subBut").style.display = "";

          } else {
            document.getElementById("subBut").style.display = "none"; // Button ausblenden
            document.getElementById("codeWrong").innerHTML = "The code is NOT correct";
          }
        
        });
        </script>

    <form action="{{ route('signup')}}" method="POST">
        <input type='hidden' name="username" id='username' value="{{$usr_data['username']}}">
        <input type='hidden' name="email" id='email' value="{{$usr_data['email']}}">
        <input type='hidden' name="user_password" id='user_password' value="{{$usr_data['user_password']}}">
        <button id="subBut" type="submit" class="btn btn-danger" style="display: none;">Continue</button>
        <input type="hidden" name="_token" value="{{  Session::token() }}">
    </form>

      </div>
      </div>
</body>
</html>
<!DOCTYPE html>
<style>
  * {
  box-sizing: border-box;
  align-items: center;
  text-align: center;
}

  #code {
  position: relative;
  margin: 0 auto;
  color: red;
}


body {
  background-image: linear-gradient(142deg,#9861c2, #5cc0de);
  font-family: "Lato", sans-serif;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  overflow: hidden;
  margin: 0;
}

.container{
  background-color: rgba(255, 255, 255, 0.3);
  border-radius: 10px;
  padding: 30px;
  max-width: 1000px;
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
  background-color: rgba(255, 255, 255, 0.6);
  border-radius: 10px;
  border: 1px solid #eee;
  font-size: 30px;
  font-family: "Lato", sans-serif;
  width: 75px;
  height: 80px;
  margin: 10px;
  text-align: center;
  font-weight: 300;
}

@media (max-width: 600px) {
  .code-container{
    flex-wrap: wrap;
    text-align: center;
  }
  .code{
    font-size: 24px;
    height: 50px;
    max-width: 50px;
    font-size: bold;
    text-align: center;
  }
}

.code::-webkit-outer-spin-button,
.code::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.code:valid {
  border-color: #9861c2;
  box-shadow: 0 10px 10px -5px rgba(0, 0, 0, 0.25);
}

.btn{
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
</style>
<body>
<div class="container">
    <h2>You need to verify your account</h2>
     <p>We have sent you an email containing a verification code. Please enter it below!</p>
    <p>Username: {{$usr_data['username']}} </p>
    <p>Email: {{$usr_data['email']}} </p>
    <div class="code-container">
      <form>
      <input type="number" class="code" placeholder="0" min="0" max="9" required>
      <input type="number" class="code" placeholder="0" min="0" max="9" required>
      <input type="number" class="code" placeholder="0" min="0" max="9" required>
      <input type="number" class="code" placeholder="0" min="0" max="9" required>
      <input type="number" class="code" placeholder="0" min="0" max="9" required>
      <input type="number" class="code" placeholder="0" min="0" max="9" required>
      <button type="submit" class="btn btn-primary">Verify</button>
    </form>
    <div
      id="code">
</div>
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
            document.getElementById("code").innerHTML = "The code is correct";
            document.getElementById("subBut").style.display = "";

          } else {
            document.getElementById("subBut").style.display = "none"; // Button ausblenden
            document.getElementById("code").innerHTML = "The code is NOT correct";
          }
        
        });
        </script>

    <form action="{{ route('signup')}}" method="POST">
        <input type='hidden' name="username" id='username' value="{{$usr_data['username']}}">
        <input type='hidden' name="email" id='email' value="{{$usr_data['email']}}">
        <input type='hidden' name="user_password" id='user_password' value="{{$usr_data['user_password']}}">
        <button id="subBut" type="submit" class="btn btn-primary" style="display: none;">Continue</button>
        <input type="hidden" name="_token" value="{{  Session::token() }}">
    </form>

      </div>

</body>
</html>
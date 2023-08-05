<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin Log-In</title>
</head>

<style>
    body {
        min-width: 650px;
    }

    .container {
   display: flex;
   justify-content: center;
   align-items: center;
}

    .tuetweetlogo {
    margin-top: 30px;
    margin-left: 90px;
    width: 300px;
}

.btn.btn-light{
    margin: 5px; 
   font-size: 20px;
    letter-spacing: 1px;
    border-radius: 9px;
}

    .lead-form {
    width: 80%;
    margin: 10px auto;
    border: 2px solid;
    border-radius: 9px;
 
    padding: 30px 20px;
    background-color: #a71b28;

    color: white;
}

.back.btn.btn-light{
   background-color: #a71b28;
   color: white;

}
@media (max-width: 426px) {
    .tuetweetlogo {
    width: 60%;
  }
}
</style>
<body>
{{-- Design! Fehlermeldungen --}}

     <!--  SignIn   -->
     <img class="tuetweetlogo" src="{{ asset('images/tuelogo.png') }}" alt="logo">
     <div class="container">





     <div class="col-md-6 text-center">
                    <div class="lead-form">
                        <div class="title-box">
                            <h3>Admin Log-In</h3>
                        </div>

    
            <form action="{{ route('adminLogin')}}" method="POST">
                <div class="form-group">
                    <label for="email"> Your E-Mail </label>
                    @section('content')
        @if (count($errors) > 0) 
            <div class='row'>
            <div class="col text-left">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email">
                </div>
            
   
                <div class="form-group">
                    <label for="user_password"> Your Password </label>
                    <input class="form-control @error('user_password') is-invalid @enderror" type="password" name="user_password" id="user_password"> 
                </div>
                <button type="submit" class="btn btn-light"> Submit </button>
                <input type="hidden" name="_token" value="{{  Session::token() }}">
            </form>
        </div>
        
        <!--Back Button-->
      
            <form action="{{ route('welcome') }}" method="GET">
                <button type="submit" class="back btn btn-light"> Back to Welcome-Page </button>
            </form>
       
        
</div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
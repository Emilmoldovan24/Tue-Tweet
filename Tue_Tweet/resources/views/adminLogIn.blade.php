<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blabla</title>
</head>



<body>
     <!--  SignIn   -->
     <div class="col-md-6">
            <h3> Sign In </h3>
            <form action="{{ route('adminLogin')}}" method="POST">
                <div class="form-group">
                    <label for="email"> Your E-Mail </label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="user_password"> Your Password </label>
                    <input class="form-control @error('user_password') is-invalid @enderror" type="password" name="user_password" id="user_password"> 
                </div>
                <button type="submit" class="btn btn-primary"> Submit </button>
                <input type="hidden" name="_token" value="{{  Session::token() }}">
            </form>
        </div>
</body>
</html>
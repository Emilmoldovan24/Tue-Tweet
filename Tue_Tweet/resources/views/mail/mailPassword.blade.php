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
      * {
  box-sizing: border-box;
  align-items: center;
  text-align: center;
}
body {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  overflow: hidden;
  margin: 0;
  color: black;
}
    .container {
   display: flex;
   align-items: center;
   justify-content: center;
   text-align: center;
   border-radius: 10px;
   border: 3px solid #a71b28;
}
    .tuetweetlogo {
   
    width: 200px;
}
.passLink {
    border: 2px solid #a71b28;
    border-radius: 3px;
    font-size: 35px;
}
    </style>
<body>
<div class="container">
<div class="col-md-6 text-center">
<img class="tuetweetlogo" src="{{ asset('images/tuelogo.png') }}" alt="logo">

<h1>Hi {{ $username }}! </h1>
<h5>Click the following link to change your password:</h5>
<p>
    <a class="passLink" href="{{ $url }}">Click</a><br>
</p>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

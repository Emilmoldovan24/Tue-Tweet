<!DOCTYPE html>
<html lang="en">

<?php use App\Http\Controllers\ProfileController; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{dd($profileUsername)}} </title>
</head>
<body>
    <p> This should be @{{dd($profileUsername)}}'s profile </p>
</body>
</html>
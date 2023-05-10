<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blabla</title>
</head>
<body>
<div>
        <?php
           use Illuminate\Support\Facades\DB;
 
           $users = DB::select('select * from users ');
            
           foreach ($users as $user) {
               echo $user->username.'<br>';
               echo $user->user_id.'<br>';
           }
        ?>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Manage Users</title>
</head>

<style>
    body {
        background-color: #E7E7E7;

    }

    .container {
        margin-top: 32px;
        display: flex;
    }

    .left-side-content {
        margin-right: 32px;
        width: 15%;
    }

    .main-content {
        width: 80%;
        border-width: 5px;

    }

    .menu {}

    .menu a {
        text-decoration: none;
        ´ color: black;

    }

    .user {
        width: 100%;
        background-color: white;
        border-radius: 12px;
        padding: 20px;
        color: black;
        margin: 20px 0;
        border: 6px solid #a71b28;
    }

    .back.btn.btn-light {
        background-color: #a71b28;
        color: white;
        border-radius: 9px;
        margin-right: 20px;
        margin-bottom: 15px;

    }

    .navbar {
        background-color: #a71b28;
        color: red;
    }

    .tuetweetlogo {

        width: 180px;
        border-radius: 9px;
        margin-right: 10px;
    }

    .adminDash {
        color: white;
        font-size: 2, 5vw;
        /* Standard-Schriftgröße */
        max-font-size: 30px;
        /* Maximale Schriftgröße */
        min-font-size: 25px;
        /* Minimale Schriftgröße */
    }

    @media (max-width: 368px) {
        .adminDash {
            display: block;


            font-size: 25px;
            /* Maximale Schriftgröße */

        }
    }
</style>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand"> <img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}"
                    alt="logo">
                <span class="adminDash"> Manage Users </span>
            </a>

        </div>
    </nav>


    <div class="container">

        <div class="left-side-content">

            <div class="list-group">
                <form action="{{ route('adminDash') }}" method="GET">
                    <button type="submit" class="back btn btn-light"> Go back </button>
                </form>


            </div>


        </div>

        <div class="main-content">

            <div class="menu">
                <button type="submit" class="back btn btn-light" onclick="window.location.href='adminUsers?'">All
                    Users</button>
                <button type="submit" class="back btn btn-light"
                    onclick="window.location.href='adminUsers?page=notDeletedUsers'">Active Users</button>
                <button type="submit" class="back btn btn-light"
                    onclick="window.location.href='adminUsers?page=deletedUsers'">Deleted Users</button>


            </div>

            <?php 

            $users = DB::select('select * from users order by created_at desc');
            //use query parameters to check which page should be shown
           if(isset($_GET['page'])){
                if($_GET['page'] == 'deletedUsers'){ 
                   ?> <h1> All deleted users </h1>
            <?php 
                     foreach ($users as $user) {
                        //show all deleted users
                        if($user->deleted_at != NULL){
                            $userID = $user->id;
                            ?>
            <div class="user">
                <?php
                echo "Username: $user->username" . '<br>';
                echo "ID: $user->id" . '<br>';
                echo "E-mail: $user->email" . '<br>';
                echo "Created at: $user->created_at" . '<br>';
                echo "Deleted at: $user->deleted_at" . '<br>';
                ?>
                <button class="back btn btn-light"
                    onclick="window.location.href='{{ route('tweet.restoreUser', $user->id) }}'">Restore user</button>
                <?php
                ?>

                <button class="back btn btn-light"
                    onclick="window.location.href='{{ route('tweet.safeUserInfo', $user->id) }}'">Export user
                    information</button> <?php
                    ?>
            </div>
            <?php         
                        }
                    }
                }else{
                    ?> <h1> All active users </h1> <?php 
                    foreach ($users as $user) {
                        //show all not deleted users
                        if($user->deleted_at == NULL){
                            ?>
            <div class="user">
                <?php
                echo "Username: $user->username" . '<br>';
                echo "ID: $user->id" . '<br>';
                echo "E-mail: $user->email" . '<br>';
                echo "Created at: $user->created_at" . '<br>';
                echo "Deleted at: $user->deleted_at" . '<br>';
                ?>
                <button class="back btn btn-light"
                    onclick="window.location.href='{{ route('tweet.deleteUser', $user->id) }}'">Delete User</button>
                <?php
                
                ?>

                <button class="back btn btn-light"
                    onclick="window.location.href='{{ route('tweet.safeUserInfo', $user->id) }}'">Export user
                    information</button> <?php
                    ?>
            </div>
            <?php         
                        }
                    }
                }
            //show all users
           }else{
                ?> <h1> All users </h1> <?php 
                foreach ($users as $user) {
                    ?>
            <div class="user">
                <?php
                                echo "Username: $user->username".
                                    '<br>';
                                echo "ID: $user->id".
                                    '<br>';
                                echo "E-mail: $user->email".
                                    '<br>';
                                echo "Created at: $user->created_at".
                                    '<br>';
                                echo "Deleted at: $user->deleted_at".
                                    '<br>';
                                if($user->deleted_at == NULL){
                                    ?>
                                <button class="back btn btn-light"
                                    onclick="window.location.href='{{ route('tweet.deleteUser', $user->id) }}'">Delete User</button>
                                <?php
                                }else{
                                    ?>

                                <button class="back btn btn-light"
                                    onclick="window.location.href='{{ route('tweet.restoreUser', $user->id) }}'">Restore user</button>
                                <?php
                                }
                                ?>

                    <button class="back btn btn-light"
                            onclick="window.location.href='{{ route('tweet.safeUserInfo', $user->id) }}'">Export user information</button> 
                    <form method="post"  class="back btn btn-light" type = "submit"
                            action="{{ route('passChangeVerify')}}"  >
                            <input type="text" name="email" id='email' value=>
                            <input type="submit" value= "Send password reset">
                            <input type="hidden" name="_token" value="{{  Session::token() }}">
                        </form>
            </div>
            <?php         
                }
           }
            ?>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>

</html>

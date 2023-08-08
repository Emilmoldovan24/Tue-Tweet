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
        min-width: 650px;

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
    }

    .post-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .user-profile {
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        color: black;
        background-color: white;

    }

    .user-profile img {
        width: 45px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-profile p {
        margin-bottom: -5px;
        font-weight: 500;
        color: #white;
        margin-right: 20px;
    }

    .post-container {
        width: 100%;
        min-width: 337px;
        background-color: white;
        border-radius: 12px;
        padding: 20px;
        color: black;
        margin: 20px 0;
        border: 3px solid #a71b28;
        overflow: hidden;
        word-wrap: break-word;
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
            <!--3 pages for All, Active and not Active Users -->
            <div class="menu">
                <button type="submit" class="back btn btn-light" onclick="window.location.href='adminUsers?'">All
                    Users</button>
                <button type="submit" class="back btn btn-light"
                    onclick="window.location.href='adminUsers?page=notDeletedUsers'">Active Users</button>
                <button type="submit" class="back btn btn-light"
                    onclick="window.location.href='adminUsers?page=deletedUsers'">Deactivated/Deleted Users</button>


            </div>

            <?php 

            $users = DB::select('select * from users order by created_at desc');
            $allUsers = true;
            $activeUsers = false;
            $deactivatedUsers = false;
            //query parameters are used as buttons to set booleans that decide what users are showm
            if(isset($_GET['page'])){
                if($_GET['page'] == 'deletedUsers'){ 
                $allUsers = false;
                $activeUsers = false;
                $deactivatedUsers = true;
                ?> <h1> all deactivated or deleted users </h1>
                <?php  
                }else if($_GET['page'] == 'notDeletedUsers'){
                    $allUsers = false;
                    $activeUsers = true;
                    $deactivatedUsers = false;
                    ?> <h1> all active users </h1>
                <?php         
                }
            }

            //show all users
            {
                if($allUsers) echo("<h1> All users </h1>"); ?>          
                @if(session()->has('messageSuccess'))
                            <div class="alert alert-success">
                                {{ session()->get('messageSuccess') }}
                            </div>
                @elseif(session()->has('messageFail'))
                            <div class="alert alert-danger">
                                {{ session()->get('messageFail') }}
                            </div>
                @endif
                <?php 
                foreach ($users as $user) {
                    if($activeUsers && ($user->activate == 0 || $user->deleted_at != null)){continue;}
                    if($deactivatedUsers && $user->activate == 1){continue;}
                    $username = $user->username;
                    $user_id = $user->id;
                    $userImg = $user->profile_img;
                    $userImgSrc = app('App\Http\Controllers\UserController')->getUserImg($userImg);
                    $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);
                    ?>
                    <div class="user">
                
                            <div class="post-row">
                                <div class="user-profile">
                                    <?php echo $userImgHtml; ?>
                                    <div style="display: inline-block;">
                                        <a style="margin-right: 3px; text-decoration: none; font-weight: bold; color: black;">{{ $username }}</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                //all deleted users are deactivated
                                if($allUsers || $deactivatedUsers){
                                    if($user->deleted_at != null)
                                        echo("[DELETED USER]<br>");
                                    else if($user->activate == 0)
                                        echo("[DEACTIVATED USER]<br>");     
                                }

                                
                                echo "ID: $user_id".
                                    '<br>';
                                echo "E-mail: $user->email".
                                    '<br>';
                                echo "Created at: $user->created_at".
                                    '<br>';
                                if($user->deleted_at != null){
                                    echo "Deleted at: $user->deleted_at".
                                    '<br>';
                                }
                                
                                
                                if($allUsers){
                                //show delete button if user is activ
                                if($user->deleted_at == NULL){
                                    ?>
                                <button class="back btn btn-light"
                                    onclick="window.location.href='{{ route('tweet.deleteUser', $user->id) }}'">Delete User</button>
                                <?php
                                //show restore button if user is deleted
                                }else{
                                    ?>
                                <button class="back btn btn-light"
                                    onclick="window.location.href='{{ route('tweet.restoreUser', $user->id) }}'">Restore user</button>
                                <?php
                                }
                                if($user->activate == 1){
                                    ?>
                                <button class="back btn btn-light"
                                    onclick="window.location.href='{{ route('tweet.deactivateUser', $user->id) }}'">Deactivate User</button>
                                <?php
                                }
                                else{
                                    ?>
                                    <button class="back btn btn-light"
                                    onclick="window.location.href='{{ route('tweet.deactivateUser', $user->id) }}'">Reactivate User</button>
                                    <?php
                                }
                                ?>
                                
                                
                                <?php 

                                if($user->deleted_at == NULL && $user->activate == 1){ //show email reset only if user is activ?>
                                    <button class="back btn btn-light"
                                        onclick="window.location.href='{{ route('tweet.safeUserInfo', $user->id) }}'">Export user information</button> 
                                    <form method="post"  class="back btn btn-light" type = "submit"
                                            action="{{ route('adminPassChangeVerify')}}"  >
                                            <input type="text" name="email" id='email' value=>
                                            <input type="submit" value= "Send password reset">
                                            <input type="hidden" name="_token" value="{{  Session::token() }}">
                                    </form>
                                <?php } 
                                }

                                else if($deactivatedUsers){
                                    if($user->deleted_at != null){
                                        ?>
                                        <button class="back btn btn-light"
                                        onclick="window.location.href='{{ route('tweet.restoreUser', $user->id) }}'">Restore user</button>
                                        <?php
                                    }else if($user->activate == 0 && $user->deleted_at == null){
                                        ?>
                                        <button class="back btn btn-light"
                                        onclick="window.location.href='{{ route('tweet.deactivateUser', $user->id) }}'">Reactivate User</button>
                                        <?php
                                    }
                                    
                                }
                                else if($activeUsers){
                                    ?>
                                    <button class="back btn btn-light"
                                    onclick="window.location.href='{{ route('tweet.deactivateUser', $user->id) }}'">Deactivate User</button>
                                    <button class="back btn btn-light"
                                    onclick="window.location.href='{{ route('tweet.deleteUser', $user->id) }}'">Delete User</button> <br>

                                    <!-- passwort reset -->
                                    <button class="back btn btn-light"
                                        onclick="window.location.href='{{ route('tweet.safeUserInfo', $user->id) }}'">Export user information</button> 
                                    <form method="post"  class="back btn btn-light" type = "submit"
                                            action="{{ route('adminPassChangeVerify')}}"  >
                                            <input type="text" name="email" id='email' value=>
                                            <input type="submit" value= "Send password reset">
                                            <input type="hidden" name="_token" value="{{  Session::token() }}">
                                    </form>

                                <?php
                                }

                                ?>
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

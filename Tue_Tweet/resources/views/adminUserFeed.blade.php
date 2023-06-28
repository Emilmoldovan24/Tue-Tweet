<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>


<style>
body {
    background-color: #DCDCDC;
    /* background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(209, 123, 149, 1) 0%, rgba(63, 106, 144, 1) 65%); */
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

.menu {
    
}

.menu a{
    text-decoration: none;´
    color: black;

}

.user {
    margin-top: 10px;
    padding: 10px;
    background: white;
}
</style>

<body>
    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand">Tue-Tweet - Manage Users</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="container">

        <div class="left-side-content">

            <div class="list-group">
                <form action="{{ route('adminDash') }}" method="GET">
                    <button type="submit" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-right-from-bracket"></i><a> back </a></button>
                </form>


            </div>


        </div>

        <div class="main-content">

            <div class="menu">
                <a href="adminUsers?"> All Users </a> |
                <a href="adminUsers?page=notDeletedUsers"> Active Users </a> |
                <a href="adminUsers?page=deletedUsers"> Deleted Users </a>

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
                                ?>
                                <button><a href="{{ route('tweet.restoreUser', $userID) }}">Restore  user</a></button> <?php
                                ?>
                                
                                <button class="delete-btn"><a href="{{ route('tweet.safeUserInfo', $user->id) }}">Export user information</a></button> <?php
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
                                ?>
                                <button class="delete-btn"><a href="{{ route('tweet.deleteUser', $user->id) }}">Delete  user</a></button> <?php
                                ?>
                                
                                <button class="delete-btn"><a href="{{ route('tweet.safeUserInfo', $user->id) }}">Export user information</a></button> <?php
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
                                    <button class="delete-btn"><a href="{{ route('tweet.deleteUser', $user->id) }}">Delete User</a></button> <?php
                                }else{
                                    ?>
                                    <button class="delete-btn"><a href="{{ route('tweet.restoreUser', $user->id) }}">Restore user</a></button> <?php
                                }
                                ?>
                                
                                <button class="delete-btn"><a href="{{ route('tweet.safeUserInfo', $user->id) }}">Export user information</a></button> <?php
                                ?>
                        </div>
                    <?php         
                }
           }
            ?>
        </div>
    </div>
    

</body>

</html>
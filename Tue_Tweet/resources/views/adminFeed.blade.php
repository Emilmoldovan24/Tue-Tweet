<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Tweets</title>
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
            <a class="navbar-brand">Tue-Tweet - Manage Tweets</a>
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
                <a href="adminFeed?"> Visible Tweets </a> |
                <a href="adminFeed?page=hiddenTweets"> Hidden Tweets </a> |
                <a href="adminFeed?page=deletedTweets"> Deleted Tweets </a>

            </div>

            <?php 

            $tweets = DB::select('select * from tweets order by created_at desc');
            //use query parameters to check which page should be shown
            if(isset($_GET['page'])){
                if($_GET['page'] == 'deletedTweets'){ 
                   ?> <h1> Deleted Tweets </h1> 
                   <?php 
                    foreach ($tweets as $tweet) {
                        if($tweet->deleted_at != NULL){
                            $tweetID = $tweet->tweet_id;
                            $userID = $tweet->user_id;
                            $username = DB::table('users')->where('id', $userID)->value('username');
                            $userImg = DB::table('users')->where('id', $userID)->value('profile_img');
                            $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);
                            ?>
                            <div class="tweet">
                                <?php
                                    echo "tweetID: $tweetID".
                                        '<br>';
                                    echo "Bsername: $username".
                                        '<br>';
                                    echo "userID: $userID".
                                        '<br>';
                                    
                                    echo "Created at: $tweet->created_at".
                                        '<br>';
                                    echo "Deleted at: $tweet->deleted_at".
                                        '<br>';
                                    echo '<br>';
                                    echo "$tweet->tweet".
                                        '<br>';        
                                ?>
                                
                                <button class="delete-btn"><a href="{{ route('tweet.restore', $tweet->tweet_id) }}">Restore Tweet</a></button>
                                
                            </div>
                                <?php         
                        }
                    
                    }
                }
                if($_GET['page'] == 'hiddenTweets'){
                    ?> <h1> Hidden Tweets </h1> <?php 
                    foreach ($tweets as $tweet) {
                        if(($tweet->deleted_at == NULL) && $tweet->visibility == 0){
                            $tweetID = $tweet->tweet_id;
                            $userID = $tweet->user_id;
                            $username = DB::table('users')->where('id', $userID)->value('username');
                            $userImg = DB::table('users')->where('id', $userID)->value('profile_img');
                            $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);
                            ?>
                            <div class="tweet">
                                <?php
                                    echo "tweetID: $tweetID".
                                        '<br>';
                                    echo "Bsername: $username".
                                        '<br>';
                                    echo "userID: $userID".
                                        '<br>';
                                    
                                    echo "Created at: $tweet->created_at".
                                        '<br>';
                                    echo "Deleted at: $tweet->deleted_at".
                                        '<br>';
                                    echo '<br>';
                                    echo "$tweet->tweet".
                                        '<br>';        
                                ?>
                                
                                <button class="delete-btn"><a href="{{ route('tweet.hide', $tweet->tweet_id) }}">UnHide Tweet</a></button>
                                <button class="delete-btn"><a href="{{ route('tweet.delete', $tweet->tweet_id) }}">Delete Tweet</a></button>
                            </div>
                                <?php         
                        }
                    
                    }
                }
            }
            else{
                
                    ?> <h1> Visible Tweets </h1> <?php 
                    foreach ($tweets as $tweet) {
                        //show all deleted users
                        
                        if(($tweet->deleted_at == NULL) && $tweet->visibility == 1){
                            $tweetID = $tweet->tweet_id;
                            $userID = $tweet->user_id;
                            $username = DB::table('users')->where('id', $userID)->value('username');
                            $userImg = DB::table('users')->where('id', $userID)->value('profile_img');
                            $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);
                            ?>
                            <div class="tweet">
                                <?php
                                    echo "tweetID: $tweetID".
                                        '<br>';
                                    echo "Bsername: $username".
                                        '<br>';
                                    echo "userID: $userID".
                                        '<br>';
                                    
                                    echo "Created at: $tweet->created_at".
                                        '<br>';
                                    echo "Deleted at: $tweet->deleted_at".
                                        '<br>';
                                    echo '<br>';
                                    echo "$tweet->tweet".
                                        '<br>';        
                                ?>
                                
                                <button class="delete-btn"><a href="{{ route('tweet.hide', $tweet->tweet_id) }}">Hide Tweet</a></button>
                                <button class="delete-btn"><a href="{{ route('tweet.delete', $tweet->tweet_id) }}">Delete Tweet</a></button>
                            </div>
                                <?php         
                        }
                    
                    }
            }
                
            
            ?>
        </div>
    </div>
    </div>

</body>

</html>
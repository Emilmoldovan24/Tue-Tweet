<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<style>
    body {
        background-color: #DCDCDC;
        /* background: rgb(2, 0, 36);
    background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(209, 123, 149, 1) 0%, rgba(63, 106, 144, 1) 65%); */

    }

    .navbar.bg-dark {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px 5%;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .post-input-container {
        padding-left: 55px;
        padding-top: 20px;
    }

    .post-input-container textarea {
        width: 100%;
        resize: none;
        border-bottom: 10px solid #grey;
        border: 0;
        outline: 0;
        background: transparent;
    }

    .container {
        display: flex;
        justify-content: space-between;
        padding: 13px 5%;
    }

    .left-sidebar {
        margin: 20px 0;
        flex-basis: 25%;
        position: sticky;
        top: 70px;
        align-self: flex-start;

    }

    .right-sidebar {
        margin: 20px 0;
        flex-basis: 25%;
        position: sticky;
        top: 70px;
        align-self: flex-start;
    }

    .main-content {
        flex-basis: 47%;
        align-self: flex-start;
    }

    .write-post-container {
        width: 100%;
        background: white;
        border-radius: 6px;
        padding: 20px;
        columns: #626262;
    }

    .user-profile {
        margin-bottom: 6px;
        display: flex;
        align-items: center;
    }

    .user-profile img {
        width: 45px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-profile p {
        margin-bottom: -5px;
        font-weight: 500;
        color: #626262;
    }

    .user-profile small {
        font-size: 12px;
    }

    .add-post-links {
        display: flex;
        margin-top: 10px;
    }

    .add-post-links a {
        text-decoration: none;
        display: flex;
        align-items: center;
        color: #626262;
        margin-right: 30px;
        font-size: 13px;
        margin-top: 10px;
    }

    .fa-solid.fa-camera.fa-2xl {
        margin-right: 3px;
    }

    .post-container {
        width: 100%;
        background: #fff;
        border-radius: 6px;
        padding: 20px;
        color: #626262;
        margin: 20px 0;
    }

    .user-profile span {
        font-size: 13px;
        color: #9a9a9a;
    }

    .post-text-just-retweet {
        color: #1DA1F2;
        font-family: 'Helvetica Neue Bold', Arial, sans-serif;
        margin: 15px 0;
        font-size: 15px;
    }

    .post-img {
        width: 100%;
        height: 500px;
        border-radius: 4px;
        margin-bottom: 5px;
    }

    .card.mb-3 {
        align-items: center;
    }

    .post-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .activity-icons div {
        display: inline-flex;
        align-items: center;
        margin-right: 20px;
        margin-top: 10px;
    }

    .like-btn {
        display: inline-flex;
        align-items: center;
        margin-right: 20px;
        margin-top: 10px;
    }

    .delete-btn {
        background-color: red;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .hide-btn {
        background-color: yellow;
        color: black; 
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .deleteuser-btn {
        background-color: black;
        color: black; 
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .restoreuser-btn {
        background-color: green;
        color: black; 
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .activity-icons div i {
        display: inline-flex;
        align-items: center;
        margin-right: 5px;
    }

    .post-row a {
        color: black;
    }

    .retweet-text {
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 1px;

    }

    .tweetbox-profile span {
        font-size: 13px;
        color: #9a9a9a;
        margin-left: 10px;
    }

    .tweetbox-profile p {
        margin-top: 14px;
        font-weight: 500;
        color: #626262;

    }

    .tweetbox-profile {
        padding-left: 10px;
        padding-right: 10px;
        color: #626262;
        margin: 5px 0;
        text-align: center;
        justify-content: space-between;
    }

    .tweetbox-profile img {
        width: 45px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .retweet div {
        display: inline-flex;
        align-items: center;
        justify-content: center;

    }

    .retweet {
        border-radius: 6px;
        border: 2px solid;
    }

    #pictureBox img {
        max-width: 50%;
        max-height: 50%;
    }

    #pictureBox {
        display: flex;
        border-color: black;
        border: 2px solid;
        border-radius: 5px;
    }

    .list-group-item i {
        margin-right: 20px;
    }

    .list-group-item a {
        padding-right: 130px;
    }
</style>


<body>
    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand">Tue-Tweet - AdminFeed</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="container">
        
        <!-- MIDDLE-BAR-FEED -->

        <script>
            // toggles the display of the comments when the user clicks on the comments button
            function displayComments(tweet_id) {
                let element = document.getElementById("comments" + tweet_id);
                element.removeAttribute("hidden");

                if (element.style.display == "none" || element.style.display == "") {
                    // show
                    element.style.display = "block";
                } else {
                    // hide
                    element.style.display = "none";
                }
            }

            $(document).ready(function() {
                $(".default_picture").on("error", function() {
                    $(this).attr('src',
                        "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                        );
                });
            });
        </script>

        <div class="main-content">
            <h1> Normal Feed </h1>
        

            <?php
            $users = DB::select('select * from tweets order by created_at desc');
            foreach ($users as $tweet) {
                if($tweet->visibility == 1){
                $id = $tweet->user_id;
                $username = DB::table('users')->where('id', $id)->value('username');
                $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);

                // Tweet header
                echo '<div class="post-container">';
                echo '<div class="post-row">';
                echo '<div class="user-profile">';
                echo $userImgHtml;
                echo '<div>';
                echo '<p>' . $username . '</p>';
                echo '<span>' . $tweet->created_at . '</span>';
                echo '</div>';
                echo '</div>';

                echo '<button class="btn btn-dark" type="button" data-bs-toggle="dropdown"';
                echo 'aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>';
                echo '</div>';

                // Tweet content
                echo $tweet->tweet . '<br>';


                // Activity Icons
                echo '<div class="post-row">';
                echo '<div class="activity-icons">';


                // Count Likes Comments and Retweets
                $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
                $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
                $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->count();


                // Like Button
                echo '<div>';
                echo '<form action=like method="POST">';
                echo csrf_field();
                
                echo '<div class="like-btn">';
                
                // like button turns red if user has liked the tweet
                if (DB::table('likes')->where('tweet_id', $tweet->tweet_id)->where('user_id', Auth::id())->exists()) {
                    echo '<button type="submit" disabled class="btn btn-danger"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                } else {
                    echo '<button type="submit" disabled class="btn btn-dark"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                }
                echo '<input type="hidden" name="tweet_id" value="' . $tweet->tweet_id . '">';
                echo '</div>';
                echo '</form>';
                echo '</div>';

                //echo '<div class="delete-btn">DELTE TWEEET</button>';
                //echo '<button class="delete-btn"> DELETE </buttton>';
                


                

                // Comment Button
                // display comments if button is clicked
                
                echo '<!-- comment button -->';
                echo '<div>';
                echo '<div class="comment-btn">';
                echo '<button onclick="displayComments(' . $tweet->tweet_id . ')" class="btn btn-dark"';
                echo 'aria-expanded="false">';
                echo '<i class="fa-regular fa-comment"></i>' . $numComments . '';
                echo '</button>';
                echo '</div>';
                echo '</div>';

                // Retweet Button
                echo '<div><!-- Retweet button -->';
                echo '<div class="btn-group dropend">';
                echo '<button type="button disabled" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"';
                echo 'aria-expanded="false">';
                echo '<i class="fa-solid fa-retweet"></i>' . $retweets . '';
                echo '</button>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a class="dropdown-item" href="#">Just Retweet</a></li>';
                echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#QuoteModal">Quote</a>';
                echo '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';

                echo '</div>';
                echo '</div>';


                // Comments
                echo '<div class="comments" id="comments' . $tweet->tweet_id . '" hidden>';
                echo '<br>';
                echo '<br>';

                echo '<div class="comment-container">';
                //list comments
                $comments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->get();
                foreach ($comments as $comment) {
                    $commentUsername = DB::table('users')->where('id', $comment->user_id)->value('username');
                    $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                    echo '<div class="comment">';
                    echo '<div class="user-profile">';
                    echo $userImgHtml;
                    echo '<div>';
                    echo '<p>' . $commentUsername . '</p>';
                    echo '<span>' . $comment->created_at . '</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '<p>' . $comment->comment . '</p>';
                    echo '</div>';
                }

                // comment input field
                
                echo '<div class="comment-input">';
                echo '<form action=postComment method="POST">';
                echo csrf_field();
                echo '<div class="input-group mb-3">';
                //echo '<input type="text" name="comment" id="comment" class="form-control" placeholder="Add a comment" aria-label="Add a comment" aria-describedby="button-addon2">';
                //echo '<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>';
                echo '</div>';
                echo '<input type="hidden" name="tweet_id" value="' . $tweet->tweet_id . '">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                //delete button
                ?>  <button class="delete-btn"><a href="{{ route('tweet.delete', $tweet->tweet_id) }}">Delete Tweet</a></button> <?php
                
                //hidebutton
                ?>  <button class="hide-btn"><a href="{{ route('tweet.hide', $tweet->tweet_id) }}">Hide Tweet</a></button> <?php
                
                
                
                echo '</div>';
                }
            }
            
            ?>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-light yx-auto">Load more</button>
            </div>
        </div>

        <div class="main-content">
            <h1> Hidden Feed </h1>
        
            <?php
            $users = DB::select('select * from tweets order by created_at desc');
            foreach ($users as $tweet) {
                if($tweet->visibility == 0){
                $userDeletedAt = DB::table('users')->where('id', $tweet->user_id)->value('deleted_at');
                $userExists = 0;
                if($userDeletedAt == NULL){
                    $userExists = 1;
                }
                $id = $tweet->user_id;
                $username = DB::table('users')->where('id', $id)->value('username');
                $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);

                // Tweet header
                echo '<div class="post-container">';
                echo '<div class="post-row">';
                echo '<div class="user-profile">';
                echo $userImgHtml;
                echo '<div>';
                echo '<p>' . $username . '</p>';
                echo '<span>' . $tweet->created_at . '</span>';
                echo '</div>';
                echo '</div>';

                echo '<button class="btn btn-dark" type="button" data-bs-toggle="dropdown"';
                echo 'aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>';
                echo '</div>';

                // Tweet content
                echo $tweet->tweet . '<br>';


                // Activity Icons
                echo '<div class="post-row">';
                echo '<div class="activity-icons">';


                // Count Likes Comments and Retweets
                $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
                $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
                $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->count();


                // Like Button
                echo '<div>';
                echo '<form action=like method="POST">';
                echo csrf_field();
                
                echo '<div class="like-btn">';
                
                // like button turns red if user has liked the tweet
                if (DB::table('likes')->where('tweet_id', $tweet->tweet_id)->where('user_id', Auth::id())->exists()) {
                    echo '<button type="submit" disabled class="btn btn-danger"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                } else {
                    echo '<button type="submit" disabled class="btn btn-dark"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                }
                echo '<input type="hidden" name="tweet_id" value="' . $tweet->tweet_id . '">';
                echo '</div>';
                echo '</form>';
                echo '</div>';

                //echo '<div class="delete-btn">DELTE TWEEET</button>';
                //echo '<button class="delete-btn"> DELETE </buttton>';
                


                

                // Comment Button
                // display comments if button is clicked
                
                echo '<!-- comment button -->';
                echo '<div>';
                echo '<div class="comment-btn">';
                echo '<button onclick="displayComments(' . $tweet->tweet_id . ')" class="btn btn-dark"';
                echo 'aria-expanded="false">';
                echo '<i class="fa-regular fa-comment"></i>' . $numComments . '';
                echo '</button>';
                echo '</div>';
                echo '</div>';

                // Retweet Button
                echo '<div><!-- Retweet button -->';
                echo '<div class="btn-group dropend">';
                echo '<button type="button disabled" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"';
                echo 'aria-expanded="false">';
                echo '<i class="fa-solid fa-retweet"></i>' . $retweets . '';
                echo '</button>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a class="dropdown-item" href="#">Just Retweet</a></li>';
                echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#QuoteModal">Quote</a>';
                echo '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';

                echo '</div>';
                echo '</div>';


                // Comments
                echo '<div class="comments" id="comments' . $tweet->tweet_id . '" hidden>';
                echo '<br>';
                echo '<br>';

                echo '<div class="comment-container">';
                //list comments
                $comments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->get();
                foreach ($comments as $comment) {
                    $commentUsername = DB::table('users')->where('id', $comment->user_id)->value('username');
                    $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                    echo '<div class="comment">';
                    echo '<div class="user-profile">';
                    echo $userImgHtml;
                    echo '<div>';
                    echo '<p>' . $commentUsername . '</p>';
                    echo '<span>' . $comment->created_at . '</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '<p>' . $comment->comment . '</p>';
                    echo '</div>';
                }

                // comment input field
                
                echo '<div class="comment-input">';
                echo '<form action=postComment method="POST">';
                echo csrf_field();
                echo '<div class="input-group mb-3">';
                //echo '<input type="text" name="comment" id="comment" class="form-control" placeholder="Add a comment" aria-label="Add a comment" aria-describedby="button-addon2">';
                //echo '<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>';
                echo '</div>';
                echo '<input type="hidden" name="tweet_id" value="' . $tweet->tweet_id . '">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                //delete button
                ?>  <button class="delete-btn"><a href="{{ route('tweet.delete', $tweet->tweet_id) }}">Delete Tweet</a></button> <?php
                

                if($userExists){
                    ?>  <button class="hide-btn"><a href="{{ route('tweet.hide', $tweet->tweet_id) }}">Unhide Tweet</a></button> <?php
                }else{
                    ?>  <button class="restoreuser-btn"><a href="{{ route('tweet.hide', $tweet->tweet_id) }}">Restore User</a></button> <?php
                }
                //unhide Button
                
                
                if($userExists){
                    //deleteUserButton
                    ?>  <button class="deleteuser-btn"><a href="{{ route('tweet.deleteUser', $tweet->user_id) }}">Delete User</a></button> <?php
                }
                
                echo '</div>';
                }
            }
            
            ?>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-light yx-auto">Load more</button>
            </div>
        </div>
    
    
    <!--
    <div>
        <h1> FEED </h1>

        <div class="col-md-4 col-md-offset-4">
            <form action="{{ route('postTweet')}}" method="POST">

                <div class="form-group">
                    <label for="Tweet"> Post new Tweet </label>
                    <input type="text" name="tweet" id="tweet" value="{{Request::old('tweet')}}">
                </div>

                <button type="submit" class="btn btn-primary"> Post </button>
                <input type="hidden" name="_token" value="{{  Session::token() }}">
            </form>
        </div>

    
    

    <?php 
    /*
        
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);
 
        #TODO $currentUser benutzen
        function postTweet(){
            DB::insert('insert into tweets(user_id, tweet, img, created_at) 
            values(?,?,?,?)',[1, 'Hallo das ist ein Tweet', NULL ,$currentTimestamp]);
        }

        $tweets = DB::select('select * from tweets ');
            foreach ($tweets as $tweet) {
                        echo $tweet->tweet.'<br>';
                        echo $tweet->user_id.'<br>';
                        echo $tweet->created_at.'<br>';
                        ?>  <button class="btn"><a href="{{ route('tweet.delete', $tweet->tweet_id) }}">Delete Tweet</a></button>; <?php

                        echo '<br>';
                    }
    */
    ?>


    </div>
</body>
</html>
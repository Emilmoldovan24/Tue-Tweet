<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Manage Tweets</title>
</head>


<style>
body {
    background-color:  #E7E7E7;
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
    width: 100%;
    background-color: white;
    border-radius: 12px;
    padding: 20px;
    color: black;
    margin: 20px 0;
    border: 6px solid #a71b28;
}
.tweetContent{
    margin-top: 10px;
    padding: 10px;
    background: lightgrey;
    border: 3px solid #a71b28;
    border-radius: 12px;
}

.comment{
    margin-top: 10px;
    padding: 20px;
    background: lightgrey;
    border: 3px solid #a71b28;
    border-radius: 12px;
}
.back.btn.btn-light{
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
    font-size: 2,5vw; /* Standard-Schriftgröße */
  max-font-size: 30px; /* Maximale Schriftgröße */
  min-font-size: 25px; /* Minimale Schriftgröße */
}
@media (max-width: 368px) {
    .adminDash {
   display: block;
    
    
  font-size: 25px; /* Maximale Schriftgröße */
  
  }
}
</style>

<body>
<nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand"> <img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}" alt="logo">
         <span class="adminDash"> Manage Tweets </span> 
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
            <button type="submit" class="back btn btn-light" onclick="window.location.href='adminFeed?'">Visible Tweets</button>
            <button type="submit" class="back btn btn-light" onclick="window.location.href='adminFeed?page=hiddenTweets'">Hidden Tweets</button>
            <button type="submit" class="back btn btn-light" onclick="window.location.href='adminFeed?page=deletedTweets'">Deleted Tweets</button>
                

            </div>

            <script>
            // toggles the display of the comments when the user clicks on the comments button
            
 


            $(document).ready(function() {
                $(".default_picture").on("error", function() {
                    $(this).attr('src',
                        "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                    );
                });
            });
            </script>
            <?php 

            $tweets = DB::select('select * from tweets order by created_at desc');
            

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
                            $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
                            $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
                            $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->count();
                            $tweetImg = DB::table('tweets')->where('tweet_id', $tweet->tweet_id)->value('img');
                            ?>
                            <div class="user">
                            <?php
                                    echo "<div class = tweetContent>
                                        <b> $username </b> <br>
                                        $tweet->tweet.
                                        <br> ";
                                ?>
                                    <div>
                                        @if (!is_null($tweetImg))
                                            <?php $tweetImg = app('App\Http\Controllers\UserController')->getUserImg($tweetImg); ?>
                                            <img class="img-fluid" src= "{{ $tweetImg }}">
                                        @endif
                                    </div>
                                    <?php echo "</div>"; ?>
                                <?php 
                                     echo "tweetID: $tweetID".
                                     '<br>';
                                     
                                     echo "userID: $userID".
                                     '<br>';
                                     echo "Created at: $tweet->created_at".
                                     '<br>';
                                     echo "$likes Likes / ";
                                     
                                     echo "$retweets Retweets".
                                     '<br>'; 
                                ?>
                                
                                <br>
                                <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.restore', $tweet->tweet_id) }}'">Restore Tweet</button>
                                <?php
                                    echo "$numComments Comments:".
                                    '<br>';
                                   echo '<div class = "comments" id="comments">';
                                        
                                            $comments = DB::select("select * from comments where tweet_id = '$tweetID' order by created_at desc");

                                            foreach($comments as $comment){
                                                
                                                $username = DB::table('users')->where('id', $comment->user_id)->value('username');
                                                echo '<div class = "comment">';
                                                    echo "<b> $username </b>  ";
                                                    if($comment->deleted_at != null){
                                                        echo "<b> [DELETED COMMENT]</b> ";
                                                        echo "<br>";
                                                    }else if($comment->visibility == 0){
                                                        echo "<b> [HIDDEN COMMENT]</b> ";
                                                        echo "<br>";
                                                    }else{
                                                        echo "<br>";
                                                    }

                                                    echo "$comment->comment <br><br> ";

                                                        if($comment->visibility == 0 && $comment->deleted_at == null){
                                                            ?>
                                                            <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.hide', $comment->comment_id) }}'">Unhide Comment</a></button>
                                                            <?php
                                                        }else if($comment->visibility == 1 && $comment->deleted_at == null){
                                                            ?>
                                                            <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.hide', $comment->comment_id) }}'">Hide Comment</a></button>
                                                            <?php
                                                        }
                                                        
                                                        if($comment->deleted_at == null){
                                                            ?> <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.delete', $comment->comment_id) }}'">Delete Comment</a></button> <?php
                                                        }else{
                                                            ?> <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.restore', $comment->comment_id) }}'">Restore Comment</a></button> <?php
                                                        }
                                                    echo"<br>Cerated at: $comment->created_at <br>";
                                                echo "</div>";

                                                
                                            }
                                    echo "</div>";
                                    ?>
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
                            $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
                            $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
                            $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->count();
                            $tweetImg = DB::table('tweets')->where('tweet_id', $tweet->tweet_id)->value('img');
                            ?>
                            <div class="user">
                            <?php
                                    echo "<div class = tweetContent>
                                        <b> $username </b> <br>
                                        $tweet->tweet.
                                        <br> ";
                                ?>
                                    <div>
                                        @if (!is_null($tweetImg))
                                            <?php $tweetImg = app('App\Http\Controllers\UserController')->getUserImg($tweetImg); ?>
                                            <img class="img-fluid" src="{{ $tweetImg }}">
                                        @endif
                                    </div>
                                    <?php echo "</div>"; ?>
                                <?php
                                    echo "tweetID: $tweetID".
                                    '<br>';
                                    
                                    echo "userID: $userID".
                                    '<br>';
                                    echo "Created at: $tweet->created_at".
                                    '<br>';
                                    echo "$likes Likes / ";
                                    
                                    echo "$retweets Retweets".
                                    '<br>'; 
                                            
                                ?>
                                
                                <br>
                                
                                <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.hide', $tweet->tweet_id) }}'">UnHide Tweet</button>
                                <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.delete', $tweet->tweet_id) }}'">Delete Tweet</button>
                                <?php
                                    echo "$numComments Comments:".
                                    '<br>';
                                   echo '<div class = "comments" id="comments">';
                                        
                                            $comments = DB::select("select * from comments where tweet_id = '$tweetID' order by created_at desc");

                                            foreach($comments as $comment){
                                                
                                                $username = DB::table('users')->where('id', $comment->user_id)->value('username');
                                                echo '<div class = "comment">';
                                                    echo "<b> $username </b>  ";
                                                    if($comment->deleted_at != null){
                                                        echo "<b> [DELETED COMMENT]</b> ";
                                                        echo "<br>";
                                                    }else if($comment->visibility == 0){
                                                        echo "<b> [HIDDEN COMMENT]</b> ";
                                                        echo "<br>";
                                                    }else{
                                                        echo "<br>";
                                                    }

                                                    echo "$comment->comment <br><br> ";

                                                        if($comment->visibility == 0 && $comment->deleted_at == null){
                                                            ?>
                                                            <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.hide', $comment->comment_id) }}'">Unhide Comment</a></button>
                                                            <?php
                                                        }else if($comment->visibility == 1 && $comment->deleted_at == null){
                                                            ?>
                                                            <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.hide', $comment->comment_id) }}'">Hide Comment</a></button>
                                                            <?php
                                                        }
                                                        
                                                        if($comment->deleted_at == null){
                                                            ?> <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.delete', $comment->comment_id) }}'">Delete Comment</a></button> <?php
                                                        }else{
                                                            ?> <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.restore', $comment->comment_id) }}'">Restore Comment</a></button> <?php
                                                        }
                                                    echo"<br>Cerated at: $comment->created_at <br>";
                                                echo "</div>";

                                                
                                            }
                                    echo "</div>";
                                    ?>
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
                        $showComments = false;
                        if(($tweet->deleted_at == NULL) && $tweet->visibility == 1){
                            $tweetID = $tweet->tweet_id;
                            $userID = $tweet->user_id;
                            $username = DB::table('users')->where('id', $userID)->value('username');
                            $userImg = DB::table('users')->where('id', $userID)->value('profile_img');
                            $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);
                            $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
                            $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
                            $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->count();
                            $tweetImg = DB::table('tweets')->where('tweet_id', $tweet->tweet_id)->value('img');
                            ?>
                            <div class="user">
                                <?php
                                    echo "<div class = tweetContent>
                                        <b> $username </b> <br>
                                        $tweet->tweet.
                                        <br> ";
                                ?>
                                    <div>
                                        @if (!is_null($tweetImg))
                                            <?php $tweetImg = app('App\Http\Controllers\UserController')->getUserImg($tweetImg); ?>
                                            <img class="img-fluid" src="{{ $tweetImg }}">
                                        @endif
                                    </div>
                                    <?php echo "</div>"; ?>
                                <?php
                                        
                                    echo "tweetID: $tweetID".
                                    '<br>';
                                    
                                    echo "userID: $userID".
                                    '<br>';
                                    echo "Created at: $tweet->created_at".
                                    '<br>';
                                    echo "$likes Likes / ";
                                    
                                    echo "$retweets Retweets".
                                    '<br>'; 
                                ?>
                                
                                <br>
                                <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.hide', $tweet->tweet_id) }}'">Hide Tweet</button>
                                <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.delete', $tweet->tweet_id) }}'">Delete Tweet</button><br>
                                <?php
                                    echo "$numComments Comments:".
                                    '<br>';
                                   echo '<div class = "comments" id="comments">';
                                        
                                            $comments = DB::select("select * from comments where tweet_id = '$tweetID' order by created_at desc");

                                            foreach($comments as $comment){
                                                
                                                $username = DB::table('users')->where('id', $comment->user_id)->value('username');
                                                echo '<div class = "comment">';
                                                    echo "<b> $username </b>  ";
                                                    if($comment->deleted_at != null){
                                                        echo "<b> [DELETED COMMENT]</b> ";
                                                        echo "<br>";
                                                    }else if($comment->visibility == 0){
                                                        echo "<b> [HIDDEN COMMENT]</b> ";
                                                        echo "<br>";
                                                    }else{
                                                        echo "<br>";
                                                    }

                                                    echo "$comment->comment <br><br> ";

                                                        if($comment->visibility == 0 && $comment->deleted_at == null){
                                                            ?>
                                                            <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.hide', $comment->comment_id) }}'">Unhide Comment</a></button>
                                                            <?php
                                                        }else if($comment->visibility == 1 && $comment->deleted_at == null){
                                                            ?>
                                                            <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.hide', $comment->comment_id) }}'">Hide Comment</a></button>
                                                            <?php
                                                        }
                                                        
                                                        if($comment->deleted_at == null){
                                                            ?> <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.delete', $comment->comment_id) }}'">Delete Comment</a></button> <?php
                                                        }else{
                                                            ?> <button class="back btn btn-light" onclick="window.location.href='{{ route('comment.restore', $comment->comment_id) }}'">Restore Comment</a></button> <?php
                                                        }
                                                    echo"<br>Cerated at: $comment->created_at <br>";
                                                echo "</div>";

                                                
                                            }
                                    echo "</div>";
                                    ?>


                        </div>
                                <?php
                                
                        }
                    
                    }
            
        }
                
            
            ?>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
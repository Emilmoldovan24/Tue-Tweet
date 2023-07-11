<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Tweets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style type="text/css">
    
    </style>
</head>


<style>
div{
    max-width: 500px
}
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
    margin-top: 10px;
    padding: 10px;
    background: white;
}

.comment{
    margin-top: 10px;
    padding: 40px;
    background: white;
}
.navbar {
    background-color: #75151E;
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
                    <button type="submit" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-right-from-bracket"></i><a> back </a></button>
                </form>


            </div>


        </div>

        <div class="main-content">
            <script>
            // toggles the display of the comments when the user clicks on the comments button
            function displayComments(tweet_id, tweet_typ) {


                let element = document.getElementById("comments_" + tweet_typ + "_" + tweet_id);
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

            <div class="menu">
                <a href="adminFeed?"> Visible Tweets </a> |
                <a href="adminFeed?page=hiddenTweets"> Hidden Tweets </a> |
                <a href="adminFeed?page=deletedTweets"> Deleted Tweets </a>

            </div>
            
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
                            ?>
                            <div class="user">
                                <?php
                                    echo "$tweet->tweet".
                                    '<br>';
                                    
                                    
                                        
                                    
                                    
                                    echo "tweetID: $tweetID".
                                    '<br>';
                                    echo "Username: $username".
                                    '<br>';
                                    echo "userID: $userID".
                                    '<br>';
                                
                                    echo "Created at: $tweet->created_at".
                                    '<br>';
                                    echo "Deleted at: $tweet->deleted_at".
                                    '<br>';       
                                    echo "$likes Likes".
                                    '<br>';
                                    echo "$numComments Comments".
                                    '<br>';
                                    echo "$retweets Retweets".
                                    '<br>'; 
                                ?>
                                
                                <br>
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
                            $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
                            $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
                            $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->count();
                            ?>
                            <div class="user">
                                <?php
                                    echo "$tweet->tweet".
                                        '<br>';

                                    echo "tweetID: $tweetID".
                                        '<br>';
                                    echo "Username: $username".
                                        '<br>';
                                    echo "userID: $userID".
                                        '<br>';
                                    
                                    echo "Created at: $tweet->created_at".
                                        '<br>';
                                    echo "$likes Likes".
                                    '<br>';
                                    echo "$numComments Comments".
                                    '<br>';
                                    echo "$retweets Retweets".
                                    '<br>'; 
                                            
                                ?>
                                
                                <br>
                                
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
                            $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
                            $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
                            $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->count();
                            $tweet_typ =  (string) $tweet->typ;
                            $tweetImg = DB::table('tweets')
                            ->where('tweet_id', $tweet->tweet_id)
                            ->value('img');
                            ?>
                            <div class="user">
                                <?php
                                    echo "$tweet->tweet".
                                    '<br>';
                                    ?>
                                    <div>
                                    @if (!is_null($tweetImg))
                                        <?php $tweetImg = app('App\Http\Controllers\UserController')->getUserImg($tweetImg); ?>
                                        <img class="img-fluid" src={{ $tweetImg }}>
                                    @endif
                                    </div>
                                    <?php
                                    echo "tweetID: $tweetID".
                                    '<br>';
                                    echo "Username: $username".
                                    '<br>';
                                    echo "userID: $userID".
                                    '<br>';
                                
                                    echo "Created at: $tweet->created_at".
                                    '<br>';
                                    echo "$likes Likes".
                                    '<br>';
                                    echo "$numComments Comments".
                                    '<br>';
                                    echo "$retweets Retweets".
                                    '<br>'; 
                                ?>
                                
                                <br>

                                <!-- Comment-->
                <?php echo '<div class="comments" id="comments_' . $tweet_typ . '_' . $tweet->id . '" hidden>'; ?>
                <br>
                <div class="comment-container">

                    <!-- List Comments -->
                    <?php
                                // Get all comments for this tweet or retweet
                        if($tweet->typ == 'tweet'){
                            $comments = DB::table('comments')->where('tweet_id', $tweet->id)->where('deleted_at', NULL)->where('visibility', 1)->get();
                        }elseif($tweet->typ == 'retweet'){
                            $comments = DB::table('comments')->where('retweet_id', $tweet->id)->where('deleted_at', NULL)->where('visibility', 1)->get();
                        }
                        foreach ($comments as $comment) {
                            $commentUsername = DB::table('users')->where('id', $comment->user_id)->value('username');
                            $userImg = DB::table('users')->where('id', $user_id)->value('profile_img');
                            $commentText = $comment->comment;
                        ?>
                    <div class="comment-post-container">
                        <div class="post-row">
                            <div class="user-profile">
                                <?php echo $userImgHtml; ?>
                                <div style="display: inline-block;">
                                    <a style="margin-right: 3px; text-decoration: none;"
                                        href="/{{ $commentUsername }}">{{ $commentUsername }}</a>
                                    <a> &bull; </a>
                                    <span>{{ $comment->created_at }}</span>
                                </div>
                            </div>


                            @if ($comment->user_id === $cur_user_id)
                            <div class="menu-btn-own">
                                <button class="btn btn-dark" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item"><a
                                                href="{{ route('MyCommentDelete', $comment->comment_id) }}"
                                                style="text-decoration: none;">Delete</a></button>
                                    </li>
                                    <?php
                                                    echo '<li><button type="button" class="dropdown-item" onclick="editComment(' . $comment->comment_id . ', ' . htmlspecialchars('"' . $comment->comment . '"') . ')" data-comment-id="' . $comment->comment_id . '" data-bs-toggle="modal" data-bs-target="#EditCommentModal">Edit</button></li>';
                                                    ?>
                                </ul>
                            </div>
                            @endif

                        </div>
                        <p>{{ $comment->comment }}</p>
                    </div>
                    <?php } ?>

                    <!-- Comment input field -->
                    <div class="comment-input">
                        <form action="{{ route('postComment') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="comment" id="comment" class="form-control"
                                    placeholder="Add a comment" aria-label="Add a comment"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>
                            </div>
                            <input type="hidden" name="tweet_typ" value="{{ $tweet->typ }}">
                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                        </form>
                    </div>
                </div>
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
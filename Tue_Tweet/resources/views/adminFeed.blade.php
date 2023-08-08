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
    min-width: 650px;
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

#comment{
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

    .comment-user-profile {
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        color: black;
        background-color: #E7E7E7;

    }

    .comment-user-profile img {
        width: 45px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .comment-user-profile p {
        margin-bottom: -5px;
        font-weight: 500;
        color: white;
        margin-right: 20px;
    }

    .comment-user-profile small {
        font-size: 12px;
        color: white;
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

    .user-profile small {
        font-size: 12px;
        color: white;
    }
    
    .comment-user-profile span {
        font-size: 13px;
        /* color: #9a9a9a; */
        color: black;
    }

    .user-profile span {
        font-size: 13px;
        /* color: #9a9a9a; */
        color: grey;
    }

    .comment-post-container {
        width: 90%;
        background: #E7E7E7;
        border-radius: 8px;
        border: 2px solid #a71b28;
        color: black;
        margin-bottom: 20px;
        padding: 10px;
    }
    body {
        background-color: #E7E7E7;
        min-width: 650px;
    }

    .navbar.navbar-expand-lg {
        display: flex;
        margin: 0 auto;
        align-items: center;
        text-align: center;
        background-color: #a71b28;
        padding: 5px 5%;
        position: sticky;
        top: 0;
        z-index: 99;
        margin-bottom: 20px;
    }

    .navbar.navbar-expand-lg .navbar-brand {
        margin: 0 auto;
        align-items: center;
        text-align: center;
    }

    .navbar.navbar-expand-lg .navbar-brand .share-it {
        color: white;
    }


    .tuetweetlogo {

        width: 180px;
        border-radius: 9px;

    }

    .post-input-container {
        padding-left: 55px;
        padding-top: 20px;
        border: 2px solid grey;
        border-radius: 9px;
    }

    .post-input-container textarea {
        width: 100%;
        resize: none;
        border-bottom: 10px solid #grey;
        border: 0;
        outline: 0;
        background: transparent;
    }

    .left-sidebar {
        position: sticky;
        top: 100px;
    }



    .container {}

    .write-post-container {
        width: 100%;
        background: white;
        border-radius: 6px;
        padding: 20px;
        columns: #626262;
    }

    .comment-user-profile {
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        color: black;
        background-color: #E7E7E7;

    }

    .comment-user-profile img {
        width: 45px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .comment-user-profile p {
        margin-bottom: -5px;
        font-weight: 500;
        color: white;
        margin-right: 20px;
    }

    .comment-user-profile small {
        font-size: 12px;
        color: white;
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

    .user-profile small {
        font-size: 12px;
        color: white;
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

    .comment-post-container {
        width: 90%;
        background: #E7E7E7;
        border-radius: 8px;
        border: 2px solid #a71b28;
        color: black;
        margin-bottom: 20px;
        padding: 10px;
        overflow: hidden;
        word-wrap: break-word;
    }

    .comment-user-profile span {
        font-size: 13px;
        /* color: #9a9a9a; */
        color: black;
    }

    .user-profile span {
        font-size: 13px;
        /* color: #9a9a9a; */
        color: grey;
    }

    .post-text-just-retweet {
        color: #a71b28;
        font-family: 'Helvetica Neue Bold', Arial, sans-serif;
        margin: 15px 0;
        font-size: 15px;
        font-weight: bold;
    }

    .post-img {
        width: 50%;
        height: 200px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .card .img {
        border-radius: 10px;
        min-width: 20px;
        max-width: 300px;

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

    .activity-icons div i {
        display: inline-flex;
        align-items: center;
        margin-right: 5px;
    }

    .post-row a {
        color: black;
    }

    
    .retweet-text {
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
        color: black;

    }

    .tweetbox-profile {
        padding-left: 10px;
        padding-right: 10px;
        color: black;
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
        padding: 20px;
        margin: 10px;
    }


    .list-group .list-group-item.list-group-item-action {
        background-color: #a71b28;
        color: white;
        border-radius: 9px;
        margin: 3px;
    }

    .list-group-item i {
        margin-right: 20px;
    }

    .list-group {
        margin-top: 4px;

    }

    .card {
        align-items: center;
        margin-top: 20px;
    }

    .card-body {

        display: inline-block;
        border-radius: 7px;
    }

    .col-md-8 {
        background-color: #a71b28;
        color: white;
    }

    .btn.btn-danger {
        background-color: #a71b28;
        border-color: #a71b28;
    }

    .above-feed {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .col-5 {
        margin-right: 20px;
    }

    .hidden.tweet.btn.btn-light {
        display: none;
        max-width: 300px;
        min-width: 250px;
    }

    .dropdown-hidden {
        display: none;

    }

    

</style>

<body>
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
    </script>
        
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

            
            <?php 

            
            //DB query that lists tweets and retweets in the rigth order, differentiated by 'typ'
            $tweets = DB::select("SELECT id, user_id, created_at, typ, visibility, deleted_at
                                                from (
                                                    SELECT tweet_id as id, user_id, created_at, 'tweet' as typ, visibility, own_visibility, deleted_at
                                                        from tweets 
                                                        UNION
                                                        SELECT retweet_id, user_id, created_at, 'retweet' as typ, visibility, own_visibility, deleted_at
                                                        from retweets
                                                ) as feedTmp
                                                
                                                order by created_at desc");
            
            $visibleFeed = true;
            $hiddenFeed = false;
            $deletedFeed = false;

            

            //pages function as buttons to set booleans that will decide wich tweets are shown                                    
            if(isset($_GET['page'])){
                if($_GET['page'] == 'deletedTweets'){
                   ?> <h1> Deleted Tweets </h1> 
                   
                   <?php 
                   $visibleFeed = false;
                   $hiddenFeed = false;
                   $deletedFeed = true;
                    
                    }
                
                if($_GET['page'] == 'hiddenTweets'){
                    ?> <h1> Hidden Tweets </h1> <?php 

                    $visibleFeed = false;
                    $hiddenFeed = true;
                    $deletedFeed = false;

                }
            }
            
        {
            //booleans decide what feed is displayed by determining wich tweets to exclude from the foreach loop
            ?>  
            @if($visibleFeed)
                <h1>Visible Tweets</h1> 
            @endif
                
            @foreach ($tweets as $tweet)
            

            @if($visibleFeed && ($tweet->visibility == 0 || $tweet->deleted_at != null))
                @continue
            @endif

            @if($hiddenFeed && ($tweet->visibility == 1 || $tweet->deleted_at != null))
                @continue
            @endif

            @if($deletedFeed && ($tweet->deleted_at == null))
                @continue
            @endif

            <?php
            //DB query for user
            $cur_user_id = Auth::id();
            $currentTimeString = time();
            $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
            $user_id = $tweet->user_id;
            $username = DB::table('users')
                ->where('id', $user_id)
                ->value('username');
            $userImg = DB::table('users')
                ->where('id', $user_id)
                ->value('profile_img');
            $userImgSrc = app('App\Http\Controllers\UserController')->getUserImg($userImg);
            $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);
            
            $tweet_typ = (string) $tweet->typ;
            $tweet_id = $tweet->id;

            if ($tweet->typ == 'tweet') {
                // DB query for tweet
                $tweetText = DB::table('tweets')
                    ->where('tweet_id', $tweet->id)
                    ->value('tweet');
                $tweetImg = DB            ::table('tweets')
                    ->where('tweet_id', $tweet->id)
                    ->value('img');
                $likes = DB::table('likes')
                    ->where('tweet_id', $tweet->id)
                    ->where('deleted_at', null)
                    ->where('visibility', 1)
                    ->count();
                $numComments = DB::table('comments')
                    ->where('tweet_id', $tweet->id)
                    ->count();
                $retweets = DB::table('retweets')
                    ->where('tweet_id', $tweet->id)
                    ->where('deleted_at', null)
                    ->where('visibility', 1)
                    ->count();
            } else {
                // DB query for retweet
                $retweetedTweet = DB::table('retweets')
                    ->where('retweet_id', $tweet->id)
                    ->value('tweet_id');
                $retweetText = DB::table('retweets')
                    ->where('retweet_id', $tweet->id)
                    ->value('retweet_text');
                $retweetedUser_id = DB::table('tweets')
                    ->where('tweet_id', $retweetedTweet)
                    ->value('user_id');
                $retweetedUsername = DB::table('users')
                    ->where('id', $retweetedUser_id)
                    ->value('username');
                $retweetedUserImg = DB::table('users')
                    ->where('id', $retweetedUser_id)
                    ->value('profile_img');
                $retweetedUserImg = app('App\Http\Controllers\UserController')->getUserImg($retweetedUserImg);
                $retweetedTweetCreatedAt = DB::table('tweets')
                    ->where('tweet_id', $retweetedTweet)
                    ->value('created_at');
                $tweetText = DB::table('tweets')
                    ->where('tweet_id', $retweetedTweet)
                    ->value('tweet');
                $tweetImg = DB::table('tweets')
                    ->where('tweet_id', $retweetedTweet)
                    ->value('img');
                $likes = DB::table('likes')
                    ->where('retweet_id', $tweet->id)
                    ->where('deleted_at', null)
                    ->where('visibility', 1)
                    ->count();
                $numComments = DB::table('comments')
                    ->where('retweet_id', $tweet->id)
                    ->count();
            }
            ?>

            <!-- Tweet header -->
            <div class="post-container">

                <div class="post-row">
                    <div class="user-profile">
                        <?php echo $userImgHtml; ?>
                        <div style="display: inline-block;">
                            <a style="margin-right: 3px; text-decoration: none; font-weight: bold; color: black;" href="/{{ $username }}">{{ $username }}</a>
                            <a> &bull; </a>
                            <span>{{ $tweet->created_at }}</span>
                        </div>
                    </div>
                </div>


                           
                <!-- Display Retweet -->
                @if ($tweet->typ == 'retweet')
                {{'retweet ID: '.$tweet_id.''}}<br>
                {{'user ID: '.$user_id.''}}<br>
                {{'likes: '.$likes.''}}<br><br>
                <p class="retweet-text">{{ $retweetText }}</p>
                <div class="retweet">
                    <div class="tweetbox-profile">
                        <img src="{{ $retweetedUserImg }}">
                        <div>
                            <a style="margin-right: 3px; text-decoration: none; color: black; font-weight: bold;" href="/{{ $retweetedUsername }}">{{ $retweetedUsername }}</a>
                            <span>{{ $retweetedTweetCreatedAt }}</span>
                        </div>
                    </div>
                    @isset($tweetText)
                    <!-- Validation fängt es schon ab, dennoch so besser -->
                    
                    <p class="retweet-text">{{ $tweetText }}</p>
                    @endisset
                    @if (!is_null($tweetImg))
                    <?php $tweetImg = app('App\Http\Controllers\UserController')->getUserImg($tweetImg); ?>
                    <img class="img-fluid" src={{ $tweetImg }}>
                    @endif
                    
                </div>
                <?php
                        //our feed booleans decide wich feed we are on and wich buttons we need for this feeds functionality
                        if($visibleFeed){
                            ?>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('retweet.hide', $tweet->id) }}'">Hide Tweet</button>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('retweet.delete', $tweet->id) }}'">Delete Tweet</button><br>
                            <?php
                        }
                        if($hiddenFeed){
                            ?>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('retweet.hide', $tweet->id) }}'">UnHide Tweet</button>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('retweet.delete', $tweet->id) }}'">Delete Tweet</button><br>
                            <?php
                        }
                        if($deletedFeed){
                            ?>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('retweet.restore', $tweet->id) }}'">Restore Tweet</button><br>
                            <?php
                        }
                        ?>
                @elseif($tweet->typ == 'tweet')
                <!-- Display Tweet and it's stats-->
                @if (!is_null($tweetText))<br>
                {{'tweet ID: '.$tweet_id.''}}<br>
                {{'user ID: '.$user_id.''}}<br>
                {{'retweets: '.$retweets.''}}<br>
                {{'likes: '.$likes.''}}<br><br>
                {{ $tweetText }}<br><br>
                @endif


                <!-- Display Tweet image -->
                @if (!is_null($tweetImg))
                <?php $tweetImg = app('App\Http\Controllers\UserController')->getUserImg($tweetImg); ?>
                <img class="img-fluid" src={{ $tweetImg }}>
                @endif
                @endif
                <!-- Buttons -->
                <div class="post-row">
                    <div class="activity-icons">

                        <!-- Count Likes Comments and Retweets -->
                        <?php
                        if ($tweet->typ == 'tweet') {
                            
                        } elseif ($tweet->typ == 'retweet') {
                            
                        }
                        ?>

                        @if ($tweet->typ == 'tweet')
                        <?php
                        //feed decides buttons to show
                        if($visibleFeed){
                            ?>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.hide', $tweet->id) }}'">Hide Tweet</button>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.delete', $tweet->id) }}'">Delete Tweet</button><br>
                            <?php
                        }
                        if($hiddenFeed){
                            ?>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.hide', $tweet->id) }}'">UnHide Tweet</button>
                            <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.delete', $tweet->id) }}'">Delete Tweet</button><br>
                            <?php
                        }
                        if($deletedFeed){
                            ?>
                            <div> <button class="back btn btn-light" onclick="window.location.href='{{ route('tweet.restore', $tweet->id) }}'">Restore Tweet</button> </div>
                            <?php
                        }
                        
                        ?>
                        <!-- Comment Button (display comments if button is clicked) -->
                        <div>
                            <?php if($numComments != 0) {echo '<button onclick="displayComments(' . $tweet->id . ', ' . htmlspecialchars('"' . $tweet->typ . '"') . ') " class="btn btn-dark" aria-expanded="false">show ' .$numComments.' Comments';} ?>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- Comment-->
                <?php echo '<div class="comments" id="comments_' . $tweet_typ . '_' . $tweet->id . '" hidden>'; ?>
                <br>
                <div class="comment-container">

                    <!-- List Comments -->
                    <?php
                    // Get all comments for this tweet or retweet
                    if ($tweet->typ == 'tweet') {
                        $comments = DB::table('comments')->where('tweet_id', $tweet->id)->get();
                    } elseif ($tweet->typ == 'retweet') {
                        $comments = DB::table('comments')->where('retweet_id', $tweet->id)->get();
                    }
                    foreach($comments as $comment){
                                                
                        $commiUserImg = DB::table('users')->where('id', $comment->user_id)->value('profile_img');
                        $commiUserImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($commiUserImg);
                        $commentText = $comment->comment;
                        $username = DB::table('users')->where('id', $comment->user_id)->value('username');
                        ?>
                        <div class="comment-post-container">
                            <div class="comment-user-profile">
                                <?php 
                                    echo '<div>';
                                    
                                    //there is no separate feed for hidden or deleted comments, they are simply marked as such in all three feeds
                                    //restoring or unhiding comments does not require switching feeds
                                    if($comment->deleted_at != null){
                                        echo "<b> [DELETED COMMENT]</b> ";
                                        echo "<br>";
                                    }else if($comment->visibility == 0){
                                        echo "<b> [HIDDEN COMMENT]</b> ";
                                        echo "<br>";
                                    }else{
                                        echo "<br>";
                                    }
                                    echo $commiUserImgHtml; ?>
                                    <div style="display: inline-block;">
                                        <a style="margin-right: 3px; text-decoration: none;">{{ $username }}</a>
                                        <a> &bull; </a>
                                        <span>{{ $comment->created_at }}</span>
                                    </div>
                            </div>
                        </div>
                        <?php
                            
                            echo "$comment->comment <br><br> ";
                            //comments status decides wich buttons should be shown and how they should be labeled
                            if($comment->visibility == 0)
                                {
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
                            
                        echo "</div>";
                    } ?>

                    
                </div>
            </div>
        </div>
        @endforeach 
        <?php
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
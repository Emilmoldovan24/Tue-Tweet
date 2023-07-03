<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<style>
    body {
        background-color: lightgrey;
        /* background-color: #DCDCDC; */
        /* background: rgb(2, 0, 36);
    background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(209, 123, 149, 1) 0%, rgba(63, 106, 144, 1) 65%); */

    }

    /*     .navbar.bg-dark {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px 5%;
        position: sticky;
        top: 0;
        z-index: 100;
    } */
    .navbar.navbar-expand-lg {
        display: flex;
        margin: 0 auto;
        align-items: center;
        text-align: center;
        background-color: #75151E;
        padding: 5px 5%;
        position: sticky;
        top: 0;
        z-index: 100;
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
        margin-right: 10px;
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
        background-color: white;
        border-radius: 6px;
        padding: 20px;
        color: black;
        margin: 20px 0;
    }

    .comment-post-container {
        width: 100%;
        background: white;
        border-radius: 12px;
        border: 2px solid black;
        color: black;
        margin-bottom: 20px;
        padding: 10px;
    }

    .user-profile span {
        font-size: 13px;
        /* color: #9a9a9a; */
        color: black;
    }

    .post-text-just-retweet {
        color: #1DA1F2;
        font-family: 'Helvetica Neue Bold', Arial, sans-serif;
        margin: 15px 0;
        font-size: 15px;
        font-weight: bold;
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

    .list-group .list-group-item.list-group-item-action {
        background-color: #75151E;
        color: white;
        border-radius: 9px;
        margin: 3px;
    }

    .list-group-item i {
        margin-right: 20px;
    }

    .list-group-item a {
        padding-right: 130px;
    }

    .card-body {
        background-color: #75151E;
        color: white;
    }

    .col-md-8 {
        background-color: #75151E;
        color: white;
    }

    .btn.btn-danger {
        background-color: #75151E;
        border-color: #75151E;
    }

    .explore-tweets {
        text-align: center;
        color: white;
        border-color: #75151E;
        border: 3px solid;
        border-radius: 9px;
        padding: 10px;
        background-color: #75151E;
    }

    .tweet-button {

        margin: ;
        display: flex;
        justify-content: center;
        align-items: center;

    }
</style>

<body>
    <nav class="navbar navbar-expand-lg">

        <a class="navbar-brand">
            <img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}" alt="logo">
            <span class="share-it">Share whats on your mind!</span>



            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#PostTweetModal"
                style="font-size: 20px;">
                Tweet!
            </button>
        </a>

    </nav>

    <!--CONTAINER START-->
    <div class="container">



        <!--COLUMN 1 (LEFT-SIDEBAR-->
        <div class="col-3">

            <div class="left-sidebar">
                <!-- Current User Icon -->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php
                            $user_id = Auth::id();
                            $user_name = DB::table('users')
                                ->where('id', $user_id)
                                ->value('username');
                            $user_profileImg = DB::table('users')
                                ->where('id', $user_id)
                                ->value('profile_img');
                            $user_profileImg = app('App\Http\Controllers\UserController')->getUserImg($user_profileImg);
                            ?>
                            <img src="{{ $user_profileImg }}" height="100px" width="100px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Hello {{ $user_name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Menu Buttons -->
                <div class="list-group">
                    <form action="{{ route('feed') }}" method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-house"></i><a> Home </a></button>
                    </form>
                    <form action=<?php echo "'/" . $user_name . "'"; ?> method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-user"></i><a> Profile </a></button>
                    </form>
                    <form action="{{ route('settings') }}" method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-gear"></i><a> Settings </a></button>
                    </form>
                    <form action="{{ route('logout') }}" method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-right-from-bracket"></i><a> Logout </a></button>
                    </form>
                </div>
                <br>

                <!-- Tweet Section -->
                <!--      <h4>Share whats on your mind!</h4>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#PostTweetModal">
                    Tweet!
                </button> -->
            </div>
        </div>




        <!-- MIDDLE-BAR-FEED -->
        <div class="col-5">
            <h2 class="explore-tweets"> Explore the Tweets! </h2>
            
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"  aria-expanded="false">
                    Sort by
                  </button>
                
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('feed', ['sort' => 'likes']) }}">Likes</a>
                    <a class="dropdown-item" href="{{ route('tweets.index1', ['sort' => 'time']) }}">Newest</a>
                    <a class="dropdown-item" href="{{ route('tweets.index2', ['sort' => 'comments']) }}">Comments</a>
                    <a class="dropdown-item" href="{{ route('tweets.index3', ['sort' => 'retweet']) }}">Retweet</a>

                </div>
            </div>
           

            
                <!-- opens retweet modal when session variable is set meaning when redirected from profile retweet button -->
                @if(session('openRetweetModal'))
                        <?php
                            $tweetId = request()->route()->parameter('id');
                            $tweet = DB::table('tweets')
                                ->where('tweet_id', $tweetId)
                                ->first();
                            $tweetText  = $tweet->tweet;
                            $tweetCreatedAt = $tweet->created_at;
                            $tweetImg = $tweet->img;  
                            $userId = $tweet->user_id;
                            $user = DB::table('users')
                                ->where('id', $userId)
                                ->first();
                            $userId = $user->id;
                            $username = $user->username;
                            $userImg = $user->profile_img;
                            $userImgSrc = app('App\Http\Controllers\UserController')->getUserImg($userImg); ?>

                        <script>
                            // open retweet modal
                            document.addEventListener('DOMContentLoaded', function() {
                                retweet(<?php echo $tweetId . ', "' . $tweetText . '", "' . $username . '", "' . $userImgSrc . '", "' . $tweetCreatedAt . '", "' . $tweetImg . '"'; ?>);
                                var retweetModal = new bootstrap.Modal(document.getElementById('PostRetweetModal'));
                                retweetModal.show();
                                retweetModal.classList.add('show');
                                retweetModal.style.display = 'block';
                                retweetModal.remove('d-none');
                                retweetModal.setAttribute('aria-modal', true);
                                retweetModal.removeAttribute('aria-hidden');
                                retweetModal.setAttribute('style', 'display: block; padding-right: 17px;');
                            });


                            // set session(openRetweetModal) to false
                            <?php session(['openRetweetModal' => false]); ?>

                    </script>
                @endif

                <script>
                // toggles the display of the comments when the user clicks on the comments button
                function displayComments(tweet_id, tweet_typ) {
                

                    let element = document.getElementById("comments_" + tweet_typ + "_"+ tweet_id);
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



            

            @foreach ($tweets as $tweet)
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
                $tweet_id = $tweet->id;
                $tweet_typ =  (string) $tweet->typ;
                
                if ($tweet->typ == 'tweet') {
                    // DB query for tweet
                    $tweetText = DB::table('tweets')
                        ->where('tweet_id', $tweet->id)
                        ->value('tweet');
                    $tweetImg = DB::table('tweets')
                        ->where('tweet_id', $tweet->id)
                        ->value('img');
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
                }
                ?>

                <!-- Tweet header -->
                <div class="post-container">

                    <div class="post-row">
                        <div class="user-profile">
                            <?php echo $userImgHtml; ?>
                            <div style="display: inline-block;">
                                <a style="margin-right: 3px; text-decoration: none; font-weight: bold; color: black;"
                                    href="/{{ $username }}">{{ $username }}</a>
                                <a> &bull; </a>
                                <span>{{ $tweet->created_at }}</span>
                            </div>
                        </div>

                        <!--Überprüfe, ob die user_id des Tweets zur aktuellen Benutzer-ID gehört -->
                        @if ($user_id === $cur_user_id && $tweet->typ == 'tweet')
                            <!-- Edit and delete and hide tweet -->
                            <div class="menu-btn-own">
                                <button class="btn btn-dark" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item">
                                            <a href="{{ route('MyTweetDelete', $tweet->id) }}"
                                                style="text-decoration: none;">Delete</a>
                                        </button></li>
                                    <?php   echo '<li><button type="button" class="dropdown-item" onclick="editTweet(' . $tweet->id . ', ' . htmlspecialchars('"' . $tweetText . '"') . ')" data-tweet-id="{{$tweet->id}}" data-bs-toggle="modal" data-bs-target="#EditTweetModal">Edit</button></li>'; ?>
                                      <li><button class="dropdown-item">
                                            <a href="{{ route('tweet.hide.feed', ['id' => $tweet->id, 'typ' => htmlspecialchars($tweet->typ)]) }}" style="text-decoration: none;">Hide/ Unhide Tweet</a>
                                        </button></li> 

                                    
                                </ul>
                            </div>
                        @endif

                        {{-- selbe für Retweets --}}
                        @if ($user_id === $cur_user_id && $tweet->typ == 'retweet')
                            <!-- Edit and delete and hide tweet -->
                            <div class="menu-btn-own">
                                <button class="btn btn-dark" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item">
                                            <a href="{{ route('MyRetweetDelete', $tweet->id) }}"
                                                style="text-decoration: none;">Delete</a>
                                        </button></li>
                                        <?php
                                        $retweetId = $tweet->id; // ID des Retweets
                                        $retweetText = $retweetText ?? ''; // Text des Retweets (falls vorhanden)
                                        echo '<li><button type="button" class="dropdown-item" onclick="editRetweet(' . $retweetId . ', ' . htmlspecialchars('"' . $retweetText . '"') . ')" data-retweet-id="{{ $retweetId }} " data-bs-toggle="modal" data-bs-target="#EditRetweetModal">Edit</button></li>';
                                        ?>
                                        {{-- <li>
                                            <button class="dropdown-item">
                                                <a href="{{ route('tweet.hide.feed', ['id' => $tweet->id, 'typ' => htmlspecialchars($tweet->typ)]) }}" style="text-decoration: none;">Hide Tweet</a>
                                            </button>
                                        </li> --}}
                                </ul>
                            </div>
                        @endif

                    </div>


                    <!-- Tweet content -->

                    <!-- Display Retweet -->
                    @if ($tweet->typ == 'retweet')
                        <p class="retweet-text">{{ $retweetText }}</p>
                        <p class="post-text-just-retweet"><i class="fa-solid fa-retweet"></i> {{ $username }}
                            retweeted</p>
                        <div class="retweet">
                            <div class="tweetbox-profile">
                                <img src="{{ $retweetedUserImg }}">
                                <div>
                                    <a style="margin-right: 3px; text-decoration: none; color: black; font-weight: bold;"
                                    href="/{{ $retweetedUsername }}">{{ $retweetedUsername }}</a>
                                    <span>{{ $retweetedTweetCreatedAt }}</span>
                                </div>
                            </div>
                            @if (!is_null($tweetText))
                                <!-- Validation fängt es schon ab, dennoch so besser -->
                                <p class="retweet-text">{{ $tweetText }}</p>
                            @endif
                            @if (!is_null($tweetImg))
                                <?php $tweetImg = app('App\Http\Controllers\UserController')->getUserImg($tweetImg); ?>
                                <img class="img-fluid" src={{ $tweetImg }}>
                            @endif
                        </div>
                    @elseif($tweet->typ == 'tweet')
                        <!-- Display Tweet -->
                        @if (!is_null($tweetText))
                            <!-- Validation fängt es schon ab, dennoch so besser -->
                            {{ $tweetText }}<br>
                        @endif


                        <!-- Display Tweet image -->
                        @if (!is_null($tweetImg))
                            <?php $tweetImg = app('App\Http\Controllers\UserController')->getUserImg($tweetImg); ?>
                            <img class="img-fluid" src={{ $tweetImg }}>
                        @endif
                    @endif
                        <!-- Activity Icons -->
                        <div class="post-row">
                            <div class="activity-icons">

                                <!-- Count Likes Comments and Retweets -->
                                <?php
                                if($tweet->typ == 'tweet'){
                                    $likes = DB::table('likes')
                                        ->where('tweet_id', $tweet->id)
                                        ->where('deleted_at', null)
                                        ->where('visibility', 1)
                                        ->count();
                                    $numComments = DB::table('comments')
                                        ->where('tweet_id', $tweet->id)
                                        ->where('deleted_at', null)
                                        ->where('visibility', 1)
                                        ->count();
                                    $retweets = DB::table('retweets')
                                        ->where('tweet_id', $tweet->id)
                                        ->where('deleted_at', null)
                                        ->where('visibility', 1)
                                        ->where('own_visibility', 1)
                                        ->count();
                                } elseif ($tweet->typ == 'retweet') {
                                    $likes = DB::table('likes')
                                        ->where('retweet_id', $tweet->id)
                                        ->where('deleted_at', null)
                                        ->where('visibility', 1)
                                        ->count();
                                    $numComments = DB::table('comments')
                                        ->where('retweet_id', $tweet->id)
                                        ->where('deleted_at', null)
                                        ->where('visibility', 1)
                                        ->count();
                                }
                                ?>

                                <!-- Like Button -->
                                <div>
                                    <form action=like method="POST">
                                        @csrf
                                        <div class="like-btn">

                                            <!-- Like Button turns red if  user has liked-->
                                            <?php
                                            if($tweet->typ == 'tweet') {
                                                $alreadyLiked = DB::table('likes')
                                                    ->where('tweet_id', $tweet->id)
                                                    ->where('user_id', Auth::id())
                                                    ->exists();
                                            } elseif($tweet->typ == 'retweet') {
                                                 $alreadyLiked = DB::table('likes')
                                                    ->where('retweet_id', $tweet->id)
                                                    ->where('user_id', Auth::id())
                                                    ->exists();
                                            }

                                            if ($alreadyLiked) {
                                                echo '<button type="submit" class="btn btn-danger"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                                            } else {
                                                echo '<button type="submit" class="btn btn-dark"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                                            } ?>
                                            @if($tweet->typ == 'tweet')
                                                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                            @elseif($tweet->typ == 'retweet')
                                                <input type="hidden" name="retweet_id" value="{{ $tweet->id }}">
                                            @endif
                                            <input type="hidden" name="typ" value="{{ $tweet->typ }}">
                                        </div>
                                    </form>
                                </div>

                                <!-- Comment Button (display comments if button is clicked) -->
                                <div>
                                    <div class="comment-btn">
                                        <?php echo '<button onclick="displayComments('. $tweet->id .', '. htmlspecialchars('"' . $tweet->typ . '"') .')" class="btn btn-dark" aria-expanded="false">'; ?>
                                            <i class="fa-regular fa-comment"></i> {{ $numComments }}
                                        </button>
                                    </div>
                                </div>
                    @if($tweet->typ == 'tweet')
                                <!-- Retweet Button -->
                                <div class="retweet-btn">
                                    <?php
                                    $tweetCreatedAt = date('Y-m-d H:i:s', strtotime($tweet->created_at));
                                    echo '<button onclick="retweet(' .
                                        $tweet->id .
                                        ', ' . htmlspecialchars('"' . $tweetText . '"') .
                                        ', ' . htmlspecialchars('"' . $username . '"') .
                                        ', ' . htmlspecialchars('"' . $userImgSrc . '"') .
                                        ', ' . htmlspecialchars('"' . $tweetCreatedAt . '"') .
                                        ', ' . htmlspecialchars('"' . $tweetImg . '"') . ')" 
                                        class="btn btn-dark"   data-tweet-id="' . $tweet_id . '" data-bs-toggle="modal" data-bs-target="#PostRetweetModal" aria-expanded="false">'; ?>
                                    <i class="fa-solid fa-retweet"></i> {{ $retweets }}
                                    </button>
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
                                    <!-- <div class="comment"> -->
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
                                                aria-expanded="false"><i
                                                    class="fa-solid fa-ellipsis-vertical"></i></button>
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
                                <form action=postComment method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" name="comment" id="comment" class="form-control"
                                            placeholder="Add a comment" aria-label="Add a comment"
                                            aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit"
                                            id="button-addon2">Post</button>
                                    </div>
                                    <input type="hidden" name="tweet_typ" value="{{ $tweet->typ }}">
                                    <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                </form>
                            </div>
                        </div>
                </div>
        </div>
        @endforeach


        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" class="btn btn-dark yx-auto">Load more</button>
        </div>
    </div>



    <!-- RIGHT SIDE-BAR -->


    <div class="right-sidebar">




        <div class="card mb-3" style="width: 12rem;">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1556474835-b0f3ac40d4d1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Follow Request</h5>
                <p class="card-text">Max Mustermann wants to follow you!</p>
                <a href="#" class="btn btn-light">Accept</a>
                <a href="#" class="btn btn-dark">Decline</a>
            </div>
        </div>
        <div class="card mb-3" style="width: 12rem; margin-top: 20px;">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Comment-Response</h5>
                <p class="card-text">Lea responded to your comment. Go see it!</p>
                <a href="#" class="btn btn-light">Go to Post</a>
            </div>
        </div>

    </div>


    <!-- Post-Tweet-Modal -->
    <form action="{{ route('postTweet') }}" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="PostTweetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">


                        <div class="write-post-container">
                            <div class="user-profile">
                                <img src='{{ $user_profileImg }}'>
                                <div>
                                    {{ $user_name }} <br>
                                    <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>

                                    {{-- Design! Fehlermeldungen, andere Platzierung oder Modal bleibt offen ->wie? --}}
                                    @section('content')
                                        @if (count($errors) > 0)
                                            <div class='row'>
                                                <div class="col">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                                <div class="post-input-container">
                                    <textarea rows="3" placeholder="Whats on your mind?" name="tweet" id="tweet"
                                        value="{{ Request::old('tweet') }}"></textarea>
                                    <div id="pictureBox"></div>
                                    <div class="add-post-links">
                                        <a href="#"><i class="fa-solid fa-camera fa-2xl"></i>
                                            <!-- <button type="button" id="pictureBtn" class="btn btn-primary">Choose Picture</button></a> -->
                                            <div class="form-group">
                                                <input type="file" name="img" id="img"
                                                    value="{{ Request::old('img') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"> Post </button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </div>
            </div>
            </div>
        </form>


        <!-- Edit-Tweet-Modal -->
        <form action="{{ route('editTweet') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="EditTweetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="write-post-container">
                                <div class="user-profile">
                                    <img src="{{ $user_profileImg }}">
                                    <div>
                                        {{ $user_name }} <br>
                                        <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                                        {{-- Design! Fehlermeldungen, andere Platzierung oder Modal bleibt offen ->wie? --}}
                                    @section('content')
                                        @if (count($errors) > 0)
                                            <div class='row'>
                                                <div class="col">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="post-input-container">
                                    <input style="display:none" name="id" id="editTweetId">
                                    <textarea rows="3" placeholder="Edit your Tweet" name="editTweetText" id="editTweetText"
                                        value="{{ Request::old('tweet') }}">{{ $tweetText }}</textarea>
                                    <div id="pictureEditBox"></div>
                                    <div class="add-post-links">
                                        <a href="#"><i class="fa-solid fa-camera fa-2xl"></i></a>
                                        <div class="form-group">
                                            <input type="file" name="editImg" id="editImg"
                                                value="{{ Request::old('img') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- TODO: Retweet-Modal -->
        <form action="{{ route('postRetweet') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="PostRetweetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="write-post-container">
                                <div class="user-profile">
                                    <img src="{{ $user_profileImg }}">
                                    <div>
                                        {{ $user_name }} <br>
                                        <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                                        {{-- Design! Fehlermeldungen, andere Platzierung oder Modal bleibt offen ->wie? --}}
                                    @section('content')
                                        @if (count($errors) > 0)
                                            <div class='row'>
                                                <div class="col">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="post-input-container">
                                    <input style="display:none" name="tweet_id" id="tweet_id">
                                    <textarea rows="3" placeholder="Add text to your retweet" name="retweet_text" id="retweet_text"></textarea>

                                    <!-- Display quoted tweet -->
                                    <div class="quotedTweetBox" id="quotedTweetBox">
                                        <p class="post-text-just-retweet"><i class="fa-solid fa-retweet"></i>
                                            {{ $user_name }} retweets</p>
                                        <div class="retweet">
                                            <div class="tweetbox-profile">
                                                <img id="retweet_user_img" src="">
                                                <div>
                                                    <p class="retweet-username" id="retweet_username"></p>
                                                    <span id="retweet_created_at"></span>
                                                </div>
                                            </div>
                                            <p class="retweeted-text" name="retweeted_text" id="retweeted_text"></p>
                                            <img class="img-fluid" id="retweet_img" src="">
                                        </div>
                                    </div>

                                    <!-- You can't retweet with a picture
                                        <div id="pictureEditBox"></div>
                                        <div class="add-post-links">
                                            <a href="#"><i class="fa-solid fa-camera fa-2xl"></i></a>
                                            <div class="form-group">
                                                <input type="file" name="editImg" id="editImg">
                                            </div>
                                        </div> -->

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Edit-Retweet-Modal -->
        <form action="{{ route('editRetweet') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="EditRetweetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="write-post-container">
                                <div class="user-profile">
                                    <img src="{{ $user_profileImg }}">
                                    <div>
                                        {{ $user_name }} <br>
                                        <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                                        {{-- Design! Fehlermeldungen, andere Platzierung oder Modal bleibt offen ->wie? --}}
                                    @section('content')
                                        @if (count($errors) > 0)
                                            <div class='row'>
                                                <div class="col">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="post-input-container">
                                    <input style="display:none" name="retweet_id" id="editRetweetId">
                                    <textarea rows="3" placeholder="Edit your Retweet" name="editRetweetText" id="editRetweetText"
                                        value="{{ Request::old('retweet_text') }}"></textarea>
                                        <input type="hidden" name="id" id="editRetweetId">
                                    {{-- <div id="pictureCommentEditBox"></div>
                                    <div class="add-post-links">
                                        <a href="#"><i class="fa-solid fa-camera fa-2xl"></i></a>
                                        <div class="form-group">
                                            <input type="file" name="editImg" id="editImg"
                                                value="{{ Request::old('img') }}">
                            </div>
                        </div>
                    </div> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>
                        </div>
                    </div>
                </div>
        </form>

        <!-- Edit-Comment-Modal -->
        <form action="{{ route('editComment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="EditCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="write-post-container">
                                <div class="user-profile">
                                    <img src="{{ $user_profileImg }}">
                                    <div>
                                        {{ $user_name }} <br>
                                        <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                                        {{-- Design! Fehlermeldungen, andere Platzierung oder Modal bleibt offen ->wie? --}}
                                    @section('content')
                                        @if (count($errors) > 0)
                                            <div class='row'>
                                                <div class="col">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="post-input-container">
                                    <input style="display:none" name="id" id="editCommentId">
                                    <textarea rows="3" placeholder="Edit your Comment" name="editCommentText" id="editCommentText"
                                        value="{{ Request::old('comment') }}"></textarea>
                                    {{-- <div id="pictureCommentEditBox"></div>
                                    <div class="add-post-links">
                                        <a href="#"><i class="fa-solid fa-camera fa-2xl"></i></a>
                                        <div class="form-group">
                                            <input type="file" name="editImg" id="editImg"
                                                value="{{ Request::old('img') }}">
                            </div>
                        </div>
                    </div> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>
                        </div>
                    </div>
                </div>
        </form>


        </div>
        </div>

        <script>
            $(".PostTweetModal").on("hidden.bs.modal", function() {
                $(".modal-body").html("");
            });
     
            $(".PostRetweetModal").on("hidden.bs.modal", function() {
                $(".modal-body").html("");
            });
  
            $(".EditTweetModal").on("hidden.bs.modal", function() {
                $(".modal-body").html("");
            });

            $(".EditRetweetModal").on("hidden.bs.modal", function() {
                $(".modal-body").html("");
            });
  
            $(".EditCommentModal").on("hidden.bs.modal", function() {
                $(".modal-body").html("");
            });
        </script>
        <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        <script>
            function editTweet(id, text) {
                document.getElementById('editTweetText').value = text;
                document.getElementById('editTweetId').value = id;
            }

            function editRetweet(retweetId, retweetText) {
                console.log(retweetId, retweetText);
                document.getElementById('editRetweetText').value = retweetText;
                document.getElementById('editRetweetId').value = retweetId;
            }

            function editComment(commentId, commentText) {
                document.getElementById('editCommentText').value = commentText;
                document.getElementById('editCommentId').value = commentId;
            }

            function retweet(tweetId, tweetText, tweetUsername, tweetUserImg, tweetCreatedAt, tweetImg) {

                document.getElementById('tweet_id').value = tweetId;

                if (tweetText === null) {
                    document.getElementById('retweeted_text').innerHTML = "";
                } else {
                    document.getElementById('retweeted_text').innerHTML = tweetText;
                }

                document.getElementById('retweet_username').innerHTML = tweetUsername;

                document.getElementById('retweet_user_img').setAttribute('src', tweetUserImg);

                document.getElementById('retweet_created_at').innerHTML = tweetCreatedAt;

                if (tweetImg === null) {
                    document.getElementById('retweet_img').style = "display:none";
                } else {
                    document.getElementById('retweet_img').setAttribute('src', tweetImg);
                }
            }
        </script>

    </body>

    </html>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feed</title>
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
        margin-right: 20px;
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

    .comment-post-container {
        width: 100%;
        background: #fff;
        border-radius: 6px;
        color: #626262;
        margin-bottom: 20px 0;
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
            <a class="navbar-brand">Tue-Tweet</a>

        </div>
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
                        <button type="submit" class="list-group-item list-group-item-action active"><i class="fa-solid fa-house"></i><a> Home </a></button>
                    </form>
                    <form action=<?php echo "'/" . $user_name . "'"; ?> method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i class="fa-solid fa-user"></i><a> Profile </a></button>
                    </form>
                    <form action="{{ route('settings') }}" method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i class="fa-solid fa-gear"></i><a> Settings </a></button>
                    </form>
                    <form action="{{ route('logout') }}" method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i class="fa-solid fa-right-from-bracket"></i><a> Logout </a></button>
                    </form>
                </div>
                <br>

                <!-- Tweet Section -->
                <h4>Share whats on your mind!</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PostTweetModal">
                    Tweet!
                </button>
            </div>
        </div>




        <!-- MIDDLE-BAR-FEED -->
        <div class="col-5">

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



            <?php
            //query sorted by the number of likes of tweets and retweets

            $query1 = "SELECT id, user_id, created_at, typ
                        FROM (   
                            SELECT  'tweet' as typ ,tweets.tweet_id AS id , tweets.user_id, tweets.tweet , tweets.created_at, COUNT(likes.like_id) AS like_count
                                FROM tweets
                                LEFT JOIN likes ON tweets.tweet_id = likes.tweet_id
                                WHERE tweets.deleted_at IS NULL AND tweets.visibility = true
                                GROUP BY tweets.tweet_id, tweets.user_id, tweets.tweet, tweets.created_at

                            UNION ALL

                            SELECT 'retweet' AS typ, retweets.retweet_id, retweets.user_id, retweets.retweet_text , retweets.created_at, COUNT(likes.like_id) AS like_count
                                FROM retweets
                                LEFT JOIN likes ON retweets.retweet_id = likes.retweet_id
                                WHERE retweets.deleted_at IS NULL AND retweets.visibility = true
                                GROUP BY retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at
                             ) AS combined
                        ORDER BY like_count DESC;";


            //query sorted according to the chronological sequence

            $query2 = "SELECT id, user_id, created_at, typ, visibility, deleted_at
                        from (
                            SELECT tweet_id as id, user_id, created_at, 'tweet' as typ, visibility, deleted_at
                                from tweets 
                                where deleted_at is null 
                                UNION
                                SELECT retweet_id, user_id, created_at, 'retweet' as typ, visibility, deleted_at
                                from retweets
                        ) as feedTmp
                        where deleted_at is null and visibility = 1
                        order by created_at DESC;";



            //query sorted according to the number of comments

            $query3 = "SELECT id, user_id ,created_at , typ
                        FROM (
                            SELECT 'tweet' AS typ, tweets.tweet_id AS id, tweets.user_id, tweets.tweet, tweets.created_at, COUNT(comments.comment_id) AS comment_count
                                FROM tweets
                                LEFT JOIN comments ON tweets.tweet_id = comments.tweet_id
                                 WHERE tweets.deleted_at IS NULL AND tweets.visibility = true
                                GROUP BY tweets.tweet_id, tweets.user_id, tweets.tweet, tweets.created_at

                                UNION ALL

                                SELECT 'retweet' AS typ, retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at, COUNT(comments.comment_id) AS comment_count
                                FROM retweets
                                LEFT JOIN comments ON retweets.retweet_id = comments.retweet_id
                                WHERE retweets.deleted_at IS NULL AND retweets.visibility = true
                                 GROUP BY retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at
                            ) AS combined
                    ORDER BY comment_count DESC;";


            // query sorted by most retweets

            $query4 = "SELECT id, user_id, created_at , typ
                        FROM (
                            SELECT 'tweet' AS typ, tweets.tweet_id AS id, tweets.user_id, tweets.tweet, tweets.created_at, COUNT(retweets.retweet_id) AS retweet_count
                                FROM tweets
                                LEFT JOIN retweets ON tweets.tweet_id = retweets.tweet_id
                                WHERE tweets.deleted_at IS NULL AND tweets.visibility = true
                                GROUP BY tweets.tweet_id, tweets.user_id, tweets.tweet, tweets.created_at

                                UNION ALL

                                SELECT 'retweet' AS typ, retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at, 0 AS retweet_count
                                FROM retweets
                                WHERE retweets.deleted_at IS NULL AND retweets.visibility = true
                            ) AS combined
                        ORDER BY retweet_count DESC;";




            $tweets = DB::select($query1);
            ?>

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
                            <a style="margin-right: 3px; text-decoration: none;" href="/{{ $username }}">{{ $username }}</a>
                            <a> &bull; </a>
                            <span>{{ $tweet->created_at }}</span>
                        </div>
                    </div>

                    <!--Überprüfe, ob die user_id des Tweets zur aktuellen Benutzer-ID gehört -->
                    @if ($user_id === $cur_user_id)
                    <!-- Edit and delete tweet -->
                    <div class="menu-btn-own">
                        <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item"><a href="{{ route('MyTweetDelete', $tweet->id) }}" style="text-decoration: none;">Delete</a></button></li>
                            <?php echo '<li><button type="button" class="dropdown-item" onclick="editTweet(' . $tweet->id . ', ' . htmlspecialchars('"' . $tweetText . '"') . ')" data-tweet-id="{{$tweet->id}}" data-bs-toggle="modal" data-bs-target="#EditTweetModal">Edit</button></li>'; ?>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                            <p>{{ $retweetedUsername }}</p>
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

                <!-- Activity Icons -->
                <div class="post-row">
                    <div class="activity-icons">

                        <!-- Count Likes Comments and Retweets -->
                        <?php
                        // hier gibt es ein Datenbankproblem, da die IDs nicht eindeutig sind
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
                            ->count();
                        ?>

                        <!-- Like Button -->
                        <div>
                            <form action=like method="POST">
                                @csrf
                                <div class="like-btn">

                                    <!-- Like Button turns red if  user has liked-->
                                    <?php
                                    if (
                                        DB::table('likes')
                                        ->where('tweet_id', $tweet->id)
                                        ->where('user_id', Auth::id())
                                        ->exists()
                                    ) {
                                        echo '<button type="submit" class="btn btn-danger"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                                    } else {
                                        echo '<button type="submit" class="btn btn-dark"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                                    } ?>
                                    <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                </div>
                            </form>
                        </div>

                        <!-- Comment Button (display comments if button is clicked) -->
                        <div>
                            <div class="comment-btn">
                                <button onclick="displayComments({{ $tweet->id }})" class="btn btn-dark" aria-expanded="false">
                                    <i class="fa-regular fa-comment"></i> {{ $numComments }}
                                </button>
                            </div>
                        </div>

                        <!-- Retweet Button -->
                        <div class="retweet-btn">
                            <?php
                            $tweetCreatedAt = date("Y-m-d H:i:s", strtotime($tweet->created_at));
                            echo '<button onclick="retweet(' . $tweet->id . ', ' . htmlspecialchars('"' . $tweetText . '"') . ', ' . htmlspecialchars('"' . $username . '"') . ', '
                                . htmlspecialchars('"' . $userImgSrc . '"') . ', ' . htmlspecialchars('"' . $tweetCreatedAt . '"') . ', ' . htmlspecialchars('"' . $tweetImg . '"') . ')" 
                                        class="btn btn-dark"   data-tweet-id="' . $tweet_id . '" data-bs-toggle="modal" data-bs-target="#PostRetweetModal" aria-expanded="false">'; ?>
                            <i class="fa-solid fa-retweet"></i> {{ $retweets }}
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Comment-->
                <?php echo '<div class="comments" id="comments' . $tweet->id . '" hidden>'; ?>
                <br>
                <div class="comment-container">

                    <!-- List Comments -->
                    <?php
                    $comments = DB::table('comments')->where('tweet_id', $tweet->id)->where('deleted_at', NULL)->where('visibility', 1)->get();
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
                                        <a style="margin-right: 3px; text-decoration: none;" href="/{{ $commentUsername }}">{{ $commentUsername }}</a>
                                        <a> &bull; </a>
                                        <span>{{ $comment->created_at }}</span>
                                    </div>
                                </div>


                                @if ($comment->user_id === $cur_user_id)
                                <div class="menu-btn-own">
                                    <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item"><a href="{{ route('MyCommentDelete', $comment->comment_id) }}" style="text-decoration: none;">Delete</a></button>
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
                                <input type="text" name="comment" id="comment" class="form-control" placeholder="Add a comment" aria-label="Add a comment" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>
                            </div>
                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endforeach


        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" class="btn btn-light yx-auto">Load more</button>
        </div>
    </div>



    <!-- RIGHT SIDE-BAR -->


    <div class="right-sidebar">




        <div class="card mb-3" style="width: 12rem;">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1556474835-b0f3ac40d4d1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Follow Request</h5>
                <p class="card-text">Max Mustermann wants to follow you!</p>
                <a href="#" class="btn btn-primary">Accept</a>
                <a href="#" class="btn btn-secondary">Decline</a>
            </div>
        </div>
        <div class="card mb-3" style="width: 12rem; margin-top: 20px;">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Comment-Response</h5>
                <p class="card-text">Lea responded to your comment. Go see it!</p>
                <a href="#" class="btn btn-primary">Go to Post</a>
            </div>
        </div>

    </div>


    <!-- Post-Tweet-Modal -->
    <form action="{{ route('postTweet') }}" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="PostTweetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <textarea rows="3" placeholder="Whats on your mind?" name="tweet" id="tweet" value="{{ Request::old('tweet') }}"></textarea>
                                <div id="pictureBox"></div>
                                <div class="add-post-links">
                                    <a href="#"><i class="fa-solid fa-camera fa-2xl"></i>
                                        <!-- <button type="button" id="pictureBtn" class="btn btn-primary">Choose Picture</button></a> -->
                                        <div class="form-group">
                                            <input type="file" name="img" id="img" value="{{ Request::old('img') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> Post </button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
            </div>
        </div>
        </div>
    </form>


    <!-- Edit-Tweet-Modal -->
    <form action="{{ route('editTweet') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="EditTweetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <textarea rows="3" placeholder="Edit your Tweet" name="editTweetText" id="editTweetText" value="{{ Request::old('tweet') }}">{{ $tweetText }}</textarea>
                                <div id="pictureEditBox"></div>
                                <div class="add-post-links">
                                    <a href="#"><i class="fa-solid fa-camera fa-2xl"></i></a>
                                    <div class="form-group">
                                        <input type="file" name="editImg" id="editImg" value="{{ Request::old('img') }}">
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
        <div class="modal fade" id="PostRetweetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <p class="post-text-just-retweet"><i class="fa-solid fa-retweet"></i> {{ $user_name }} retweets</p>
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

    <!-- Edit-Comment-Modal -->
    <form action="{{ route('editComment') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="EditCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <textarea rows="3" placeholder="Edit your Comment" name="editCommentText" id="editCommentText" value="{{ Request::old('comment') }}">{{ $commentText }}</textarea>
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
    </script>
    <script>
        $(".PostRetweetModal").on("hidden.bs.modal", function() {
            $(".modal-body").html("");
        });
    </script>

    <script>
        $(".EditTweetModal").on("hidden.bs.modal", function() {
            $(".modal-body").html("");
        });
    </script>
    <script>
        $(".EditCommentModal").on("hidden.bs.modal", function() {
            $(".modal-body").html("");
        });
    </script>
    <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        function editTweet(id, text) {
            document.getElementById('editTweetText').value = text;
            document.getElementById('editTweetId').value = id;
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
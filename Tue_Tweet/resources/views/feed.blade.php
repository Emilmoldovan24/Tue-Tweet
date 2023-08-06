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

    /* .container {
        display: flex;
        justify-content: center;
        padding: 13px 5%;
    }

    .left-sidebar {


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
    } */

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
        width: 100%;
        height: 500px;
        border-radius: 4px;
        margin-bottom: 5px;
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

    .tweet-button {

        margin: ;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .above-feed {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .search-form {
        margin: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-input {
        position: relative;
    }

    .search-input input {
        padding: 10px 15px;
        width: 300px;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        outline: none;
    }

    .search-input button {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        outline: none;
        cursor: pointer;
        color: #555;
    }

    .search-input button:hover {
        color: #333;
    }

    .search-input button i {
        font-size: 20px;
    }

    .search-input button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
    }

    .custom-button {
        padding: 7px 15px;
        background-color: #a71b28;
        border: none;
        border-radius: 14px;
        font-size: 16px;
        color: #333;
        cursor: pointer;
    }

    .custom-button i {
        margin-right: 5px;
        color: white;
    }

    .custom-button:hover {
        background-color: #ddd;
    }

    .custom-button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
    }

    .notifications {
        margin: 15px;
        padding: 15px;
    }

    .share-it {
        margin: 15px;
        margin-bottom: 20px;
        padding: 15px;
    }

    .col-5 {
        margin-right: 20px;
    }

    .tweet.btn.btn-light {
        background-color: #a71b28;
        color: white;
    }

    .noti.btn.btn-secondary.dropdown-toggle {
        background-color: #a71b28;
    }

    .search.btn.btn-secondary.dropdown-toggle {
        background-color: #a71b28;
    }

    .noti-box {
        font-size: 1.7vh;
        /* Größe der Schrift in absoluten Einheiten */
        text-overflow: ellipsis;
        /* Verkürzt den Text mit Ellipsen (...) */
        white-space: nowrap;
        /* Verhindert Zeilenumbrüche */
        overflow: hidden;

        width: 100%;
        min-width: 200px;
        background-color: white;
        border-radius: 12px;
        padding-top: 5px;
        padding-left: 5px;
        border: 3px solid #a71b28;
        margin-top: 10px;
        margin-bottom: 10px;








    }

    .hidden.tweet.btn.btn-light {
        display: none;
        max-width: 300px;
        min-width: 250px;
    }

    .dropdown-hidden {
        display: none;

    }

    @media (min-width: 767px) and (max-width: 992px) {
        .activity-icons div {
            margin-right: 13px;
        }
    }

    @media (max-width: 766px) {
        .hidden.tweet.btn.btn-light {
            display: block;
            /* Button ab einer Bildschirmbreite von 768px anzeigen */
        }

        .dropdown-hidden {
            display: block;
            margin-top: 20px;

        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg">

        <a class="navbar-brand">
            <img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}" alt="logo">





        </a>

    </nav>

    <!--CONTAINER START-->
    <div class="container">

        <div class="row">

            <!--COLUMN 1 (LEFT-SIDEBAR-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xxl-3 me-auto">

                <div class="left-sidebar">
                    <!-- Current User Icon -->
                    <div class="card text-center">



                        <?php
                        $user_id = Auth::id();
                        $user_name = DB::table('users')
                            ->where('id', $user_id)
                            ->value('username');
                        $user_profileImg = DB::table('users')
                            ->where('id', $user_id)
                            ->value('profile_img');
                        $user_profileImg = app('App\Http\Controllers\UserController')->getUserImg($user_profileImg);
                        echo "<img class='img-fluid' src='" . $user_profileImg . "' >";
                        ?>


                        <div class="card-body text-center">
                            <h5 class="card-title text-center">Hello {{ $user_name }}!</h5>
                            <button type="button" class="hidden tweet btn btn-light" data-bs-toggle="modal" data-bs-target="#PostTweetModal" style="font-size: 20px;">
                                Tweet!
                            </button>




                            <script>
                                //Hidden Notifications
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Den Knopf-Element abrufen
                                    var scrollToBottomBtn = document.getElementById('scrollToBottomBtn');

                                    // Das Scrollen zum untersten Teil der Seite steuern
                                    scrollToBottomBtn.addEventListener('click', function() {
                                        // Scrollen zur untersten Position
                                        window.scrollTo(0, document.body.scrollHeight);
                                    });
                                });
                            </script>


                            <div class="dropdown-hidden">
                                <?php
                                $unreadNotifications = Auth::user()
                                    ->unreadNotifications()
                                    ->get();
                                ?>
                                @if (Auth::user()->unreadNotifications()->count() > 0)
                                <form action="{{ route('mark-as-read') }}" method="POST">
                                    @csrf
                                    <button class="hidden noti btn btn-secondary dropdown-toggle" id="scrollToBottomBtn" data-bs-toggle="dropdown" onclick="submitFormAndCallFunctionHidden(event)">
                                        <i class="fa-solid fa-bell" style="color: #ffffff;"></i>
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z">
                                        </path>
                                        </svg>
                                        <span class="badge bg-danger">{{ Auth::user()->unreadNotifications()->count() }}</span>
                                    </button>
                                </form>
                                @else
                                <button type="button" class="hidden noti btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa-regular fa-bell" style="color: #ffffff;"></i>
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z">
                                    </path>
                                    </svg>
                                </button>
                                @endif

                                <!-- Notification Dropdown -->
                                <div class="displayNotificationsHidden" id="displayNotificationsHidden" hidden>

                                    <!-- loop through all notifications -->
                                    @foreach ($unreadNotifications as $notification)
                                    <?php
                                    $noti_username = DB::table('users')
                                        ->where('id', $notification->data['user_id'])
                                        ->value('username');
                                    ?>

                                    @if ($notification->data['action'] == 'follow')
                                    <a class="dropdown-item" href="/{{ $noti_username }}">
                                        @else
                                        <a class="dropdown-item" href="{{ route('showTweet', ['id' => $notification->data['tweet_id'], 'typ' => $notification->data['tweet_typ'], 'notificationId' => $notification->id]) }}">
                                            @endif
                                            <div class="noti-box">
                                                <div class="row">

                                                    <div class="col-2">

                                                        <?php
                                                        $notification_userImg = App\Models\User::where('id', $notification->data['user_id'])->value('profile_img');
                                                        $notification_userImg = app('App\Http\Controllers\UserController')->getUserImg($notification_userImg);
                                                        $notification_username = App\Models\User::where('id', $notification->data['user_id'])->value('username');
                                                        ?>
                                                        <img src="{{ $notification_userImg }}" alt="User Image" style="width: 40px; height: 40px; border-radius: 50%;">
                                                    </div>


                                                    <div class="col-10">

                                                        @if ($notification->data['action'] == 'like')
                                                        <p>{{ $notification_username }} liked your tweet</p>
                                                        <p> click to see </p>
                                                        @elseif($notification->data['action'] == 'follow')
                                                        <p>{{ $notification_username }} started following you</p>
                                                        <p> click to see </p>
                                                        @else
                                                        <p>{{ $notification_username }} {{ $notification->data['action'] }}ed your
                                                            tweet</p>
                                                        <p> click to see </p>
                                                        @endif
                                                    </div>
                                                </div>

                                        </a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>















                </div>


                <!-- Menu Buttons -->
                <div class="list-group">
                    <form action="{{ route('feed') }}" method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i class="fa-solid fa-house"></i><a> Home </a></button>
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
            </div>
        </div>




        <!-- MIDDLE-BAR-FEED -->
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xxl-4">

            <div class="above-feed">
                <div class="dropdown">
                    <button class="search btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('feed', ['sort' => 'likes']) }}">Likes</a>
                        <a class="dropdown-item" href="{{ route('tweets.sortByTime', ['sort' => 'time']) }}">Newest</a>
                        <a class="dropdown-item" href="{{ route('tweets.sortByComments', ['sort' => 'comments']) }}">Comments</a>
                        <a class="dropdown-item" href="{{ route('tweets.sortByRetweet', ['sort' => 'retweet']) }}">Retweet</a>
                    </div>
                </div>

                <?php
                if (!isset($noResults)) {
                    //is true if there are no search results
                    $noResults = false;
                }
                if (!isset($closeSearch)) {
                    $closeSearch = false;
                } 
                if (!isset($oldSearch)) {
                    $oldSearch = "";
                }
                ?>

                <!-- Search Bar -->
                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <div class="search-input">
                        <input type="text" name="query" id="query" placeholder="Enter your search query" 
                        <?php if ($oldSearch != "") {
                                    echo 'value="' . $oldSearch . '"'; 
                                }?>
                        >
                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>



                <!-- Close search button (Back to feed) -->
                @if ($closeSearch)
                <form action="{{ route('closeSearch') }}" method="GET">
                    <button type="submit" class="custom-button">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                </form>
                @endif

            </div>



            <!-- opens retweet modal when session variable is set meaning when redirected from profile retweet button -->
            @if (session('openRetweetModal'))
            <?php
            $tweetId = request()
                ->route()
                ->parameter('id');
            $tweet = DB::table('tweets')
                ->where('tweet_id', $tweetId)
                ->first();
            $tweetText = $tweet->tweet;
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
                    retweet(
                        <?php echo $tweetId . ', "' . $tweetText . '", "' . $username . '", "' . $userId . '", "' . $userImgSrc . '", "' . $tweetCreatedAt . '", "' . $tweetImg . '"'; ?>);
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

            <!-- Orders by Date if its not set otherwise -->
            <?php
            if (isset($tweets) or $noResults) {
            } else {
                $tweets = DB::select("SELECT id, user_id, created_at, typ, visibility, deleted_at
                                                from (
                                                    SELECT tweet_id as id, user_id, created_at, 'tweet' as typ, visibility, own_visibility,  deleted_at
                                                        from tweets 
                                                        where deleted_at is null 
                                                        UNION
                                                        SELECT retweet_id, user_id, created_at, 'retweet' as typ, visibility, own_visibility, deleted_at
                                                        from retweets
                                                ) as feedTmp
                                                where deleted_at is null and visibility = 1 and own_visibility = 1
                                                order by created_at desc");
            }
            ?>

            @if ($noResults == true)
            <p> No results found </p>
            @else
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
            $tweet_typ = (string) $tweet->typ;

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
                            <a style="margin: 3px; text-decoration: none; font-weight: bold; color: black;" href="/{{ $username }}">{{ $username }}</a>
                            <a> &bull; </a>
                            <span>{{ $tweet->created_at }}</span>
                        </div>
                    </div>

                    <!--Überprüfe, ob die user_id des Tweets zur aktuellen Benutzer-ID gehört -->
                    @if ($user_id === $cur_user_id && $tweet->typ == 'tweet')
                    <!-- Edit and delete and hide tweet -->
                    <div class="menu-btn-own">
                        <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item">
                                    <a href="{{ route('MyTweetDelete', $tweet->id) }}" style="text-decoration: none;">Delete</a>
                                </button></li>
                            <?php echo '<li><button type="button" class="dropdown-item" onclick="editTweet(' . $tweet->id . ', ' . htmlspecialchars('"' . $tweetText . '"') . ')" data-tweet-id="{{$tweet->id}}" data-bs-toggle="modal" data-bs-target="#EditTweetModal">Edit</button></li>'; ?>
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
                        <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item">
                                    <a href="{{ route('MyRetweetDelete', $tweet->id) }}" style="text-decoration: none;">Delete</a>
                                </button></li>
                            <?php
                            $retweetId = $tweet->id; // ID des Retweets
                            $retweetText = $retweetText ?? ''; // Text des Retweets (falls vorhanden)
                            echo '<li><button type="button" class="dropdown-item" onclick="editRetweet(' . $retweetId . ', ' . htmlspecialchars('"' . $retweetText . '"') . ')" data-retweet-id="{{ $retweetId }} " data-bs-toggle="modal" data-bs-target="#EditRetweetModal">Edit</button></li>';
                            ?>
                            <li>
                                <button class="dropdown-item">
                                    <a href="{{ route('tweet.hide.feed', ['id' => $tweet->id, 'typ' => htmlspecialchars($tweet->typ)]) }}" style="text-decoration: none;">Hide Tweet</a>
                                </button>
                            </li>
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
                        <div style="display: inline-block;">
                           <a style="text-decoration: none; color: black; font-weight: bold;" href="/{{ $retweetedUsername }}">{{ $retweetedUsername }}</a>
                           <a style="margin: 3px;"> &bull; </a>
                           <span style="margin-left: -1px;">{{ $retweetedTweetCreatedAt }}</span>
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
                        if ($tweet->typ == 'tweet') {
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
                            <form action="{{ route('like') }}" method="POST">
                                @csrf
                                <div class="like-btn">

                                    <!-- Like Button turns red if  user has liked-->
                                    <?php
                                    if ($tweet->typ == 'tweet') {
                                        $alreadyLiked = DB::table('likes')
                                            ->where('tweet_id', $tweet->id)
                                            ->where('user_id', Auth::id())
                                            ->exists();
                                    } elseif ($tweet->typ == 'retweet') {
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
                                    @if ($tweet->typ == 'tweet')
                                    <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                    @elseif($tweet->typ == 'retweet')
                                    <input type="hidden" name="retweet_id" value="{{ $tweet->id }}">
                                    @endif
                                    <input type="hidden" name="typ" value="{{ $tweet->typ }}">
                                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                                </div>
                            </form>
                        </div>

                        <!-- Comment Button (display comments if button is clicked) -->
                        <div>
                            <div class="comment-btn">
                                <?php echo '<button onclick="displayComments(' . $tweet->id . ', ' . htmlspecialchars('"' . $tweet->typ . '"') . ')" class="btn btn-dark" aria-expanded="false">'; ?>
                                <i class="fa-regular fa-comment"></i> {{ $numComments }}
                                </button>
                            </div>
                        </div>
                        @if ($tweet->typ == 'tweet')
                        <!-- Retweet Button -->
                        <div class="retweet-btn">
                            <?php
                            $tweetCreatedAt = date('Y-m-d H:i:s', strtotime($tweet->created_at));
                            echo '<button onclick="retweet(' .
                                $tweet->id .
                                ', ' .
                                htmlspecialchars('"' . $tweetText . '"') .
                                ', ' .
                                htmlspecialchars('"' . $username . '"') .
                                ', ' .
                                htmlspecialchars('"' . $user_id . '"') .
                                ', ' .
                                htmlspecialchars('"' . $userImgSrc . '"') .
                                ', ' .
                                htmlspecialchars('"' . $tweetCreatedAt . '"') .
                                ', ' .
                                htmlspecialchars('"' . $tweetImg . '"') .
                                ')" 
                                                                                                                            class="btn btn-dark"   data-tweet-id="' .
                                $tweet_id .
                                '" data-bs-toggle="modal" data-bs-target="#PostRetweetModal" aria-expanded="false">'; ?>
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
                    if ($tweet->typ == 'tweet') {
                        $comments = DB::table('comments')->where('tweet_id', $tweet->id)->where('deleted_at', NULL)->where('visibility', 1)->get();
                    } elseif ($tweet->typ == 'retweet') {
                        $comments = DB::table('comments')->where('retweet_id', $tweet->id)->where('deleted_at', NULL)->where('visibility', 1)->get();
                    }
                    foreach ($comments as $comment) {
                        $commentUsername = DB::table('users')->where('id', $comment->user_id)->value('username');
                        $commiUserImg = DB::table('users')->where('id', $comment->user_id)->value('profile_img');
                        $commiUserImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($commiUserImg);
                        $commentText = $comment->comment;
                    ?>
                        <div class="comment-post-container">
                            <div class="post-row">
                                <div class="comment-user-profile">
                                    <?php echo $commiUserImgHtml; ?>
                                    <div style="display: inline-block;">
                                        <a style="margin: 3px; text-decoration: none;" href="/{{ $commentUsername }}">{{ $commentUsername }}</a>
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
                        <form action="{{ route('postComment') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="comment" id="comment" class="form-control" placeholder="Add a comment" aria-label="Add a comment" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>
                            </div>
                            <input type="hidden" name="tweet_typ" value="{{ $tweet->typ }}">
                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endisset
    </div>



    <!-- RIGHT SIDE-BAR -->
    <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xxl-3 ms-auto">
        <div class="right-sidebar">
            <div class="share-it">
                <br>
                <br>
                <h4>Share whats on your mind!</h4>
                <button type="button" class="tweet btn btn-light" data-bs-toggle="modal" data-bs-target="#PostTweetModal" style="font-size: 20px;">
                    Tweet!
                </button>
            </div>
            <div class="notifications">
                <h4>Notifications</h4>
                <script>
                    function toggleNotifications() {
                        let element = document.getElementById("displayNotifications");
                        element.removeAttribute("hidden");

                        if (element.style.display == "none" || element.style.display == "") {
                            // show
                            element.style.display = "block";
                        } else {
                            // hide
                            element.style.display = "none";
                        }
                    }

                    let notificationOpen = false;

                    function submitFormAndCallFunction(event) {

                        // read all notifications when dropdown is opened
                        if (notificationOpen) {
                            event.preventDefault();
                            event.target.form.submit();
                        }

                        // show or hide notifications
                        toggleNotifications();
                        notificationOpen = !notificationOpen;
                    }
                </script>



                <!-- Notification Button -->
                <div class="dropdown">
                    <?php
                    $unreadNotifications = Auth::user()
                        ->unreadNotifications()
                        ->get();
                    ?>
                    @if (Auth::user()->unreadNotifications()->count() > 0)
                    <form action="{{ route('mark-as-read') }}" method="POST">
                        @csrf
                        <button class="noti btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" onclick="submitFormAndCallFunction(event)">
                            <i class="fa-solid fa-bell" style="color: #ffffff;"></i>
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z">
                            </path>
                            </svg>
                            <span class="badge bg-danger">{{ Auth::user()->unreadNotifications()->count() }}</span>
                        </button>
                    </form>
                    @else
                    <button type="button" class="noti btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa-regular fa-bell" style="color: #ffffff;"></i>
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z">
                        </path>
                        </svg>
                    </button>
                    @endif

                    <!-- Notification Dropdown -->
                    <div class="displayNotifications" id="displayNotifications" hidden>

                        <!-- loop through all notifications -->
                        @foreach ($unreadNotifications as $notification)
                        <?php
                        $noti_username = DB::table('users')
                            ->where('id', $notification->data['user_id'])
                            ->value('username');
                        ?>

                        @if ($notification->data['action'] == 'follow')
                        <a class="dropdown-item" href="/{{ $noti_username }}">
                            @else
                            <a class="dropdown-item" href="{{ route('showTweet', ['id' => $notification->data['tweet_id'], 'typ' => $notification->data['tweet_typ'], 'notificationId' => $notification->id]) }}">
                                @endif
                                <div class="noti-box">
                                    <div class="row">

                                        <div class="col-2">

                                            <?php
                                            $notification_userImg = App\Models\User::where('id', $notification->data['user_id'])->value('profile_img');
                                            $notification_userImg = app('App\Http\Controllers\UserController')->getUserImg($notification_userImg);
                                            $notification_username = App\Models\User::where('id', $notification->data['user_id'])->value('username');
                                            ?>
                                            <img src="{{ $notification_userImg }}" alt="User Image" style="width: 40px; height: 40px; border-radius: 50%;">
                                        </div>


                                        <div class="col-10">

                                            @if ($notification->data['action'] == 'like')
                                            <p>{{ $notification_username }} liked your tweet</p>
                                            <p> click to see </p>
                                            @elseif($notification->data['action'] == 'follow')
                                            <p>{{ $notification_username }} started following you</p>
                                            <p> click to see </p>
                                            @else
                                            <p>{{ $notification_username }} {{ $notification->data['action'] }}ed your
                                                tweet</p>
                                            <p> click to see </p>
                                            @endif
                                        </div>
                                    </div>

                            </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>


        <!-- Notification design examples
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
-->


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
                            </div>
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
                                <textarea rows="3" placeholder="Edit your Tweet" name="editTweetText" id="editTweetText" value="{{ Request::old('tweet') }}"></textarea>
                            </div>
                            <div id="pictureEditBox"></div>
                            <div class="add-post-links">
                                <a href="#"><i class="fa-solid fa-camera fa-2xl"></i></a>
                                <div class="form-group">
                                    <input type="file" name="editImg" id="editImg" value="{{ Request::old('img') }}">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"> Confirm </button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--  Retweet-Modal -->
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
                                <input style="display:none" name="user_id" id="retweet_user_id">
                                <textarea rows="3" placeholder="Add text to your retweet" name="retweet_text" id="retweet_text"></textarea>

                                <!-- Display quoted tweet -->
                                <div class="quotedTweetBox" id="quotedTweetBox">
                                    <p class="post-text-just-retweet"><i class="fa-solid fa-retweet"></i>
                                        {{ $user_name }} retweets
                                    </p>
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
                        <button type="submit" class="btn btn-danger"> Confirm </button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Edit-Retweet-Modal -->
    <form action="{{ route('editRetweet') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="EditRetweetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <textarea rows="3" placeholder="Edit your Retweet" name="editRetweetText" id="editRetweetText" value="{{ Request::old('retweet_text') }}"></textarea>
                                <input type="hidden" name="id" id="editRetweetId">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger"> Confirm </button>
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
                                <textarea rows="3" placeholder="Edit your Comment" name="editCommentText" id="editCommentText" value="{{ Request::old('comment') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"> Confirm </button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </div>
            </div>
        </div>
    </form>


    </div>
    </div>

    <div>



        <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
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

            function retweet(tweetId, tweetText, tweetUsername, tweetUserId, tweetUserImg, tweetCreatedAt, tweetImg) {

                document.getElementById('tweet_id').value = tweetId;
                document.getElementById('retweet_user_id').value = tweetUserId;

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
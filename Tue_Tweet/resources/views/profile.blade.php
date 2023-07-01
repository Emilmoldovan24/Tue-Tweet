<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>
        body {
            background-color: lightgrey;

        }

        .profile-img {

            width: 100%;
            max-width: 200px;
            margin-top: 10px;
            border-radius: 50%;

        }

        /*    .card-img-top {
            margin-top: 10px;
            max-height: 80%;
            max-width: 80%;
            border-radius: 50%;
        } */
        .card {
            align-items: center;
            margin-top: 20px;
        }

        .card-body {
            display: inline-block;
        }

        .card-img-top-tweet {
            margin-top: 10px;
            max-height: 20%;
            max-width: 20%;
            border-radius: 50%;
        }

        .card-img-noti {
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .navbar {
            color: white;
        }

        .list-group {
            width: 279px;
        }

        .btn.btn-light {
            margin: 20px;
        }

        .card {
            margin-bottom: 10px;
        }

        .bg-dark.p-4 {
            align-items: left;
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


        /*
    .container {
        display: flex;
        justify-content: space-between;
        padding: 13px 5%;
    } */

        /*
    .left-side {
        flex-basis: 25%;
        position: sticky;
       
     

    }

    .right-side {
       
        flex-basis: 25%;
        position: sticky;
       
      
    }

    .middle-side {
        flex-basis: 47%;
        
    } */

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

        .pos-f-t {
            width: 300px;
            height: 60px;

        }

        .navbar.navbar-expand-lg {
            display: flex;
            align-items: left;
            background-color: #75151E;
            padding: 5px 5%;
            position: sticky;
            top: 0;
            z-index: 100;
            margin-bottom: 20px;
        }

        .tuetweetlogo {

            width: 150px;
            border-radius: 9px;
        }
    </style>
</head>

<body>
    <?php
    // Database requests
    $user_id = Auth::user()->id;
    $profile_id = DB::table('users')
        ->where('username', $username)
        ->value('id');
    $profile_followers = DB::table('follows')
        ->where('follow_user_id', $profile_id)
        ->count();
    $profile_following = DB::table('follows')
        ->where('following_user_id', $profile_id)
        ->count();
    $myProfile = $user_id == $profile_id;
    $follow = DB::table('follows')
        ->where('following_user_id', $user_id)
        ->where('follow_user_id', $profile_id)
        ->exists();
    ?>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand"><img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}"
                alt="logo"></a>
        <form action="{{ route('feed') }}" method="GET">
            <button type="submit" class="btn btn-light"><i class="fa-solid fa-house"></i><a> Home </a></button>
        </form>
        <form action=<?php echo "'/" .
            DB::table('users')
                ->where('id', Auth::id())
                ->value('username') .
            "'"; ?> method="GET">
            <button type="submit" class="btn btn-light"><i class="fa-solid fa-user"></i><a> Profile
                </a></button>
        </form>
        <form action="{{ route('settings') }}" method="GET">
            <button type="submit" class="btn btn-light"><i class="fa-solid fa-gear"></i><a> Settings
                </a></button>
        </form>
        <form action="{{ route('logout') }}" method="GET">
            <button type="submit" class="btn btn-light"><i class="fa-solid fa-right-from-bracket"></i><a> Logout
                </a></button>
        </form>


    </nav>

    <div class="container">
        <!-- <img class="titelbild" src="https://civis.eu/storage/files/picture-univeristy-tubingen.jpg" alt=""> -->

        <div class="row">


            <div class="col">

                <div class="left-side">

                    <div class="card" style="width: 18rem;">
                        <?php
                        $userImg = DB::table('users')
                            ->where('id', $profile_id)
                            ->value('profile_img');
                        $profileImg = app('App\Http\Controllers\UserController')->getUserImg($userImg);
                        echo "<img class='img-fluid' src='" . $profileImg . "' >";
                        ?>

                        <div class="card-body">
                            <h5 class="card-title">@ {{ $username }}</h5>
                            <p class="card-text">
                                {{-- Ich studiere Informatik im (xy). Semester. --}}
                                <?php
                                $userBio = DB::table('users')
                                    ->where('id', $profile_id)
                                    ->value('profile_bio');
                                if (is_null($userBio) && Auth::id() == $profile_id) {
                                    echo '<a href="' . route('settings') . '">Create your bio</a>'; // Weiß nicht ob man hier dann noch angemeldet bleibt, muss man testen!
                                } else {
                                    echo $userBio;
                                }
                                ?>
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- <li class="list-group-item"><i class="fa-solid fa-location-dot"></i> Tübingen</li> --}}
                            <li class="list-group-item"><i class="fa-solid fa-calendar"></i>
                                <?php
                                use Carbon\Carbon;
                                $userJoined = DB::table('users')
                                    ->where('id', $profile_id)
                                    ->value('created_at');
                                $createdDate = Carbon::parse($userJoined)->format('d.m.Y H:i:s');
                                echo '<a>  Joined at ' . $createdDate . '</a>';
                                ?>
                            </li>


                            <li class="list-group-item"><a href="#"> {{ $profile_following }} following</a></li>
                            <li class="list-group-item"><a href="#">{{ $profile_followers }} followers</a></li>

                            <!-- Follow Button -->
                            @if (!$myProfile)
                                <form action="{{ route('follow') }}" method="POST">
                                    <?php echo csrf_field(); ?>

                                    @if ($follow)
                                        <button type="submit" class="btn btn-primary">Unfollow</button>
                                    @else
                                        <button type="submit" class="btn btn-primary">Follow</button>
                                    @endif
                                    <input type="hidden" name="follow_user_id" value="{{ $profile_id }}">
                                </form>
                            @endif
                        </ul>

                    </div>







                </div>
            </div>


            <div class="col-5">

                <div class="middle-side">

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


                    {{-- eigenes Feed anzeigen. Design ist bisschen verschoben? --}}
                    <?php
                    // in own profile -> also show archived tweets
                    // in other profile -> show public tweets
                    $myProfile = $user_id == $profile_id;
                    $query = app('App\Http\Controllers\ProfileController')->getProfileQuery($profile_id, $myProfile);
            ?>


                @foreach ($query as $tweet)
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
                <?php 
                if(($tweet->deleted_at == NULL) && $tweet->own_visibility == 0){
                    echo '<div class="post-container" style= "background-color: #9a9a9a">';
                    } 
                else {
                    echo '<div class="post-container" style= "background-color: white">';
                } ?>

                    <div class="post-row">
                        <div class="user-profile">
                            <?php echo $userImgHtml; ?>
                            <div style="display: inline-block;">
                                <a style="margin-right: 3px; text-decoration: none;"
                                    href="/{{ $username }}">{{ $username }}</a>
                                <a> &bull; </a>
                                <span>{{ $tweet->created_at }}</span>
                            </div>
                        </div>

                        <!--Überprüfe, ob die user_id des Tweets zur aktuellen Benutzer-ID gehört -->
                        @if ($user_id === $cur_user_id)
                            <!-- Edit and delete tweet -->
                            <div class="menu-btn-own">
                                <button class="btn btn-dark" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item"><a href="{{ route('MyTweetDelete', $tweet->id) }}"
                                                style="text-decoration: none;">Delete</a></button></li>
                                    <?php echo '<li><button type="button" class="dropdown-item" onclick="editTweet(' . $tweet->id . ', ' . htmlspecialchars('"' . $tweetText . '"') . ')" data-tweet-id="{{$tweet->id}}" data-bs-toggle="modal" data-bs-target="#EditTweetModal">Edit</button></li>'; ?>
                                    <li><button class="dropdown-item">
                                            <a href="{{ route('tweet.hide.feed', ['id' => $tweet->id, 'typ' => htmlspecialchars($tweet->typ)]) }}">Hide Tweet</a>
                                        </button></li>
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
                </div>






            </div>

            <div class="col">

                <div class="right-side">

                    <div class="pos-f-t">

                        <div class="collapse" id="navbarToggleExternalContent">

                            <div class="bg-dark p-4">

                                <div class="card" style="width: 15rem;">
                                    <div class="card-body">
                                        <div style="display: inline-block;">
                                            <img class="card-img-noti"
                                                src="https://images.unsplash.com/photo-1531891437562-4301cf35b7e4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1364&q=80"
                                                width="56" height="56" alt="Card image cap">
                                        </div>
                                        <p class="card-text">Sven reported your post.</p>
                                        <a href="#" class="btn btn-primary">See the Post</a>
                                    </div>
                                </div>


                                <div class="card" style="width: 15rem;">
                                    <div class="card-body">

                                        <img class="card-img-noti"
                                            src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80"
                                            width="56" height="56" alt="Card image cap">

                                        <p class="card-text">Mike wants to follow you.</p>
                                        <a href="#" class="btn btn-primary">Accept</a>
                                        <a href="#" class="btn btn-secondary">Decline</a>
                                    </div>
                                </div>

                                <div class="card" style="width: 15rem;">
                                    <div class="card-body">
                                        <div style="display: inline-block;">
                                            <img class="card-img-noti"
                                                src="https://images.unsplash.com/photo-1602233158242-3ba0ac4d2167?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z2lybHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=700&q=60"
                                                width="56" height="56" alt="Card image cap">
                                        </div>
                                        <p class="card-text">Erica commented on your post.</p>
                                        <a href="#" class="btn btn-primary">See the Post</a>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <nav class="navbar navbar-dark bg-dark">
                            <p>Show Notifications</p>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </nav>
                    </div>


                </div>



                <!--             <div class="card" style="width: 18rem;">
  <img class="card-img-top-tweet" src="https://images.unsplash.com/photo-1615899486509-84e2c782b0da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=700&q=60" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
 -->


            </div>
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
            <!-- Edit-Tweet-Modal -->
            <form action="{{ route('editProfileTweet') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="EditProfileTweetModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <input style="display:none" name="id" id="editProfileTweetId">
                                            <textarea rows="3" placeholder="Edit your Tweet" name="editProfileTweetText" id="editProfileTweetText"
                                                value="{{ Request::old('tweet') }}">{{$tweetText}}</textarea>
                                            <div id="pictureProfileEditBox"></div>
                                            <div class="add-post-links">
                                                <a href="#"><i class="fa-solid fa-camera fa-2xl"></i></a>
                                                <div class="form-group">
                                                    <input type="file" name="editProfileImg" id="editProfileImg"
                                                        value="{{ Request::old('img') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        {{-- <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script> --}}

        {{-- Open dropdown-menu --}}
        <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

        <script>
            $(".EditProfileTweetModal").on("hidden.bs.modal", function() {
                document.getElementById("editProfileTweetText").value = "test"
                $(".modal-body").html("");
            });
        </script>
        <script>
            $(".EditCommentModal").on("hidden.bs.modal", function() {
                $(".modal-body").html("");
            });
        </script>
        <script>
            function editProfileTweet(id, text) {
                document.getElementById('editProfileTweetText').value = text;
                document.getElementById('editProfileTweetId').value = id;
            }
        </script>
        <script>
            function editComment(commentId, commentText) {
                document.getElementById('editCommentText').value = commentText;
                document.getElementById('editCommentId').value = commentId;
            }
        </script>
    </body>

    </html>

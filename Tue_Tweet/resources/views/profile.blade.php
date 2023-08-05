<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<style>
    body {
        background-color: #E7E7E7;
        min-width: 650px;

    }

    .profile-img {

        width: 100%;
        max-width: 200px;
        margin-top: 10px;
        border-radius: 50%;

    }

    .card {
        align-items: center;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .card-body {
        display: inline-block;
    }




    .card .img {
        border-radius: 10px;
        min-width: 20px;
        max-width: 300px;
      
    }
    .card-img-noti {
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .navbar {
        color: white;
    }

    .bg-dark.p-4 {
        align-items: left;
    }

    .post-input-container {
        padding-left: 55px;
        padding-right: 55px;
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

    .left-side {
          
        position: sticky;
        top: 5px;
       

    }
    .right-side {


       
        
        position: sticky;
        top: 100px;
        
       
        


    }

    .write-post-container {
        width: 100%;
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

        background-color: white;
        border-radius: 12px;
        padding: 20px;
        color: black;
        margin: 20px 0;
        border: 3px solid #a71b28;
        width: 100%;
        min-width: 300px;
        overflow: hidden;
        word-wrap: break-word;

    }

    .user-profile span {
        font-size: 13px;
        color: #9a9a9a;
    }

    .post-text-just-retweet {
        color: #a71b28;
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
        margin: 0 auto;
        background-color: #a71b28;
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

    .tuetweetlogo {

        width: 180px;
        border-radius: 9px;
    }

    .tweet.btn.btn-light {
        background-color: #a71b28;
        color: white;
        border-radius: 6px;
    }

    .share-it {
        margin-top: 15px;
        

    }
.share-text {
    font-size: 28px;
}
    .list-group .list-group-item.list-group-item-action {
        background-color: #a71b28;
        color: white;
        border-radius: 9px;
        margin: 3px;
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
   
        color: black;
    }
    .hidden.tweet.btn.btn-light {
display: none;
max-width: 300px;
margin: 10px;
    }
    .follow.btn.btn-light {
        background-color: #a71b28;
        color: white;
        border-radius: 6px;
        margin: 10px;
    }
    .unfollow.btn.btn-dark {
      
     
        border-radius: 6px;
        margin: 10px;
    }

    @media (min-width: 767px) and (max-width: 992px) {
        .activity-icons div {
            margin-right: 13px;
}
}

    @media (max-width: 766px) {
        .hidden.tweet.btn.btn-light {
    display: block; 
  }
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



    </nav>

    <div class="container">

        <div class="row">


   
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xxl-3 me-auto">

                <div class="left-side">

                    <div class="card">
                        <?php
                        $userImg = DB::table('users')
                            ->where('id', $profile_id)
                            ->value('profile_img');
                        $profileImg = app('App\Http\Controllers\UserController')->getUserImg($userImg);
                        echo "<img class='img-fluid' src='" . $profileImg . "' >";
                        ?>

                        <div class="card-body text-center">
                            <h5 class="card-title"> <?php echo '@' . $username ?></h5>
                            <p class="card-text text-center">
                                {{-- Ich studiere Informatik im (xy). Semester. --}}
                                <?php
                                $userBio = DB::table('users')
                                    ->where('id', $profile_id)
                                    ->value('profile_bio');
                                if (is_null($userBio) && Auth::id() == $profile_id) {
                               
                                    echo '<form action="' . route('settings') . '" method="GET">';
                                    echo '    <button type="submit" class="tweet btn btn-light">Create your Bio</button>';
                                    echo '</form>';


                                } else {
                                    echo $userBio;
                                }
                                ?>
                            </p>
                        </div>
                        <ul class="list-group list-group-flush text-center">

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


                            <li class="list-group-item"><span>{{ $profile_following }} following</span></li>
                            <li class="list-group-item"><span>{{ $profile_followers }} followers</span></li>


                            @if ($myProfile)
                            <button type="button" class="hidden tweet btn btn-light" data-bs-toggle="modal"
                data-bs-target="#PostTweetModal" style="font-size: 20px;">
                Tweet!
            </button>
                            @endif

               
                            <!-- Follow Button -->
                            @if (!$myProfile)
                                <form action="{{ route('follow') }}" method="POST">
                                    <?php echo csrf_field(); ?>

                                    @if ($follow)
                                        <button type="submit" class="unfollow btn btn-dark" style="font-size: 20px;">Unfollow</button>
                                    @else
                                        <button type="submit" class="follow btn btn-light" style="font-size: 20px;">Follow</button>
                                    @endif
                                    <input type="hidden" name="follow_user_id" value="{{ $profile_id }}">
                                </form>
                            @endif
                        </ul>

                    </div>




                    <div class="list-group">
                        <form action="{{ route('feed') }}" method="GET">
                            <button type="submit" class="list-group-item list-group-item-action"><i
                                    class="fa-solid fa-house"></i><a> Home </a></button>
                        </form>
                        <form action=<?php echo "'/" .
                            DB::table('users')
                                ->where('id', Auth::id())
                                ->value('username') .
                            "'"; ?> method="GET">
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








                </div>
            </div>



            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xxl-4">

                <div class="middle-side">

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
                        <?php
                        if ($tweet->deleted_at == null && $tweet->own_visibility == 0) {
                            echo '<div class="post-container" style= "background-color: #9a9a9a">';
                        } else {
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
                            @if ($user_id === $cur_user_id && $tweet->typ == 'tweet')
                                <!-- Edit and delete tweet -->
                                <div class="menu-btn-own">
                                    <button class="btn btn-dark" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item"><a
                                                    href="{{ route('deleteTweetProfile', $tweet->id) }}"
                                                    style="text-decoration: none;">Delete</a></button></li>
                                        <?php echo '<li><button type="button" class="dropdown-item" onclick="editTweetProfile(' . $tweet->id . ', ' . htmlspecialchars('"' . $tweetText . '"') . ')" data-tweet-id="{{$tweet->id}}" data-bs-toggle="modal" data-bs-target="#EditProfileTweetModal">Edit</button></li>'; ?>
                                        <li><button class="dropdown-item">
                                                @if ($tweet->deleted_at == null && $tweet->own_visibility == 0)
                                                    <a href="{{ route('tweet.hide.feed', ['id' => $tweet->id, 'typ' => htmlspecialchars($tweet->typ)]) }}"
                                                        style="text-decoration: none;">Unhide Tweet</a>
                                                @else
                                                    <a href="{{ route('tweet.hide.feed', ['id' => $tweet->id, 'typ' => htmlspecialchars($tweet->typ)]) }}"
                                                        style="text-decoration: none;">Hide Tweet</a>
                                                @endif
                                            </button></li>
                                    </ul>
                                </div>
                            @endif
                            <!-- Retweet-->
                            @if ($user_id === $cur_user_id && $tweet->typ == 'retweet')
                                <!-- Edit and delete and hide tweet -->
                                <div class="menu-btn-own">
                                    <button class="btn btn-dark" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item">
                                                <a href="{{ route('deleteRetweetProfile', $tweet->id) }}"
                                                    style="text-decoration: none;">Delete</a>
                                            </button>
                                        </li>
                                        <?php
                                        $retweetProfileId = $tweet->id; // ID des Retweets
                                        $retweetProfileText = $retweetText ?? ''; // Text des Retweets (falls vorhanden)
                                        echo '<li><button type="button" class="dropdown-item" onclick="editRetweet(' . $retweetProfileId . ', ' . htmlspecialchars('"' . $retweetProfileText . '"') . ')" data-profile-retweet-id="{{ $retweetProfileId }} " data-bs-toggle="modal" data-bs-target="#EditProfileRetweetModal">Edit</button></li>';
                                        ?>

                                        <li>
                                            <button class="dropdown-item">
                                                @if ($tweet->deleted_at == null && $tweet->own_visibility == 0)
                                                    <a href="{{ route('tweet.hide.feed', ['id' => $tweet->id, 'typ' => htmlspecialchars($tweet->typ)]) }}"
                                                        style="text-decoration: none;">Unhide Tweet</a>
                                                @else
                                                    <a href="{{ route('tweet.hide.feed', ['id' => $tweet->id, 'typ' => htmlspecialchars($tweet->typ)]) }}"
                                                        style="text-decoration: none;">Hide Tweet</a>
                                                @endif
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
                                        <span style="margin: 1px;">{{ $retweetedTweetCreatedAt }}</span>
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
                                    <form action=like method="POST">
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
                                        <form action="{{ route('retweetProfile', ['tweet_id' => $tweet->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark"><i
                                                    class="fa-solid fa-retweet" aria-expanded="false"></i>
                                                {{ $retweets }}</button>
                                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                        </form>
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
                        $commiUserImg = DB::table('users')->where('id', $comment->user_id)->value('profile_img');
                        $commiUserImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($commiUserImg); 
                    ?>
                            <div class="comment-post-container">
                                <div class="post-row">
                                    <!-- <div class="comment"> -->
                                    <div class="user-profile">
                                        <?php echo $commiUserImgHtml; ?>
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
                                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
        </div>





                    
    </div>

    <!-- <div class="col-4 col-md-3 col-sm-2 ms-auto"> -->
   
    <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xxl-3 ms-auto">
        <div class="right-side">

            <div class="share-it">
                <h4 class="share-text">Share whats on your mind!</h4>
                <button type="button" class="tweet btn btn-light" data-bs-toggle="modal"
                    data-bs-target="#PostTweetModal" style="font-size: 20px;">
                    Tweet!
                </button>
            </div>


        </div>





        
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
                                       

                        </div>
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
        <form action="{{ route('editTweetProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="EditProfileTweetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="write-post-container">
                                <div class="user-profile">
                                    <img src="{{ $user_profileImg }}">
                                    <div>
                                        {{ $user_name }} <br>
                                    

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
                                        value="{{ Request::old('tweet') }}"></textarea>
                                        </div>
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
        <form action="{{ route('editRetweetProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="EditProfileRetweetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="write-post-container">
                                <div class="user-profile">
                                    <img src="{{ $user_profileImg }}">
                                    <div>
                                        {{ $user_name }} <br>
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
                                    <input style="display:none" name="retweet_id" id="editProfileRetweetId">
                                    <textarea rows="3" placeholder="Edit your Retweet" name="editProfileRetweetText" id="editProfileRetweetText"
                                        value="{{ Request::old('retweet_text') }}"></textarea>
                                    <input type="hidden" name="id" id="editProfileRetweetId">

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



        {{-- Open dropdown-menu --}}
        <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>



        <script>
            function editTweetProfile(id, text) {
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
        <script>
            function editRetweet(retweetProfileId, retweetProfileText) {
                console.log(retweetProfileId, retweetProfileText);
                document.getElementById('editProfileRetweetText').value = retweetProfileText;
                document.getElementById('editProfileRetweetId').value = retweetProfileId;
            }
        </script>
          
    </body>

    </html>

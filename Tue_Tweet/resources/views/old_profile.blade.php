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


                    {{-- eigenes Feed anzeigen. Design ist bisschen verschoben? --}}
                    <?php
            // #TODO visibility und deleted_at Abfragen 
            $tweets = "SELECT id, user_id, created_at, typ, visibility, deleted_at
                        from (
                            SELECT tweet_id as id, user_id, created_at, 'tweet' as typ, visibility, own_visibility,  deleted_at
                                from tweets 
                                where deleted_at is null 
                                UNION
                                SELECT retweet_id, user_id, created_at, 'retweet' as typ, visibility, own_visibility, deleted_at
                                from retweets
                        ) as feedTmp
                        where deleted_at is null and visibility = 1 and user_id = ' . $profile_id . '
                        ORDER BY created_at DESC";

            $tweeets = DB::table('tweets')->where('user_id', $profile_id)->where('visibility', 1)->where('deleted_at', NULL)->orderBy('created_at', 'desc')->get();

           

            foreach ($tweets as $tweet) {
                $cur_user_id = Auth::id();
                $currentTimeString = time();
                $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
                $id = $tweet->user_id;
                $username = DB::table('users')->where('id', $id)->value('username');
                $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);

                // Tweet header
                if(($tweet->deleted_at == NULL) && $tweet->own_visibility == 0){
                echo '<div class="post-container" style= "background-color: #9a9a9a">';
                } 
                else {
                echo '<div class="post-container" style= "background-color: white">';}
                echo '<div class="post-row">';
                echo '<div class="user-profile">';
                echo $userImgHtml;
                echo '<div style="display: inline-block;">';
                echo '<a style="margin-right: 3px; text-decoration: none;" href="/' . $username . '">' . $username . '</a>';
                echo '<a> &bull; </a>';
                echo '<span>' . $tweet->created_at . '</span>';
                echo '</div>';
                echo '</div>';

                // Überprüfe, ob die user_id des Tweets zur aktuellen Benutzer-ID gehört
                if ($id === Auth::id()) {
                echo '<div class="menu-btn-own">';
                echo '<button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>';
                echo '<ul class="dropdown-menu">';
                    ?> <li><button class="dropdown-item"><a
                                href="{{ route('ProfileTweetDelete', $tweet->tweet_id) }}"
                                style="text-decoration: none;">Delete</a></button></li> <?php
                                echo '<li><button type="button" class="dropdown-item" onclick="editProfileTweet(' . $tweet->tweet_id . ', ' . htmlspecialchars('"' . $tweet->tweet . '"') . ')" data-tweet-id="' . $tweet->tweet_id . '" data-bs-toggle="modal" data-bs-target="#EditProfileTweetModal">Edit</button></li>';
                                ?>

                    <li><button class="dropdown-item"><a href="{{ route('tweet.hide.feed', $tweet->tweet_id) }}">Hide/
                                Unhide Tweet</a></button></li> <?php
                echo '</ul>';
                echo '</div>';

                
                }
                 
                echo '</div>';
           
                



                // Tweet content
                if (!is_null($tweet->tweet)) { // Validation fängt es schon ab, dennoch so besser
                    echo '<div class="tweet-content">';
                    echo $tweet->tweet . '<br>';
                }

                // display Tweet image
                if (!is_null($tweet->img)) {
                    $tweetImg = app('App\Http\Controllers\UserController')->getUserImgHtml($tweet->img);
                    echo '<img class="img-fluid" src=data:image/png;base64,' . $tweet->img . '>';
                }
                echo '</div>';

                // Activity Icons
                echo '<div class="post-row">';
                echo '<div class="activity-icons">';

                
                // Count Likes Comments and Retweets
                $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->where('deleted_at', NULL)->where('visibility', 1)->count();
                $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->where('deleted_at', NULL)->where('visibility', 1)->count();
                $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->where('deleted_at', NULL)->where('visibility', 1)->count();
                

                // Like Button
                echo '<div>';
                
                echo '<form action=like method="POST">';
                echo csrf_field();
                echo '<div class="like-btn">';
                echo '<input type="hidden" name="tweet_id" value="' . $tweet->tweet_id . '">';
                echo '<input type="hidden" name="typ" value="tweet">'; // dummy

                // like button turns red if user has liked the tweet
                if (DB::table('likes')->where('tweet_id', $tweet->tweet_id)->where('user_id', Auth::id())->exists()) {
                    echo '<button type="submit" class="btn btn-danger"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                } else {
                    echo '<button type="submit" class="btn btn-dark"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                }
                echo '</div>';
                echo '</form>';
                echo '</div>';


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
                echo '<button type="button" class="btn btn-dark">';
                echo '<i class="fa-solid fa-retweet"></i>' . $retweets . '';
                echo '</button>';

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
                $comments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->where('deleted_at', NULL)->where('visibility',1)->get();
                foreach ($comments as $comment) {
                    $commentUsername = DB::table('users')->where('id', $comment->user_id)->value('username');
                    $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                    $commentText = $comment->comment;
                    echo '<div class="comment">';
                    echo '<div class="user-profile">';
                    echo $userImgHtml;
                    echo '<div>';
                    echo '<p>' . $commentUsername . '</p>';
                    echo '<span>' . $comment->created_at . '</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '<p>' . $comment->comment . '</p>';

                    if ($comment->user_id === $cur_user_id) {
                    echo '<div class="menu-btn-own">  <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>';
                    echo '<ul class="dropdown-menu">';
                    ?> <li><button class="dropdown-item"><a
                                href="{{ route('MyCommentDelete', $comment->comment_id) }}"
                                style="text-decoration: none;">Delete</a></button></li> <?php                      
                    echo '<li><button type="button" class="dropdown-item" onclick="editComment('.$comment->comment_id.', '.htmlspecialchars('"'.$comment->comment.'"').')" data-comment-id="' . $comment->comment_id . '" data-bs-toggle="modal" data-bs-target="#EditCommentModal">Edit</button></li>';
                    echo '</ul>';
                    echo '</div>';
                    }

                    echo '</div>';
                }


                // comment input field
                echo '<div class="comment-input">';
                echo '<form action=postComment method="POST">';
                echo csrf_field();
                echo '<div class="input-group mb-3">';
                echo '<input type="hidden" name="tweet_id" value="' . $tweet->tweet_id . '">';
                echo '<input type="hidden" name="tweet_typ" value="tweet">'; // dummy
                echo '<input type="text" name="comment" id="comment" class="form-control" placeholder="Add a comment" aria-label="Add a comment" aria-describedby="button-addon2">';
                echo '<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>';
                echo '</div>';
                echo '</form>';
                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
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
                                                value="{{ Request::old('tweet') }}">
                                {{ isset($tweet) ? $tweet->tweet : '' }}
                            </textarea>
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

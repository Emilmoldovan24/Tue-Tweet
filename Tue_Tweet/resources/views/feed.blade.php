<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!--CONTAINER START-->
    <div class="container">



        <!--COLUMN 1 (LEFT-SIDEBAR-->
        <div class="col-3">




            <div class="left-sidebar">


           
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php
                            $id = Auth::id();
                            $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                            if (is_null($userImg)){
                                echo '<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" height="100px" width="150px" alt="...">';
                            } else{
                                echo '<img src=data:image/png;base64,' . $userImg . ' height="100px" width="150px" alt="...">';
                            }
                            
                            ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <?php
                                $id = Auth::id();
                                $results = DB::table('users')->where('id', $id)->value('username');
                                echo '<h5 class="card-title">Hello ' . $results . '</h5>'
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

          
                <div class="list-group">
               
                      
                            

                            <form action="{{ route('feed') }}" method="GET">
                            <button type="submit" class="list-group-item list-group-item-action active"><i class="fa-solid fa-house"></i><a> Home </a></button>
                            </form>
                            <form action=<?php echo "'profile/" . $results . "'";?> method="GET">
                                <button type="submit" class="list-group-item list-group-item-action"><i class="fa-solid fa-user"></i><a> Profile </a></button>
                            </form>
                            <form action="{{ route('settings') }}" method="GET">
                                <button type="submit" class="list-group-item list-group-item-action"><i class="fa-solid fa-gear"></i><a> Settings </a></button>
                            </form>
                            <form action="{{ route('logout') }}" method="GET">
                                <button type="submit"class="list-group-item list-group-item-action"><i class="fa-solid fa-right-from-bracket"></i><a> Logout </a></button>
                            </form>
</div>



               
                <br>


                <!-- MENU -->
                <!-- <div class="card" style="width: 6rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Home</li>
    <li class="list-group-item">Profile</li>
    <li class="list-group-item">Settings</li>
  </ul>
</div> -->





                <h4>Share whats on your mind!</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PostTweetModal">
                    Tweet!
                </button>
            </div>

        </div>
        <!-- MIDDLE-BAR-FEED -->

        <!-- DEMO RETWEET -->
        <div class="main-content">

            <div class="post-container">
                <div class="post-row">
                    <div class="user-profile">
                    <img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="">
                    <div style="display: inline-block;">

                  
                    <p style="margin-right: 10px;">Mark &bull; </span>
                            <span>May 3 2023, 2:30 pm</span>
                        </div>
                    </div>
                    <div class="menu-btn-stranger">
                        <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Report Tweet</a></li>
                            <li><a class="dropdown-item" href="#">Follow / Unfollow @...</a></li>
                            <li><a class="dropdown-item" href="#">Block @...</a></li>
                        </ul>
                    </div>
                </div>


                <p class="post-text">Ich retweete das.</p>

                <div class="retweet">
                    <div class="tweetbox-profile">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">
                        <div>
                            <p>Dagmar</p>
                            <span>May 3 2023, 2:30 pm</span>
                        </div>
                    </div>
                    <p class="retweet-text">Dies ist ein Beitrag, der retweetet wird.</p>
                </div>




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

                        $(document).ready(function()
                        {
                            $(".default_picture").on("error", function(){
                                $(this).attr('src', "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png");
                            });
                        });


                        
                </script>





                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button" class="btn btn-light yx-auto">Load more</button>
                </div>
            </div>





            <div class="post-container">
                <div class="post-row">
                    <div class="user-profile">
                        <img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="">
                        <div>
                            <p>Mark</p>
                            <span>May 3 2023, 2:30 pm</span>
                        </div>
                    </div>
                    <div class="menu-btn-own">
                        <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Delete-Tweet</a></li>
                            <li><a class="dropdown-item" href="#">Change Privacy</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>

                </div>

                <p class="post-text-just-retweet"><i class="fa-solid fa-retweet"></i> Mark Retweeted</p>

                <div class="retweet">
                    <div class="tweetbox-profile">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">
                        <div>
                            <p>Dagmar</p>
                            <span>May 3 2023, 2:30 pm</span>
                        </div>
                    </div>
                    <p class="retweet-text">Dies ist ein Beitrag, der retweetet wird.</p>
                </div>





                <div class="post-row">
                    <div class="activity-icons">
                        <!-- like Button-->
                        <div>
                            <div class="like-btn">
                                <button type="button" class="btn btn-dark"><i class="fa-regular fa-heart"></i>234</button>
                            </div>
                        </div>

                        <div>
                            <!-- comment button -->
                            <div class="btn-group dropend">
                                <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-comment"></i>22
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Show comments</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#CommentModal">Add
                                            comment</a></li>
                                </ul>
                            </div>
                        </div>


                        <div>
                            <!-- Retweet button -->
                            <div class="btn-group dropend">
                                <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-retweet"></i>45
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Just Retweet</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#QuoteModal">Quote</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <?php
            $users = DB::select('select * from tweets order by created_at desc');
            foreach ($users as $tweet) {
                $currentTimeString = time();
                $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
                $id = $tweet->user_id;
                $username = DB::table('users')->where('id', $id)->value('username');
                $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);

                // Tweet header
                echo '<div class="post-container">';
                echo '<div class="post-row">';
                echo '<div class="user-profile">';
                echo $userImgHtml;

               
                
               // echo '<p style="margin-right: 10px;">Mark &bull; </span>';
               // echo '<span>May 3 2023, 2:30 pm</span>';
               // echo '</div>';
                

                echo '<div style="display: inline-block;">';
                echo '<a style="margin-right: 3px;" href="profile/' . $username . '">' . $username . '</a>';
                echo '<a> &bull; </a>';
                echo '<span>' . $tweet->created_at . '</span>';
                echo '</div>';
                echo '</div>';

                echo '<button class="btn btn-dark" type="button" data-bs-toggle="dropdown"';
                echo 'aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>';
                echo '</div>';

                // Tweet content
                if (!is_null($tweet->tweet)) { // Validation fängt es schon ab, dennoch so besser
                    echo '<div class="tweet-content">';
                    echo $tweet->tweet . '<br>';
                }

                //Tweet image
                if (!is_null($tweet->img)){
                    $tweetImg = app('App\Http\Controllers\UserController')->getUserImgHtml($tweet->img);
                    // echo $tweetImg;
                    echo '<img class="img-fluid" src=data:image/png;base64,' . $tweet->img . '>';
                    // echo $tweet->img;
                }
                echo '</div>';

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
                    echo '<button type="submit" class="btn btn-danger"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                } else {
                    echo '<button type="submit" class="btn btn-dark"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
                }
                echo '<input type="hidden" name="tweet_id" value="' . $tweet->tweet_id . '">';
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
                echo '<button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"';
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
                echo '<input type="text" name="comment" id="comment" class="form-control" placeholder="Add a comment" aria-label="Add a comment" aria-describedby="button-addon2">';
                echo '<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>';
                echo '</div>';
                echo '<input type="hidden" name="tweet_id" value="' . $tweet->tweet_id . '">';
                echo '</form>';
                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>

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
        <form action="{{ route('postTweet')}}" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="PostTweetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">


                            <div class="write-post-container">
                                <div class="user-profile">
                                    <?php 
                                        $id = Auth::id();
                                        $userImg = DB::table('users')->where('id', $id)->value('profile_img');
                                        $userImgHtml = app('App\Http\Controllers\UserController')->getUserImgHtml($userImg);
                                        echo $userImgHtml;
                                    ?>
                                    <!--<img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt=""> -->
                                    <div>
                                        <?php
                                        echo '<p>' . $results . '</p>';
                                        ?>
                                        <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                                        
                                        {{-- Design! Fehlermeldungen, andere Platzierung oder Modal bleibt offen ->wie? --}}
                                        @section('content')
                                        @if (count($errors) > 0) 
                                            <div class='row'>
                                                <div class="col">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{$error}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    
                                    </div>
                                </div>

                                <div class="post-input-container">
                                    <textarea rows="3" placeholder="Whats on your mind?" name="tweet" id="tweet" value="{{Request::old('tweet')}}"></textarea>
                                    <div id="pictureBox"></div>
                                    <div class="add-post-links">
                                        <a href="#"><i class="fa-solid fa-camera fa-2xl"></i> 
                                        <!-- <button type="button" id="pictureBtn" class="btn btn-primary">Choose Picture</button></a> -->
                                        <div class="form-group">
                                            <input type="file" name="img" id="img" value="{{Request::old('img')}}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Post </button>
                            <input type="hidden" name="_token" value="{{  Session::token() }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- Comment Modal -->
        <div class="modal fade" id="CommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="write-post-container">
                            <div class="user-profile">
                                <img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="">
                                <div>
                                    <?php
                                    echo '<p>' . $results . '</p>';
                                    ?>
                                    <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                                </div>
                            </div>

                            <div class="post-input-container">
                                <textarea rows="3" placeholder="Add a comment to this tweet"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Comment</button>
                    </div>
                </div>
            </div>
        </div>




        <!-- Quote Retweet Modal -->
        <div class="modal fade" id="QuoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="write-post-container">
                            <div class="user-profile">
                                <img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="">
                                <div>
                                    <?php
                                    echo '<p>' . $results . '</p>';
                                    ?>
                                    <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                                </div>
                            </div>

                            <div class="post-input-container">
                                <textarea rows="3" placeholder="Add a comment to your quote"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Retweet</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div>
    <script>
        document.getElementById('pictureBtn').addEventListener('click', function() {
            var input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = function(event) {
                var image = document.createElement('img');
                image.src = URL.createObjectURL(event.target.files[0]);
                document.getElementById('pictureBox').appendChild(image);
            };
            input.click();
        });
    </script>
    <script>
        $(".PostTweetModal").on("hidden.bs.modal", function() {
            $(".modal-body").html("");
        });
    </script>
    <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
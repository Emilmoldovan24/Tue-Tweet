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
    background: lightgrey;
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
    +
  }

  .container {
    display: flex;
    justify-content: space-between;
    padding: 13px 5%;
  }

  .left-sidebar {
    background: lightgrey;
    flex-basis: 25%;
    position: sticky;
    top: 70px;
    align-self: flex-start;
  }

  .right-sidebar {
    background: lightgrey;
    flex-basis: 25%;
    position: sticky;
    top: 70px;
    align-self: flex-start;
  }

  .main-content {
    flex-basis: 47%;
    align-self: flex-start;
    background: lightgrey;
  }

  .write-post-container {
    width: 100%;
    background: white;
    border-radius: 6px;
    padding: 20px;
    columns: #626262;
  }

  .user-profile {
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

  .post-text {
    color: black;
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
</style>

<body>
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand">Navbar</a>
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
              <img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" class="img-fluid" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <?php
                $id = Auth::id();
                $results = DB::table('users')->where('id', $id)->value('username');
                echo '<h5 class="card-title">Hello ' . $results . '</h5>'
                ?>
                <!-- Ändern <p class="card-text">@MarkStark</p> -->
              </div>
            </div>
          </div>
        </div>

        <form action="{{ route('profile') }}" method="GET">
          <button type="submit" class="btn btn-light"> Profile </button>
        </form>
        <br>
        <form action="{{ route('logout') }}" method="GET">
          <button type="submit" class="btn btn-light"> Logout </button>
        </form>
        <br>
        <form action="{{ route('dashboard') }}" method="GET">
          <button type="submit" class="btn btn-light"> Settings </button>
        </form>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tweet!
        </button>
      </div>

    </div>
    <!-- MIDDLE-BAR-FEED -->


    <div class="main-content">


      <script> 

        // toggles the display of the comments when the user clicks on the comments button
        function displayComments(tweet_id) {
          let element = document.getElementById("comments"+tweet_id);
          element.removeAttribute("hidden");

          if (element.style.display == "none" || element.style.display == "") {
            // show
            element.style.display="block";
          } else {
            // hide
            element.style.display="none";
          }
        }


        function my_displayComments(tweet_id) {
          let element = document.getElementById("comments"+tweet_id);
          alert(element);
            element.style.display="none";
            alert("I will hide the comments now");
          }

      </script>

      <?php
      $tweets = DB::select('select * from tweets order by created_at desc  ');
      foreach ($tweets as $tweet) {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $id = $tweet->user_id;
        $username = DB::table('users')->where('id', $id)->value('username');
        echo '<div class="post-container">';
        echo '<div class="user-profile">';
        echo '<img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="">';
        echo '<div>';
        echo '<p>' . $username . '</p>';
        echo '<span>' . $tweet->created_at . '</span>';
        echo '</div>';
        echo ' </div>';



        $users = DB::select('select * from tweets order by created_at desc');


        echo $tweet->tweet . '<br>';


        echo '<br>';

        // Activity Icons
        echo '<div class="post-row">';
        echo '<div clss="align-items-right">';
        echo '<div class="activity-icons">';


        // Count Likes Comments and Retweets
        $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
        $numComments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
        $retweets = DB::table('retweets')->where('tweet_id', $tweet->tweet_id)->count();

        // Like Button
        echo '<!-- like Button-->';
        echo '<div>';
        echo '<form action=like method="POST">';
        echo csrf_field();
        echo '<div class="like-btn">';

        // like button turns red if user has liked the tweet
        if (DB::table('likes')->where('tweet_id', $tweet->tweet_id)->where('user_id', Auth::id())->exists()) {
          echo '<button type="submit" class="btn btn-danger"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
        }
        else{
          echo '<button type="submit" class="btn btn-secondary"><i class="fa-regular fa-heart"></i>' . $likes . '</button>';
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
        echo '<button onclick="displayComments('.$tweet->tweet_id.')" class="btn btn-secondary"';
        echo 'aria-expanded="false">';
        echo '<i class="fa-regular fa-comment"></i>' . $numComments . '';
        echo '</button>';
        echo '</div>';
        echo '</div>';

        // Retweet Button
        echo '<div><!-- Retweet button -->';
        echo '<div class="btn-group dropend">';
        echo '<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"';
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
        echo '</div>';

        # TODO display comments if button is clicked
        echo '<div class="comments" id="comments' . $tweet->tweet_id . '" hidden>';
        echo '<br>';
        echo '<br>';
        
        echo '<div class="comment-container">';

          //list comments
        $comments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->get();
        foreach ($comments as $comment) {
          $commentUsername = DB::table('users')->where('id', $comment->user_id)->value('username');
          echo '<div class="comment">';
          echo '<div class="user-profile">';
          # TODO add user profile picture
          echo '<img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="">';
          echo '<div>';
          echo '<p>' . $commentUsername . '</p>';
          echo '<span>' . $comment->created_at . '</span>';
          echo '</div>';
          echo '</div>';
          echo '<p>' . $comment->comment . '</p>';
          echo '</div>';
        }

          echo '</div>';

          
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
      }

      ?>

      <div class="d-grid gap-2 col-6 mx-auto">
        <button type="button" class="btn btn-light yx-auto">Load more</button>
      </div>
    </div>


    <!-- RIGHT SIDE-BAR -->


    <div class="right-sidebar">



      <h1>Notifications</h1>
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


    <!-- Modal -->
    <form action="{{ route('postTweet')}}" method="POST">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">


              <div class="write-post-container">
                <div class="user-profile">
                  <img src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="">
                  <div>
                    <p>Mark</p>
                    <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                    {{-- Design! Fehlermeldungen --}}
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
                  <!-- <input type="text" name="tweet" id="tweet" value="{{Request::old('tweet')}}"> -->
                  <div class="add-post-links">
                    <a href="#"><i class="fa-solid fa-camera fa-2xl"></i> Post Image / Video</a>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" id="inputGroupFile01" accept="image/jpeg, image/png, image/gif">
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

  </div>
  </div>

  <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
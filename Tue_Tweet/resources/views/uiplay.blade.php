<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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
              <img
                src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60"
                class="img-fluid" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Hello, Mark!</h5>
                <p class="card-text">@MarkStark</p>
              </div>
            </div>
          </div>
        </div>

        <!-- MENU -->
        <div class="card" style="width: 6rem;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Home</li>
            <li class="list-group-item">Profile</li>
            <li class="list-group-item">Settings</li>
          </ul>
        </div>
        <h4>Share whats on your mind!</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tweet!
        </button>
      </div>

    </div>
    <!-- MIDDLE-BAR-FEED -->


    <div class="main-content">






      <div class="post-container">
        <div class="post-row">
          <div class="user-profile">
            <img
              src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60"
              alt="">
            <div>
              <p>Mark</p>
              <span>May 3 2023, 2:30 pm</span>
            </div>
          </div>
          <a href=""><i class="fa-solid fa-ellipsis-vertical"></i></a>
        </div>

        <p class="post-text">Ich habe kein Bock mehr, diese Seite zu coden.</p>
        <img
          src="https://images.unsplash.com/photo-1576185842455-e756e317bd24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZGVzcGVyYXRlfGVufDB8fDB8fHww&auto=format&fit=crop&w=1000&q=60"
          class="post-img">

        <div class="post-row">
          <div class="activity-icons">
            <!-- like Button-->
            <div>
              <div class="like-btn">
                <button type="button" class="btn btn-secondary"><i class="fa-regular fa-heart"></i>234</button>
              </div>
            </div>

            <div><!-- comment button -->
              <div class="btn-group dropend">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa-regular fa-comment"></i>22
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Show comments</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#CommentModal">Add
                      comment</a></li>
                </ul>
              </div>
            </div>


            <div><!-- Retweet button -->
              <div class="btn-group dropend">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                  aria-expanded="false">
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

      <div class="d-grid gap-2 col-6 mx-auto">
        <button type="button" class="btn btn-light yx-auto">Load more</button>
      </div>


    </div>


    <!-- RIGHT SIDE-BAR -->


    <div class="right-sidebar">



      <h1>Notifications</h1>
      <div class="card mb-3" style="width: 12rem;">
        <img class="card-img-top"
          src="https://images.unsplash.com/photo-1556474835-b0f3ac40d4d1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
          alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Follow Request</h5>
          <p class="card-text">Max Mustermann wants to follow you!</p>
          <a href="#" class="btn btn-primary">Accept</a>
          <a href="#" class="btn btn-secondary">Decline</a>
        </div>
      </div>
      <div class="card mb-3" style="width: 12rem; margin-top: 20px;">
        <img class="card-img-top"
          src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
          alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Comment-Response</h5>
          <p class="card-text">Lea responded to your comment. Go see it!</p>
          <a href="#" class="btn btn-primary">Go to Post</a>
        </div>
      </div>

    </div>



    <!-- Comment Modal -->
    <div class="modal fade" id="CommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">

            <div class="write-post-container">
              <div class="user-profile">
                <img
                  src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60"
                  alt="">
                <div>
                  <p>Mark</p>
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
                <img
                  src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60"
                  alt="">
                <div>
                  <p>Mark</p>
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



    <!-- Post-Tweet-Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">

            <div class="write-post-container">
              <div class="user-profile">
                <img
                  src="https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3V5fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60"
                  alt="">
                <div>
                  <p>Mark</p>
                  <small>Public<i class="fa-sharp fa-solid fa-caret-down"></i></small>
                </div>
              </div>

              <div class="post-input-container">
                <textarea rows="3" placeholder="Whats on your mind?"></textarea>
                <div class="add-post-links">
                  <a href="#"><i class="fa-solid fa-camera fa-2xl"></i> Post Image / Video</a>
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile01"
                      accept="image/jpeg, image/png, image/gif">
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Post</button>
          </div>
        </div>
      </div>
    </div>


  </div>
  </div>

  <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>
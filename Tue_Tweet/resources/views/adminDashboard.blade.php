<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand">Tue-Tweet - Admin Dashboard</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <style>
    body {
        background-color: #DCDCDC;
        /* background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(209, 123, 149, 1) 0%, rgba(63, 106, 144, 1) 65%); */

    }

    .main-content {
        margin: 20px 0;
        flex-basis: 25%;
        position: sticky;
        top: 70px;
        align-self: flex-start;
        width: 50%;
    }
    </style>


    <div class="container">
        <!--Main content-->

        <div class="main-content">
            <!-- Current admin -->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <?php
                            $admin_id = Auth::id();
                            $admin_name = DB::table('admins')->where('id', $admin_id)->value('adminname');
                            ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Current: {{$admin_name}}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Buttons -->
            <div class="list-group">
                <form action="{{ route('adminCreate') }}" method="GET">
                    <button type="submit" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-right-from-bracket"></i><a> Manage Admins </a></button>
                </form>
                <form action="{{ route('adminFeed') }}" method="GET">
                    <button type="submit" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-right-from-bracket"></i><a> Manage Tweets </a></button>
                </form>
                <form action="{{ route('adminUsers') }}" method="GET">
                    <button type="submit" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-right-from-bracket"></i><a> Manage Users </a></button>
                </form>
                <form action="{{ route('adminLogout') }}" method="GET">
                    <button type="submit" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-right-from-bracket"></i><a> Logout </a></button>
                </form>
            </div>
            <br>
        </div>


        <!-- MIDDLE-BAR-FEED -->

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





</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<style>
body {
        background-color:  #E7E7E7;
        min-width: 800px;
}
.container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.main-content {
    margin: 20px 0;
    flex-basis: 50%;       
    position: sticky;
    top: 70px;
    align-self: flex-start;
    width: 100%;
}
.navbar {
    background-color: #a71b28;
    color: red;
}
.tuetweetlogo {
    width: 180px;
    border-radius: 9px;
    margin-right: 10px;
}
.adminDash {
    color: white;
    font-size: 2,5vw; 
}
.list-group .list-group-item.list-group-item-action {
    background-color: #a71b28;
    color: white;
    border-radius: 9px;
    margin: 6px;
}

@media (max-width: 368px) {
    .adminDash {
   display: block;
    
    
  font-size: 25px; /* Maximale Schriftgröße */
  
  }
}

    </style>



<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand"> <img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}" alt="logo">
         <span class="adminDash"> Admin Dashboard </span> 
        </a>
            
        </div>
    </nav>



    <div class="container">
        <!--Main content-->

        <div class="main-content">
            <!-- Current admin -->
            <div class="card" style="max-width: 820px; background-color: #a71b28; color: white;">
             
                    
                        <?php
                            $admin_id = Auth::id();
                            $admin_name = DB::table('admins')->where('id', $admin_id)->value('adminname');
                            $admin_super = DB::table('admins')->where('super_admin', $admin_id)->value('super_admin');
                            ?>
                 
                    
                        <div class="card-body text-center">
                            <h5 class="card-title text-center">Logged-In: {{$admin_name}}</h5>
                        </div>
                    
         
            </div>

            <!-- Menu Buttons -->
            <div class="list-group text-center">
                <?php
                if($admin_super == 1){
                    ?>
                        <form action="{{ route('adminCreate') }}" method="GET">
                            <button type="submit" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-right-from-bracket"></i><a> Manage Admins </a></button>
                </form>
                    <?php
                }
                ?>
                
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
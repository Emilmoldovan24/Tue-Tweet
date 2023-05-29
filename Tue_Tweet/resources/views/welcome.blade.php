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
.logo {
    font-family: 'Inter', sans-serif;
    color: white;
    font-size: 100px;
    margin: 6px 7%;
}

.home-header {
    /* background: rgb(222,218,218);
        background: linear-gradient(180deg, rgba(222,218,218,1) 0%, rgba(153,0,0,1) 100%);  */
    background: rgb(2, 0, 36);
    background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(209, 123, 149, 1) 0%, rgba(63, 106, 144, 1) 65%);

}

.home-header .row {
    padding-top: 50px;
    padding-bottom: 20px;
}

.home-header .promo-text-box {
    margin-top: 15%
}

.home-header .promo-text-box h1 {
    margin-bottom: 25px;
}

.home-header .btn-light {
    font-size: 20px;
    margin: 20px;
    color: black;
    letter-spacing: 1px;
}

.home-header .lead-form {
    width: 350px;
    margin: 10px auto;
    border-radius: 3px;
}

.home-header .lead-form .title-box {
    padding-top: 30px;
    border-bottom-left-radius: 200px 50px;
    border-bottom-right-radius: 200px 50px;
}

.home-header .header2 {
    padding-top: 30px;
    text-align: center;
}

.row.row-cols-1.row-cols-md-3.g-4 {
    align-items: center;
    justify-content: center;
    text-align: center;
}

.card {
    margin: 0 auto;
    width: 18rem;
}

body {
    color: white;
}
</style>

<body>
    <section class="home-header">
        <h1 class="logo">Tue-Tweet</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="promo-text-box">
                        <h1>Sign up and join the community!</h1>
                        <p>On Tue-Tweet, you find all your friends from Uni Tuebingen. </p>
                        <!-- Button trigger modal -->

                        <form action="{{ route('signup') }}" method="GET">
                            <button type="submit" class="btn btn-light"> Sign up now! </button>
                        </form>

                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="lead-form">
                        <div class="title-box">
                            <h3>Log-in to your Account</h3>
                        </div>


                        <!-- SIGN IN !-->
                        <form action="{{ route('signin')}}" method="POST">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        name="email" id="email" aria-describedby="emailHelp"> <!-- emailhelp? !-->
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="user_password"> Your Password </label>
                                    <input class="form-control @error('user_password') is-invalid @enderror"
                                        type="password" name="user_password" id="user_password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light"> Submit </button>
                            <input type="hidden" name="_token" value="{{  Session::token() }}">
                        </form>



                    </div>
                </div>
                <h2 class="header2">Check out the latest tweets!</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Z3V5fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Mark Bauer</h5>
                                <p class="card-text">Das Mensa-Essen heute war der Knaller. Vegane Currywurst beste!</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://images.unsplash.com/photo-1557862921-37829c790f19?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2371&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Rajesh Kudrapali</h5>
                                <p class="card-text">Hackathon tomorrow in "The Morgenstelle". I'm excited!</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YXZlcmFnZSUyMGdpcmx8ZW58MHx8MHx8&auto=format&fit=crop&w=700&q=60"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Lea Schmidt</h5>
                                <p class="card-text">Finally, my Australia Work&Travel year starts tomorrow!</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--Admin Button-->
        <div class="col-md-4 col-md-offset-4">
            <form action="{{ route('adminLogin') }}" method="GET">
                <button type="submit" class="btn btn-light"> Admin? </button>
            </form>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    .submit-btn .btn.btn-light {
        background-color: white;
        color: black;
        border-color: #493737;
    }

    .forgot-pass .btn.btn-light {
        font-size: 15px;
        background-color: white;
        color: black;
    }

    .tuetweetlogo {
        margin-top: 20px;
        width: 300px;

    }

    .home-header {
        background: white;


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

        background-color: #a71b28;
        color: white;
        letter-spacing: 1px;
    }

    .home-header .lead-form {
        width: 350px;
        margin: 10px auto;
        border: 2px solid;
        border-radius: 9px;

        padding: 30px 20px;
        background-color: #a71b28;
        color: white;
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
        width: 70%;
    }

    body {
        color: black;
        min-width: 500px;
        
    }

    .signup-btn .btn.btn-light {
        margin: 0 auto;
        margin-top: 20px;

    }
</style>

<body>




        <section class="home-header">

            <div class="container">
                <img class="tuetweetlogo" src="{{ asset('images/tuelogo.png') }}" alt="logo">
                <div class="row">
                    <div class="col-md-6">
                        <div class="promo-text-box">
                        <h1 class="display-2">Sign up and join the community!</h1>
                            <p class="lead"><strong>On Tue-Tweet, you find all your friends from Uni Tuebingen. </strong></p>
                            <!-- Button trigger modal -->

                            <form action="{{ route('signup') }}" method="GET">
                                <div class="signup-btn">
                                <button type="submit" class="btn btn-light btn-lg"> Sign up now! </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="lead-form">
                            <div class="title-box mb-4">
                                <h3>Log-in to your Account</h3>
                            </div>


                            <!-- SIGN IN !-->
                            <form action="{{ route('signin') }}" method="POST">
                            <div class="mb-3 mt-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        {{-- Design! Fehlermeldungen --}}
    @section('content')
        @if (count($errors) > 0)
           
                <div class="text-left">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
           
            </div>
        @endif

                                       
                                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                                            name="email" id="email" value="{{ Request::old('email') }}"
                                            aria-describedby="emailHelp"> <!-- emailhelp? !-->

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: 8px;" for="user_password"> Your Password </label>
                                        <input class="form-control @error('user_password') is-invalid @enderror"
                                            type="password" name="user_password" id="user_password">
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" class="btn btn-light"> Submit </button>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                            <div class="forgot-pass">
                                <form action="{{ route('passChangeRequest') }}" method="GET">
                                    <button type="submit" class="btn btn-light"> Forgot your Password? </button>
                                </form>
                            </div>


                        </div>
                    </div>
                    <h1 class="display-4 text-center mt-5">Check out the latest tweets!</h1>
                    <div class="row row-cols-1 row-cols-md-3 text-center">
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

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #E7E7E7;
    }

    .container {
        justify-content: space-between;
    }

    .navbar.navbar-expand-lg {
        display: flex;
        margin: 0 auto;
        align-items: center;
        text-align: center;
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

    .list-group .list-group-item.list-group-item-action {
        background-color: #a71b28;
        color: white;
        border-radius: 9px;
        margin: 3px;
    }

    .list-group {
        margin-top: 60px;
    }

    .col-8 {
        align-items: center;
    }

    .btn-light {
        background-color: #a71b28;
        color: white;
        letter-spacing: 1px;
    }

    .mb-0 {
        font-weight: bold;
    }
</style>

<body>

    <?php
    $user_id = Auth::id();
    $user_name = DB::table('users')
        ->where('id', $user_id)
        ->value('username');
    ?>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand">
            <img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}" alt="logo">
        </a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-3 me-auto">
                <div class="list-group">
                    <form action="{{ route('feed') }}" method="GET">
                        <button type="submit" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-house"></i><a> Home </a></button>
                    </form>
                    <form action=<?php echo "'/" . $user_name . "'"; ?> method="GET">
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
                <br>
            </div>
            <div class="col-8">
                <h3>Settings</h3>
                <hr>
                <?php
                $userImg = DB::table('users')
                    ->where('id', Auth::id())
                    ->value('profile_img');
                $profileImg = app('App\Http\Controllers\UserController')->getUserImg($userImg);
                
                ?>
                {{-- Design! Fehlermeldungen --}}
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
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Image upload -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Profile Picture</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <img src="{{ $profileImg }}" height="100px" width="100px">
                                        <form action="/postImage" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input class="form-control @error('img') is-invalid @enderror"
                                                    type="file" name="img" id="img"
                                                    value="{{ Request::old('img') }}">
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-light"> Change </button>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                <!--Profile Bio-->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Profile Bio</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <form action="/postBio" method="POST" enctype="multipart/form-data">
                                            <?php
                                            $user_bio = DB::table('users')
                                                ->where('id', Auth::id())
                                                ->value('profile_bio');
                                            ?>
                                            <input type="text" class="form-control @error('bio') is-invalid @enderror"
                                                type="text" name="bio" placeholder="{{ $user_bio }}"
                                                id="bio" value="{{ Request::old('profile_bio') }}">
                                            <br>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-light"> Change </button>
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>

                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Username</p>
                                </div>
                                <div class="col-sm-9">
                                    <form action="/postUsername" method="POST" enctype="multipart/form-data">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            type="text" name="username" placeholder="{{ $user_name }}" id="username"
                                            value="{{ Request::old('username') }}">
                                        <br>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-light"> Change </button>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <form action="/postEmail" method="POST" enctype="multipart/form-data">
                                        <?php
                                        $user_mail = DB::table('users')
                                            ->where('id', Auth::id())
                                            ->value('email');
                                        ?>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            type="text" name="email" placeholder="{{ $user_mail }}"
                                            id="email" value="{{ Request::old('email') }}">
                                        <div class="input-group-append">
                                            <br>
                                            <button type="submit" class="btn btn-light"> Change </button>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Old Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <form action="/postPassword" method="POST" enctype="multipart/form-data">
                                        <input type="password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            name="old_password" id="old_password"
                                            value="{{ Request::old('old_password') }}">
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        <p class="mb-0">New Password</p>
                                        <input type="password"
                                            class="form-control @error('user_password') is-invalid @enderror"
                                            name="user_password" id="user_password"
                                            value="{{ Request::old('user_password') }}">
                                        @error('user_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        <button type="submit" class="btn btn-light">Change</button>
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    </form>
                                </div>
                            </div>


                            <hr>
                            <div class="gap-3 d-md-flex justify-content-md-end text-center">
                                <form action="/safeFile" method="GET">
                                    <button type="submit" class="btn btn-light"> Save Informations </button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/5be3771b2c.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    </body>

    </html>

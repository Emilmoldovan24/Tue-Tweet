<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
.logo {
    font-family: 'Inter', sans-serif;
    color: black;
    font-size: 100px;
    margin: 6px 7%;
}

.home-header {
    background: lightgrey;
}

.home-header .row {
    padding-top: 50px;
    padding-bottom: 20px;
}

.home-header .admin-box {
    padding: 30px;
    background: white;
}

.home-header .admin-box h1 {
    margin-bottom: 25px;
}

.home-header .btn-primary {
    font-size: 20px;
    margin: 20px;
    color: white;
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
</style>

<body>


    <section class="home-header">
        <h1 class="logo">Tue-Tweet</h1>

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

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="admin-box">
                        <h1>Manage admin users</h1>
                        
                        <?php
                       
                        $admins = DB::select('select * from admins ');
                        foreach($admins as $admin) {
                            echo "Name:  $admin->adminname".
                            '<br>';
                            echo "ID:   $admin->id".
                            '<br>';
                            echo "Created at: $admin->created_at".
                            '<br>';
                            ?>
                            <button class="delete-btn"><a href="{{ route('admin.delete', $admin->id) }}">Delete admin</a></button> <?php
                            echo "======================================================".
                            '<br>';
                        }
                        ?>
                    </div>
                    <!-- Button trigger modal -->
                    <form action="{{ route('adminFeed') }}" method="GET">
                            <button type="submit" class="btn btn-light"> Back </button>
                        </form>
                </div>
                <div class="col-md-6 text-center">
                    <div class="lead-form">
                        <div class="title-box">
                            <h3>Create new admin user</h3>
                        </div>
                        <form action='{{ route("adminCreate") }}' method="POST">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        name="email" id="email" aria-describedby="emailHelp"
                                        value=" {{ Request::old('email') }}">

                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="username"> Admin Name </label>
                                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                                        name="adminname" id="username" value=" {{ Request::old('username') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="user_password"> Password </label>
                                    <input class="form-control @error('user_password') is-invalid @enderror"
                                        type="password" name="user_password" id="user_password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light"> Submit </button>
                            <input type="hidden" name="_token" value="{{  Session::token() }}">
                        </form>

                        <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                            crossorigin="anonymous"></script>
</body>

</html>
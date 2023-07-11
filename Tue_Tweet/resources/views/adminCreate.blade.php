<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Admins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<style>
body {
    background-color: #E7E7E7;
    /* background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(209, 123, 149, 1) 0%, rgba(63, 106, 144, 1) 65%); */
}

.container {
    margin-top: 32px;
    display: flex;
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
    font-size: 2,5vw; /* Standard-Schriftgröße */
  max-font-size: 30px; /* Maximale Schriftgröße */
  min-font-size: 25px; /* Minimale Schriftgröße */
}
.back.btn.btn-light{
   background-color: #a71b28;
    color: white;
    border-radius: 9px;
    margin-right: 20px;
    margin-bottom: 15px;
    
}
.lead-form {
   
    margin: 10px auto;
    border: 2px solid;
    border-radius: 9px;
 
    padding: 30px 20px;
    background-color: #a71b28;
    /* background-color: #bf1707; */
    color: white;
}
@media (max-width: 368px) {
    .adminDash {
   display: block;
    
    
  font-size: 25px; /* Maximale Schriftgröße */
  
  }
}
.left-side-content {
    margin-right: 32px;
    width: 30%;
}

.right-side-content {
    align: right;
    margin-left: 100px;
    width: 60%;
}

.main-content {
    width: 60%;
    border-width: 5px;

}

.menu {}

.menu a {
    text-decoration: none;
    ´ color: black;

}

.user {
    width: 100%;
    background-color: white;
    border-radius: 12px;
    padding: 20px;
    color: black;
    margin: 20px 0;
    border: 3px solid #a71b28;
}
.logged-in{
   
}
.log-text{
    margin-left: 16px;
}
</style>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand"> <img class="tuetweetlogo" src="{{ asset('images/tuetweetwhite.png') }}" alt="logo">
         <span class="adminDash">Manage Admins </span> 
        </a>
            
        </div>
    </nav>


    <div class="container">
    <div class="col-3">
        <div class="left-side-content">
             <!-- Current admin -->
            <div class="card mb-3" style="max-width: 540px; background-color: #a71b28; color: white;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <?php
                            $admin_id = Auth::id();
                            $admin_name = DB::table('admins')->where('id', $admin_id)->value('adminname');
                        ?>
                    </div>
                    <div class="logged-in">
                        <div class="log-text">
                            Logged in: {{$admin_name}}
                        </div>
                    </div>
                </div>
            </div>
           

            <div class="list-group">
                <form action="{{ route('adminDash') }}" method="GET">
                <button type="submit" class="back btn btn-light"> Go back </button>
                </form>
            </div>
        </div>
        </div>
     
        <div class="main-content">

            <div class="menu">
            <button type="submit" class="back btn btn-light" onclick="window.location.href='adminCreate?'">All Admins</button>
            <button type="submit" class="back btn btn-light" onclick="window.location.href='adminCreate?page=normalAdmins'">Normal Admins</button>
            <button type="submit" class="back btn btn-light" onclick="window.location.href='adminCreate?page=superAdmins'">Super Admins</button>  
            </div>

            <?php 
                $admins = DB::table('admins')->where('super_admin', 0)->get(); 
                if(isset($_GET['page'])){
                    if($_GET['page'] == 'normalAdmins'){ 
                        $admins = DB::table('admins')->where('super_admin', 0)->get(); 
                        foreach ($admins as $admin) {
                            
                                ?>
                                <div class="user">
                                    <?php
                                        echo "Username: $admin->adminname".
                                            '<br>';
                                        echo "ID: $admin->id".
                                            '<br>';
                                        echo "E-mail: $admin->email".
                                            '<br>';
                                        echo "Created at: $admin->created_at".
                                            '<br>'; 
                                        echo "Super admin: False".
                                            '<br>';                 
                                    ?>
                                    <button><a href="{{ route('admin.delete', $admin->id) }}">Delete  Admin</a></button> <?php
                                    ?>
                                
                                </div>
                                <?php
                        
                        }
                    } else if($_GET['page'] == 'superAdmins'){ 
                        $admins = DB::table('admins')->where('super_admin', 1)->get(); 
                        foreach ($admins as $admin) {
                            
                                ?>
                                <div class="user">
                                    <?php
                                        echo "Username: $admin->adminname".
                                            '<br>';
                                        echo "ID: $admin->id".
                                            '<br>';
                                        echo "E-mail: $admin->email".
                                            '<br>';
                                        echo "Created at: $admin->created_at".
                                            '<br>'; 
                                        echo "Super admin: True".
                                            '<br>';                 
                                    ?>                              
                                </div>
                                <?php
                        
                        }
                    }
                }else{
                    $admins = DB::table('admins')->get(); 
                    foreach ($admins as $admin) {
                        if($admin->super_admin == 0){
                            $super = 'False';
                        }else{
                            $super = 'True';
                        }
                            ?>
                            <div class="user">
                                <?php
                                    echo "Username: $admin->adminname".
                                        '<br>';
                                    echo "ID: $admin->id".
                                        '<br>';
                                    echo "E-mail: $admin->email".
                                        '<br>';
                                    echo "Created at: $admin->created_at".
                                        '<br>'; 
                                    echo "Super admin: $super".
                                        '<br>';                 
                                ?>                              
                            </div>
                            <?php
                    
                    }
                }
                    ?>

        </div>
          
            
        <div class="right-side-content"> 
        <div class="col-md-6 text-center">
                <div class="lead-form">
                    <div class="title-box">
                        <h3>Create new Admin</h3>
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
                                <input class="form-control @error('user_password') is-invalid @enderror" type="password"
                                    name="user_password" id="user_password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light"> Submit </button>
                        <input type="hidden" name="_token" value="{{  Session::token() }}">
                    </form>
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
    </div>
            </div>
           
</body>

</html>
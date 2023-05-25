@extends('layouts.master')

@section('title')
    Welcome!
@endsection

<div>

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


    <!--  SignUp   -->
    <div class ="row">
        <div class="col-md-4 col-md-offset-4">
            <h3> Sign Up </h3>
            <form action="{{ route('signup')}}" method="POST">
                <div class="form-group">
                    <label for="email"> Your E-Mail </label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="username"> Your User Name </label>
                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="user_password"> Your Password </label>
                    <input class="form-control @error('user_password') is-invalid @enderror" type="password" name="user_password" id="user_password">
                </div>
                <button type="submit" class="btn btn-primary"> Submit </button>
                <input type="hidden" name="_token" value="{{  Session::token() }}">
            </form>
        </div>



        <!--  SignIn   -->
        <div class="col-md-6">
            <h3> Sign In </h3>
            <form action="{{ route('signin')}}" method="POST">
                <div class="form-group">
                    <label for="email"> Your E-Mail </label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="user_password"> Your Password </label>
                    <input class="form-control @error('user_password') is-invalid @enderror" type="password" name="user_password" id="user_password"> 
                </div>
                <button type="submit" class="btn btn-primary"> Submit </button>
                <input type="hidden" name="_token" value="{{  Session::token() }}">
            </form>
        </div>


        <!--Admin Button-->
        <div class="col-md-4 col-md-offset-4">
        <form action="{{ route('adminLogin') }}" method="GET">
            <button type="submit" class="btn btn-primary"> Admin? </button>
        </form>
        </div>

        
    </div>
@endsection

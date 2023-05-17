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
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="first_name"> Your User Name </label>
                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}">
                </div>
                <div class="form-group">
                    <label for="password"> Your Password </label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{Request::old('password')}}">
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
                    <label for="Iemail"> Your E-Mail </label>
                    <input class="form-control @error('Iemail') is-invalid @enderror" type="text" name="email" id="Iemail" value="{{Request::old('Iemail')}}">
                </div>
                <div class="form-group">
                    <label for="Ipassword"> Your Password </label>
                    <input class="form-control @error('Ipassword') is-invalid @enderror" type="password" name="password" id="Ipassword"> 
                </div>
                <button type="submit" class="btn btn-primary"> Submit </button>
                <input type="hidden" name="_token" value="{{  Session::token() }}">
            </form>
        </div>
    </div>
@endsection

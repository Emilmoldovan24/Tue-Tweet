@extends('layouts.master')
@section('title')
My Profile settings
@endsection


<div>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Page title -->
				<div class="my-5">
					<h3>Settings</h3>
					<hr>
				</div>
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
				<!-- upload profile picture-->
				<div class="col-xxl-4">
					<div class="bg-secondary-soft px-4 py-5 rounded">
						<div class="row g-3">
							<h4 class="mb-4 mt-0"> Upload your profile photo </h4>

							<?php

							$userImg = DB::table('users')->where('id', Auth::id())->value('profile_img');
							$profileImg = app('App\Http\Controllers\UserController')->getUserImg($userImg);

							?>



							<div class="text-center">

								<!-- Image upload -->

								<div class="col-md-4 col-md-offset-4">
									<img src="{{$profileImg}}" height="100px" width="100px">
									<form action="/postImage" method="POST" enctype="multipart/form-data">

										<div class="form-group">
											<label for="img"> New Profile Picture </label>
											<input class="form-control @error('img') is-invalid @enderror" type="file" name="img" id="img" value="{{Request::old('img')}}">
										</div>

										<button type="submit" class="btn btn-primary"> Upload </button>
										<input type="hidden" name="_token" value="{{  Session::token() }}">
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!-- upload bio-->

				<div class="col-xxl-4">
					<div class="bg-secondary-soft px-4 py-5 rounded">
						<div class="row g-3">
							<h4 class="mb-4 mt-0">Upload your profile Biography</h4>
							<div class="text-center">
								<!-- Profil Bio -->
								<div class="col-md-4 col-md-offset-4">
									<form action="/postBio" method="POST" enctype="multipart/form-data">


										<?php
										$user_bio = DB::table('users')->where('id', Auth::id())->value('profile_bio');
										?>

										<div class="input-group mb-3">
											<input type="text" class="form-control @error('bio') is-invalid @enderror" type="text" name="bio" placeholder="{{ $user_bio }}" id="bio" value="{{Request::old('profile_bio')}}">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="submit">Upload</button>
												<input type="hidden" name="_token" value="{{  Session::token() }}">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- upload username-->

				<div class="col-xxl-4">
					<div class="bg-secondary-soft px-4 py-5 rounded">
						<div class="row g-3">
							<h4 class="mb-4 mt-0">Change your username</h4>
							<div class="text-center">
								<!-- Profil username-->
								<div class="col-md-4 col-md-offset-4">
									<form action="/postUsername" method="POST" enctype="multipart/form-data">

										<?php
										$user_name = DB::table('users')->where('id', Auth::id())->value('username');
										?>

										<div class="input-group mb-3">
											<input type="text" class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="{{ $user_name }}" id="username" value="{{Request::old('username')}}">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="submit">Upload</button>
												<input type="hidden" name="_token" value="{{  Session::token() }}">
											</div>
										</div>




									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- upload email -->

				<div class="col-xxl-4">
					<div class="bg-secondary-soft px-4 py-5 rounded">
						<div class="row g-3">
							<h4 class="mb-4 mt-0">Change your Email</h4>
							<div class="text-center">
								<!-- Profil email -->
								<div class="col-md-4 col-md-offset-4">
									<form action="/postEmail" method="POST" enctype="multipart/form-data">

										<?php
										$user_mail = DB::table('users')->where('id', Auth::id())->value('email');
										?>

										<div class="input-group mb-3">
											<input type="text" class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="{{ $user_mail }}" id="email" value="{{Request::old('email')}}">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="submit">Upload</button>
												<input type="hidden" name="_token" value="{{  Session::token() }}">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- change password -->

				<div class="col-xxl-4">
					<div class="bg-secondary-soft px-4 py-5 rounded">
						<div class="row g-3">
							<h4 class="mb-4 mt-0">Change your Password</h4>
							<div class="text-center">
								<!-- Profil password -->
								<div class="col-md-4 col-md-offset-4">
									<form action="/postPassword" method="POST" enctype="multipart/form-data">

										<?php
										$user_password = DB::table('users')->where('id', Auth::id())->value('user_password');
										?>

										<div class="input-group mb-3">
											<input type="text" class="form-control @error('user_password') is-invalid @enderror" type="text" name="user_password"  id="user_password" value="{{Request::old('user_password')}}">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="submit">Upload</button>
												<input type="hidden" name="_token" value="{{  Session::token() }}">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- Row END -->
			<!-- button -->
			<div class="gap-3 d-md-flex justify-content-md-end text-center">
				<form action="/safeFile" method="GET">
					<button type="submit" class="btn btn-danger btn-lg">Safe Informations</button>
					<input type="hidden" name="_token" value="{{  Session::token() }}">
				</form>
			</div>
		</div>
	</div>
</div>

<form action="{{ route('feed') }}" method="GET">
	<button type="submit" class="btn btn-primary"> BackToFeed </button>
</form>
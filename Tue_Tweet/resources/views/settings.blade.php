@extends('layouts.master')
@section('title')
My Profile
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
				<!-- Form START -->
				<form class="file-upload">
					<div class="row mb-5 gx-5">
						<!-- Contact detail -->
						<div class="col-xxl-8 mb-5 mb-xxl-0">
							<div class="bg-secondary-soft px-4 py-5 rounded">
								<div class="row g-3">
									<h4 class="mb-4 mt-0">Contact detail</h4>
									<!-- First Name -->
									<div class="col-md-6">
										<?php
										$id = Auth::id();
										$results = DB::table('users')->where('id', $id)->value('username');
										echo '<label class="form-label">First Name *</label>';
										echo '<input type="text" class="form-control" placeholder="" aria-label="First name" value=' . $results . '>';
										?>
									</div>
									<!-- Email -->
									<div class="col-md-6">
										<?php
										$id = Auth::id();
										$results = DB::table('users')->where('id', $id)->value('email');
										echo '<label for="inputEmail4" class="form-label">Email *</label>';
										echo '<input type="email" class="form-control" id="inputEmail4" value=' . $results . '>';
										?>
									</div>
									<!-- Bio -->
									<div class="col-md-6">
										<?php
										$id = Auth::id();
										$results = DB::table('users')->where('id', $id)->value('profile_bio');
										echo '<label class="form-label">Bio *</label>';
										echo '<input type="text" class="form-control" placeholder="" aria-label="Bio" value=' . $results . '>';
										?>
									</div>

								</div> <!-- Row END -->
							</div>
						</div>
						<!-- Upload profile -->
						<div class="col-xxl-4">
							<div class="bg-secondary-soft px-4 py-5 rounded">
								<div class="row g-3">
									<h4 class="mb-4 mt-0">Upload your profile photo</h4>
									<div class="text-center">
										<!-- Image upload -->
										<div class="col-md-4 col-md-offset-4">
											<form action="/postImage" method="POST" enctype="multipart/form-data">

												<div class="form-group">
													<label for="img"> Upload your Profile Picture </label>
													<input type="file" name="img" id="img" value="{{Request::old('img')}}">
												</div>

												<button type="submit" class="btn btn-primary"> Upload </button>
												<input type="hidden" name="_token" value="{{  Session::token() }}">
											</form>
										</div>
										<!-- Content -->
										<p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- Row END -->


					<!-- change password -->
					<div class="col-xxl-6">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="my-4">Change Password</h4>
								<!-- Old password -->
								<div class="col-md-6">
									<label for="exampleInputPassword1" class="form-label">Old password *</label>
									<input type="password" class="form-control" id="exampleInputPassword1">
								</div>
								<!-- New password -->
								<div class="col-md-6">
									<label for="exampleInputPassword2" class="form-label">New password *</label>
									<input type="password" class="form-control" id="exampleInputPassword2">
								</div>
								<!-- Confirm password -->
								<div class="col-md-12">
									<label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
									<input type="password" class="form-control" id="exampleInputPassword3">
								</div>
							</div>
						</div>
					</div>
			</div> <!-- Row END -->
			<!-- button -->
			<div class="gap-3 d-md-flex justify-content-md-end text-center">
				<button type="button" class="btn btn-danger btn-lg">Delete profile</button>
				<button type="button" class="btn btn-primary btn-lg">Update profile</button>
			</div>
			</form> <!-- Form END -->
		</div>
	</div>
</div>
</div>

<form action="{{ route('feed') }}" method="GET">
	<button type="submit" class="btn btn-primary"> BackToFeed </button>
</form>
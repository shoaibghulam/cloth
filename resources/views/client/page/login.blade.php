@extends('client.layout.master')
@section('title', 'E-Book | Home ')
@section('headname','Dashboard')
@section('content')

<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
							<li class="breadcrumb-item active">Login</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
					@if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
						<!-- Register Form s-->
						<form action="{{ route('register-process') }}" method="post">
						@csrf
							<div class="login-form">
								<h4 class="login-title">New Customer</h4>
								<p><span class="font-weight-bold">I am a new customer</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Full Name</label>
										<input class="mb-0 form-control" type="text" id="name" name="fullname" value="{{ old('fullname') }}"  placeholder="Enter your full name">
										<span class="text-danger">{{$errors->first('fullname')}}</span>
									</div>
									<div class="col-12 mb--20">
										<label for="email">Email</label>
										<input class="mb-0 form-control" type="email" id="email" name="Email" value="{{ old('Email') }}" placeholder="Enter Your Email Address Here..">
										<span class="text-danger">{{$errors->first('Email')}}</span>

									</div>
									<div class="col-lg-12 mb--20">
										<label for="password">Password</label>
										<input class="mb-0 form-control" type="password" id="password" name="Password" placeholder="Enter your password">
										<span class="text-danger">{{$errors->first('Password')}}</span>

									</div>
									<!-- <div class="col-lg-6 mb--20">
										<label for="password">Repeat Password</label>
										<input class="mb-0 form-control" type="password" id="repeat-password" placeholder="Repeat your password">
									</div> -->
									<div class="col-md-12">
									<button type="submit" class="btn btn-outlined a">Register</button>
										<!-- <a href="#" class="btn btn-outlined">Register</a> -->
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
					
					
					
                    
			
				 <!-- @if($errors->has('error'))
				 <div class="alert alert-danger">
                 {{$errors->first('error')}} 
							
				</div>
				@endif	 -->

				@if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif					 
					<form action="{{ route('login-process') }}" method="post">
						@csrf
							<div class="login-form">
								<h4 class="login-title">Returning Customer</h4>
								<p><span class="font-weight-bold">I am a returning customer</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Enter your email address here...</label>
										<input class="mb-0 form-control" type="email" id="email1" name="email" placeholder="Enter you email address here...">
										<span class="text-danger">{{$errors->first('email')}}</span>

									
									</div>
									<div class="col-12 mb--20">
										<label for="password">Password</label>
										<input class="mb-0 form-control" type="password" id="login-password" name="password" placeholder="Enter your password">
										<span class="text-danger">{{$errors->first('password')}}</span>

									
									</div>
									<div class="col-md-6">
									<button type="submit" class="btn btn-outlined">Login</button>
									</div>
									<div class="col-md-6">
							        <a href="{{route('forget')}}" class="btn btn-outlined">Forget Password</a>

									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>

@endsection
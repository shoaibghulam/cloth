@extends('client.layout.master')
@section('title', 'E-Book | Shop ')
@section('headname','Dashboard')
@section('content')

<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
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
					<div class="col-sm-12 m-auto col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
						<!-- Login Form s-->
						@if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

						<form action="{{ route('verification-process') }}" >
						@csrf
							<div class="login-form">
								<h4 class="login-title">User Verification</h4>
								<div class="row">
									
									<div class="col-lg-12 mb--20">
										<label for="password">Token</label>
										<input class="mb-0 form-control" type="text" id="token"  name="token" placeholder="Your Token">
										<span class="text-danger">{{$errors->first('token')}} </span>
									</div>
									<div class="col-md-12">
									<button type="submit" class="btn btn-outlined">Submit</button>
										<!-- <a href="#" class="btn btn-outlined">Sent</a> -->
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
        @endsection
        @section('scripts')
        <script>
            $(document).ready(function(){
                let searchParams = new URLSearchParams(window.location.search)
                let token= searchParams.get("token");
                
                $("#token").val(token);
            })
        </script>
        @endsection

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
							<li class="breadcrumb-item active">My Account</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<div class="page-section inner-page-sec-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<!-- My Account Tab Menu Start -->
							<div class="col-lg-3 col-12">
								<div class="myaccount-tab-menu nav" role="tablist">
									<a href="#dashboad" class="active" data-toggle="tab"><i
											class="fas fa-tachometer-alt"></i>
										Dashboard</a>
									<a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
									{{-- <a href="#download" data-toggle="tab"><i class="fas fa-book"></i>Purchase Books</a> --}}
									<a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
										Payment
										Method</a>
									<a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
										Account Details</a>
									<a href="#account-info" data-toggle="tab" @if(!empty($active)) class='active' @endif><i class="fa fa-user"></i>Change Password</a>
									<a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									@if(session('success'))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                    @endif

								  
									<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
										<div class="myaccount-content">
											<h3>Dashboard</h3>
											<div class="welcome mb-20">
												<p>Hello, <strong>@if(Auth::check()) {{Auth::user()->name}} @endif</strong><strong>
														!</strong><a href="{{route('logout')}}" class="logout">
														Logout</a>)</p>
											</div>
											<p class="mb-0">From your account dashboard. you can easily check &amp; view
												your
												recent orders, manage your shipping and billing addresses and edit your
												password and account details.</p>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="orders" role="tabpanel">
										<div class="myaccount-content">
											<h3>Orders</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>Order ID</th>
															<th>Order Date</th>
															<th>Total</th>
															<th>Order Details</th>
															
														</tr>
													</thead>
													<tbody>
													
													@foreach($orderdetails as $orderlist)
														<tr>
														<td>{{$orderlist->id}}</td>
														<td>{{$orderlist->created_at}}</td>
														<td>{{$orderlist->amount}}</td>
															
														<td><a href="{{route('orderdetail',['id'=>$orderlist->id])}}" class="btn">View</a></td>
														</tr>
													@endforeach
														
													</tbody>
												</table>
												<div class="row pt--30">
					<div class="col-md-12">
						<div class="pagination-block">
							{{$orderdetails->links('client.page.pagination')}}

							<ul class="pagination-btns flex-center">

								{{-- <li><a href="#" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a>
								</li>
								<li><a href="#" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a>
								</li>
								<li class="active"><a href="#" class="single-btn">1</a></li>
								<li><a href="#" class="single-btn">2</a></li>
								<li><a href="#" class="single-btn">3</a></li>
								<li><a href="#" class="single-btn">4</a></li>
								<li><a href="#" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a>
								</li>
								<li><a href="#" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a>
								</li> --}}
							</ul>
						</div>
					</div>
				</div>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="download" role="tabpanel">
										<div class="myaccount-content">
											<h3>Purchase Books</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															
															<th>Book Name</th>
															<th>View</th>
															
														</tr>
													</thead>
													<tbody>
													@foreach($purchasebook as $books)
										
													<tr>
													
													<td>@foreach($books->orderdetail as $detail) {{$detail->book->name}} @endforeach</td>
													<td><a href="{{route('reader',['id'=>$detail->book->id])}}" target="_blank" class="btn view">View</a></td>
													</tr>
													@endforeach
														
													</tbody>
												</table>
												<div class="row pt--30">
													<div class="col-md-12">
														<div class="pagination-block">
															{{$purchasebook->links('client.page.pagination')}}
								
															<ul class="pagination-btns flex-center">
								
																{{-- <li><a href="#" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a>
																</li>
																<li><a href="#" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a>
																</li>
																<li class="active"><a href="#" class="single-btn">1</a></li>
																<li><a href="#" class="single-btn">2</a></li>
																<li><a href="#" class="single-btn">3</a></li>
																<li><a href="#" class="single-btn">4</a></li>
																<li><a href="#" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a>
																</li>
																<li><a href="#" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a>
																</li> --}}
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="payment-method" role="tabpanel">
										<div class="myaccount-content">
											<h3>Payment Method</h3>
											<p class="saved-message">You Can't Saved Your Payment Method yet.</p>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="address-edit" role="tabpanel">
										<div class="myaccount-content">
											<h3>Account Details</h3>
										
											<form action="{{route('update-account-detail-process')}}" method="post">
											    @csrf
											<div class="row">
											  <div class="col-lg-6 col-12  mb--30">
											      @php $user=Auth::user(); @endphp
											<!--<input type="hidden"  name="id" class="id" value="{{Auth::user()->id}}">-->

											<input id="first-name" class="form-control" placeholder="Name" type="text" name="name" value="{{$user->name}}">
											@error('name')
                                            <span class="control-label" style="color:red;">{{ $message }}</span>
                                            @enderror
											</div>
														
											<div class="col-lg-6 col-12  mb--30">
											<input id="email" class="form-control" placeholder="Email Address" type="email" name="email" value="{{$user->email}}">
											@error('email')
                                            <span class="control-label" style="color:red;">{{ $message }}</span>
                                            @enderror
											</div>
											</div>
											
											<div class="col-12">
											<button type="submit" class="btn btn--primary">Save Changes</button>
											</div>
											</form>

											
											
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade "  id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Password Change</h3>
											<div class="account-details-form">
											@if (count($errors))
                                            @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger">{{$error}}</p>
                                            @endforeach
                                            @endif   
												<form action="{{route('update-myaccount-process')}}" method="post">
												@csrf
													<div class="row">
														<!--<div class="col-lg-6 col-12  mb--30">-->
														<!--<input type="hidden"  name="id" class="id" value="{{Auth::user()->id}}">-->

														<!--<input id="first-name" placeholder="Name" type="text" name="name" value="{{Auth::user()->name}}">-->
														<!--</div>-->
														
														<!--<div class="col-lg-6 col-12  mb--30">-->
														<!--<input id="email" placeholder="Email Address" type="email" name="email" value="{{Auth::user()->email}}">-->
														<!--</div>-->
														<div class="col-12  mb--30">
															<!--<h4>Password change</h4>-->
														</div>
														<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="Current Password" type="password" name="current_password" >
														</div>
														<div class="col-12  mb--30">
															<input id="new-pwd" placeholder="New Password" name="new_password"
																type="password">
														</div>
														<div class="col-12  mb--30">
															<input id="confirm-pwd" placeholder="Confirm Password"
																type="password" name="confirm_password">
														</div>
														<div class="col-12">
															<button type="submit" class="btn btn--primary">Save Changes</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
									
									
								</div>
							</div>
							<!-- My Account Tab Content End -->
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
@section('scripts')
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('d7e7e57a6931e6dc484e', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    
    });
  </script>
@endsection

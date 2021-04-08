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
							<li class="breadcrumb-item active">Order Details</li>
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
							<!-- My Account Tab Content Start -->
							<div class="col-lg-12 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="" id="orders" role="">
										<div class="myaccount-content">
											<h3>Order Details</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>Order Detail ID</th>
															<th>Price</th>
															<th>Discount</th>
															<th>Total</th>
															<!-- <th>Status</th> -->
															
														</tr>
													</thead>
													<tbody>
                                                    
                                                    @php $total=0; @endphp
                                                    @foreach($custorderdetails->orderdetail as $detail)
													<tr>
													<td>{{$detail->id}}</td>
													<td>{{$detail->price}}</td>
													<td>{{$detail->discount}}</td>
													<td>{{$detail->price-($detail->discount/100)*$detail->price}} @php $total+=$detail->price-($detail->discount/100)*$detail->price @endphp</td>
															
													<!-- <td><a href="cart.html" class="btn">View</a></td> -->
													</tr>
                                                    @endforeach
                                                    
													
														
												</tbody>
												</table>

                                                <div class="col-lg-6 col-12 d-flex">
							<div class="cart-summary">
								<div class="cart-summary-wrap">
									<h4><span>Detail Summary</span></h4>
									<!-- <p>Sub Total <span class="text-primary">{{$total}}</span></p> -->
									<!-- <p>Shipping Cost <span class="text-primary">$00.00</span></p> -->
									<h2>Grand Total <span class="text-primary">{{$total}}</span></h2>
								</div>
								<!-- <div class="cart-summary-button">
							
								<a href="{{route('checkout')}}" class="checkout-btn c-btn btn--primary">Checkout</a>
							
								<button class="update-btn c-btn btn-outlined">Update Cart</button>
								</div> -->
							</div>
						</div>
												<!-- <div class="row">
													<div class="col-md-12">
														<a class="bold nav-link" href="{{url('/orderpage')}}">View all</a>
													</div>
												</div> -->
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
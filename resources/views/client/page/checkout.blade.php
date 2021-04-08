@extends('client.layout.master')
@section('title', 'E-Book | Home ')
@section('headname','Dashboard')
@section('content')
<style>
	.paypal{
	color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    background: #62ab00;
    padding: 10px;
    width: 10%;
	}
	
</style>
<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
							<li class="breadcrumb-item active">Checkout</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		@if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<div class="checkout-form">
							<div class="row row-40">
								<div class="col-12">
									<h1 class="quick-title">Checkout</h1>
									<!-- Slide Down Trigger  -->
									{{-- <div class="checkout-quick-box">
										<p><i class="far fa-sticky-note"></i>Returning customer? <a href="javascript:"
												class="slide-trigger" data-target="#quick-login">Click
												here to login</a></p>
									</div> --}}
									<!-- Slide Down Blox ==> Login Box  -->
									<div class="checkout-slidedown-box" id="quick-login">
										<form action="https://demo.hasthemes.com/pustok-preview/pustok/">
											<div class="quick-login-form">
												<p>If you have shopped with us before, please enter your details in the
													boxes below. If you are a new
													customer
													please
													proceed to the Billing & Shipping section.</p>
												<div class="form-group">
													<label for="quick-user">Username or email *</label>
													<input type="text" placeholder="" id="quick-user">
												</div>
												<div class="form-group">
													<label for="quick-pass">Password *</label>
													<input type="text" placeholder="" id="quick-pass">
												</div>
												<div class="form-group">
													<div class="d-flex align-items-center flex-wrap">
														<a href="#" class="btn btn-outlined   mr-3">Login</a>
														<div class="d-inline-flex align-items-center">
															<input type="checkbox" id="accept_terms" class="mb-0 mr-1">
															<label for="accept_terms" class="mb-0">I’ve read and accept
																the terms &amp; conditions</label>
														</div>
													</div>
													<p><a href="javascript:" class="pass-lost mt-3">Lost your
															password?</a></p>
												</div>
											</div>
										</form>
									</div>
									<!-- Slide Down Trigger  -->
									{{-- <div class="checkout-quick-box">
										<p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:"
												class="slide-trigger" data-target="#quick-cupon">
												Click here to enter your code</a></p>
									</div> --}}
									<!-- Slide Down Blox ==> Cupon Box -->
									{{-- <div class="checkout-slidedown-box" id="quick-cupon">
										<form action="https://demo.hasthemes.com/pustok-preview/pustok/">
											<div class="checkout_coupon">
												<input type="text" class="mb-0" placeholder="Coupon Code">
												<a href="#" class="btn btn-outlined">Apply coupon</a>
											</div>
										</form>
									</div> --}}
								</div>
								{{-- <div class="col-lg-7 mb--20">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Billing Address</h4>
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>First Name*</label>
												<input type="text" placeholder="First Name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Last Name*</label>
												<input type="text" placeholder="Last Name">
											</div>
											<div class="col-12 mb--20">
												<label>Company Name</label>
												<input type="text" placeholder="Company Name">
											</div>
											<div class="col-12 col-12 mb--20">
												<label>Country*</label>
												<select class="nice-select">
													<option>Bangladesh</option>
													<option>China</option>
													<option>country</option>
													<option>India</option>
													<option>Japan</option>
												</select>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1">
												<input type="text" placeholder="Address line 2">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" placeholder="State">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code">
											</div>
											<div class="col-12 mb--20 ">
												<div class="block-border check-bx-wrapper">
													<div class="check-box">
														<input type="checkbox" id="create_account">
														<label for="create_account">Create an Acount?</label>
													</div>
													<div class="check-box">
														<input type="checkbox" id="shiping_address" data-shipping>
														<label for="shiping_address">Ship to Different Address</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Shipping Address -->
									<div id="shipping-form" class="mb--40">
										<h4 class="checkout-title">Shipping Address</h4>
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>First Name*</label>
												<input type="text" placeholder="First Name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Last Name*</label>
												<input type="text" placeholder="Last Name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number">
											</div>
											<div class="col-12 mb--20">
												<label>Company Name</label>
												<input type="text" placeholder="Company Name">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1">
												<input type="text" placeholder="Address line 2">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Country*</label>
												<select class="nice-select">
													<option>Bangladesh</option>
													<option>China</option>
													<option>country</option>
													<option>India</option>
													<option>Japan</option>
												</select>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" placeholder="State">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code">
											</div>
										</div>
									</div>
									<div class="order-note-block mt--30">
										<label for="order-note">Order notes</label>
										<textarea id="order-note" cols="30" rows="10" class="order-note"
											placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
									</div>
								</div> --}}
								<div class="col-lg-12">
									<div class="row">
										<!-- Cart Total -->
										<div class="col-12">
											<div class="checkout-cart-total">
												<h2 class="checkout-title">YOUR ORDER</h2>
												<h4>Product <span>Total</span></h4>
												<ul>
												<?php 
												$total=0;
										        $items = ShoppingCart::all();
												if($items!=='')
										        ?>
                                                @foreach($items as $carts)

												<li><span class="left">{{($carts->name)}} X {{($carts->qty)}}</span> <span
												class="right">${{$carts->price-($carts->discount/100)*$carts->price}}
												@php
													$total+=$carts->price-($carts->discount/100)*$carts->price;
												@endphp</span></li>
													
												@endforeach
												</ul>

												
												
												<p>Sub Total <span>{{$total}}</span></p>
												<!-- <p>Shipping Fee <span>$00.00</span></p> -->
												<h4>Grand Total <span>{{$total}}</span></h4>
												<div class="method-notice mt--25">
													<article>
														<h3 class="d-none sr-only">blog-article</h3>
														Sorry, it seems that there are no available payment methods for
														your state. Please contact us if you
														require
														assistance
														or wish to make alternate arrangements.
													</article>
												</div>
												<div class="term-block">
													<input type="checkbox" id="accept_terms2">
													<label for="accept_terms2">I’ve read and accept the terms &
														conditions</label>
												</div>
                                                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frmTransaction" id="frmTransaction">

													<input type="hidden" name="business" value="sb-fklcw585695@business.example.com">
												 
													<input type="hidden" name="cmd" value="_xclick">
												 
													 <input type="hidden" name="item_name" value="khalid">
												 
													<input type="hidden" name="item_number" value="2">
												 
													<input type="hidden" name="amount" value="{{$total}}">   
												 
													<input type="hidden" name="currency_code" value="USD">   
												 
													<input type="hidden" name="cancel_return" value="http://demo.expertphp.in/payment-cancel">
												 
													<input type="hidden" name="return" value="{{route('paypal-payment')}}">
													<button class="paypal btn-primary" style="float: right;">Pay With<i class="fab fa-paypal"></i></button>
												 
												 </form>
												<form action="{{route('checkout-process')}}" method="post" >
												@csrf
												<input type="hidden" name="amount" value="{{$total*100}}">
												<script 
												src="https://checkout.stripe.com/checkout.js" 
												class="stripe-button"
												data-key="pk_test_51HxAkBKbaIfEXQWd5782V5L0v2JHngIzgn9nRsuMM3eKNJDj9Hp9njvQDpaehlVeYMiIhLXKv9pEMDnBGnE0wUoZ00HjU6HUrK"
												data-amount="{{$total*100}}"
												data-name=""
												data-description="Pay Amount"
												data-locale="auto"
												data-currency="usd" 
												>

												</script> 
												</form>

												<a href="{{route('pay/with/square')}}" class="paypal btn-primary" style="float: right;">Square<i class=""></i></a>


												
											<!-- <div id="form-container">
												<div id="sq-card-number"></div>
												<div class="third" id="sq-expiration-date"></div>
												<div class="third" id="sq-cvv"></div>
												<div class="third" id="sq-postal-code"></div>
												<button id="sq-creditcard" class="button-credit-card">Pay $1.00</button>
											</div>  -->
											

											an add any form here with the way you want. While for the purpose of View, the form has 1 input field to enter the amount and a button also to complete the submission.


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection

@section('scripts')

<script type="text/javascript" src="https://js.squareupsandbox.com/v2/paymentform"></script>
<script type="text/javascript">

	//TODO: paste code from step 2.1.1
  
	// Create and initialize a payment form object
	const paymentForm = new SqPaymentForm({
		// Initialize the payment form elements
		
		//TODO: Replace with your sandbox application ID
		applicationId: "{{ env('SQUARE_APPLICATION_ID') }}",
		inputClass: 'sq-input',
		autoBuild: false,
		// Customize the CSS for SqPaymentForm iframe elements
		inputStyles: [{
			fontSize: '16px',
			lineHeight: '24px',
			padding: '16px',
			placeholderColor: '#a0a0a0',
			backgroundColor: 'transparent',
		}],
		// Initialize the credit card placeholders
		cardNumber: {
			elementId: 'sq-card-number',
			placeholder: 'Card Number'
		},
		cvv: {
			elementId: 'sq-cvv',
			placeholder: 'CVV'
		},
		expirationDate: {
			elementId: 'sq-expiration-date',
			placeholder: 'MM/YY'
		},
		postalCode: {
			elementId: 'sq-postal-code',
			placeholder: 'Postal'
		},
		// SqPaymentForm callback functions
		callbacks: {
			/*
			* callback function: cardNonceResponseReceived
			* Triggered when: SqPaymentForm completes a card nonce request
			*/
			cardNonceResponseReceived: function (errors, nonce, cardData) {
				if (errors) {
					// Log errors from nonce generation to the browser developer console.
					console.error('Encountered errors:');
					errors.forEach(function (error) {
						console.error('  ' + error.message);
					});
					// alert('Encountered errors, check browser developer console for more details');
					return;
				}
				let form = $("<form/>").attr("action", "{{ url('with-square') }}/"+nonce);
				form.appendTo("body");
				form.submit();
				console.log(nonce);
				//TODO: Replace alert with code in step 2.1
				//alert(`The generated nonce is:\n${nonce}`);
			}
		}
	});
	//TODO: paste code from step 1.1.4
	$("#sq-creditcard").click(function(e){
		e.preventDefault();
		// Request a nonce from the SqPaymentForm object
		paymentForm.requestCardNonce()
	});
	paymentForm.build();
</script>
<script>
$(document).ready(function(){
    //Cart
    $('.checkout').click(function(e){
    //$().appendTo( "abc" );
   

    //  image1="{{route('/')}}"+"uploads/images/"+image;   
    // $('.abc').prepend('<div class="single-cart-block">"<div class="cart-product"><a href="product-details.html" class="image"><img src='+image1+' alt=""></a><div class="content"><h3 class="title"><a href="product-details.html">'+name+'</a></h3><p class="price"><span class="qty">'+'×</span>'+total+'</p><button class="cross-btn delete"  data-id=""><i class="fas fa-times"></i></button></div></div></div>'); 
        
        
    total=$(this).data("total");
	//alert(total)
    // name=$(this).data("name");
    // image=$(this).data("image");
    // price=$(this).data("price");
    // discount=$(this).data("discount");
                
                
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              $.ajax({
                  url: "{{ route('checkout-process') }}",
                  method: 'post',
                  data: {
                    "_token": "{{ csrf_token() }}",
                    total:total
                  },
                  success: function(result){
                  console.log(result);

                  //swal("Good job!", "Your Book successfully added!", "success");
                //  alert('Your Book Successfully Added In Your Cart')
                     
                  }
				  });
               });

});
</script>
<script>
	$(document).ready(function(){
		$(".paypal").click(function(){
document.frmTransaction.submit();

		})
	})
</script>
@endsection
@extends('client.layout.master')
@section('title', 'E-Book | Home ')
@section('headname','Dashboard')
@section('content')

@php use App\Models\Vendor\Book; 
use App\Models\Admin\Vendor; @endphp

<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
							<li class="breadcrumb-item active">Cart</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!-- Cart Page Start -->
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Shopping Cart</h1>
						

					</div>
					<div class="row">
						<div class="col-12">
							<form action="#" class="">
								<!-- Cart Table -->
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										<!-- Head Row -->
										<thead>
											<tr>
												<th class="pro-thumbnail">Image</th>
												<th class="pro-title">Product</th>
												<th class="pro-price">Price</th>
												<th class="pro-quantity">Discount</th>
												<th class="pro-subtotal">Total</th>
												<th class="pro-remove">Action</th>

											</tr>
										</thead>
										<tbody>
										<?php 
										$id=0;
										$total=0;
										$items = ShoppingCart::all();
										if($items!=='')
										?>
                                        @foreach($items as $carts)
										@php
										$id=$carts->id; 
										@endphp
											<!-- Product Row -->
									    <tr id="cartid{{ $carts->__raw_id }}">
												
												<td class="pro-thumbnail"><a href="#"><img
												src='{{asset("uploads/images/".$carts->image)}}' alt="Product"></a></td>
												<td class="pro-title"><a href="#">{{($carts->name)}}</a></td>
												<td class="pro-price"><span>${{($carts->price)}}</span></td>
												<td class="pro-quantity">
													{{$carts->discount}}%
												</td>
												<td class="pro-subtotal">
													${{$carts->price-($carts->discount/100)*$carts->price}}
													@php
														$total+=$carts->price-($carts->discount/100)*$carts->price;
													@endphp
												</td>

												<td class="pro-remove cartdelete" data-id="{{$carts->__raw_id}}"><a href="javascript:;"><i class="far fa-trash-alt" ></i></a>
												</td>
											</tr>

											@endforeach
											<!-- Product Row -->
											<!-- <tr>
												<td class="pro-remove"><a href="#"><i class="far fa-trash-alt"></i></a>
												</td>
												<td class="pro-thumbnail"><a href="#"><img
															src="{{asset('c-assets/image/products/product-2.jpg')}}" alt="Product"></a></td>
												<td class="pro-title"><a href="#">Rinosin Glasses</a></td>
												<td class="pro-price"><span>$395.00</span></td>
												<td class="pro-quantity">
													<div class="pro-qty">
														<div class="count-input-block">
															<input type="number" class="form-control text-center"
																value="1">
														</div>
													</div>
												</td>
												<td class="pro-subtotal"><span>$395.00</span></td>
											</tr> -->
											<!-- Discount Row  -->
											<tr>
												<td colspan="6" class="actions">
													<div class="coupon-block">
														<div class="coupon-text">
															<label for="coupon_code">Coupon:</label>
															<input type="text" name="coupon_code" class="input-text"
																id="coupon_code" value="" placeholder="Coupon code">
														</div>
														<div class="coupon-btn">
															<input type="submit" class="btn btn-outlined"
																name="apply_coupon" value="Apply coupon">
														</div>
													</div>
													<!-- <div class="update-block text-right">
														<input type="submit" class="btn btn-outlined" name="update_cart"
															value="Update cart">
														<input type="hidden" id="_wpnonce" name="_wpnonce"
															value="05741b501f"><input type="hidden"
															name="_wp_http_referer" value="/petmark/cart/">
													</div> -->
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="cart-section-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-12 mb--30 mb-lg--0">
							<!-- slide Block 5 / Normal Slider -->
							<div class="cart-block-title">
								<h2>YOU MAY BE INTERESTED IN…</h2>
							</div>
							<div class="product-slider sb-slick-slider" data-slick-setting='{
							          "autoplay": true,
							          "autoplaySpeed": 8000,
							          "slidesToShow": 2
									  }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 2} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
			<?php 
			if($id!=0){
			$cats=Book::find($id);
			$books=Book::with('vendor')->where('sub_category_id',$cats->sub_category_id)->get();
		}else{
			$books=Book::with('vendor')->get();

		}

			if($books!=='')
		    ?>

								
									@foreach($books as $book)
									<div class="single-slide">

                                      <div class="product-card">
										<div class="product-header">
											<span class="author">
											<input type="hidden" name="id" >
											{{$book->vendor->firstname}} {{$book->vendor->lastname}}


											</span>
										<h3><a href="{{route('productdetail',['book_id'=>$book->id])}}">{{$book->title}}</a></h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src='{{asset("uploads/images/".$book->image)}}' alt="" width="170px" height="170pxgit">
												<div class="hover-contents">
													<a href="{{route('productdetail',['book_id'=>$book->id])}}" class="hover-image" width="170px" height="170pxgit">
														<img src='{{asset("uploads/images/".$book->image)}}' alt="">
													</a>
													<div class="hover-btns">
														<a href="javascript:;" class="single-btn cart" data-id="{{$book->id}}" data-name="{{$book->name}}" data-image="{{$book->image}}" data-price="{{$book->price}}" data-discount="{{$book->discount}}">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="javascript:;" class="single-btn whishlist" data-id="{{$book->id}}">
															<i class="fas fa-heart"></i>
														</a>
														
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">${{$book->price-($book->discount/100)*$book->price}}</span>
												<del class="price-old">${{$book->price}}</del>
												<span class="price-discount">{{$book->discount}}%</span>
											</div>

										</div>
										
									  </div>

                                   </div>
										@endforeach




								<!-- <div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Jpple
											</span>
											<h3><a href="product-details.html">Turn Your BOOK Into High Machine</a></h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="{{asset('c-assets/image/products/product-2.jpg')}}" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="{{asset('c-assets/image/products/product-1.jpg')}}" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Wpple
											</span>
											<h3><a href="product-details.html">3 Ways Create Better BOOK With</a></h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="{{asset('c-assets/image/products/product-3.jpg')}}" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="{{asset('c-assets/image/products/product-2.jpg')}}" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Epple
											</span>
											<h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
											</h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="{{asset('c-assets/image/products/product-5.jpg')}}" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="{{asset('c-assets/image/products/product-4.jpg')}}" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Hpple
											</span>
											<h3><a href="product-details.html">Simple Things You To Save BOOK</a></h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="{{asset('c-assets/image/products/product-6.jpg')}}" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="{{asset('c-assets/image/products/product-4.jpg')}}" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div> -->

							</div>

						</div>

						<!-- Cart Summary -->
						<div class="col-lg-6 col-12 d-flex">
							<div class="cart-summary">
								<div class="cart-summary-wrap">
									<h4><span>Cart Summary</span></h4>
									<p>Sub Total <span class="text-primary">{{$total}}</span></p>
									<!-- <p>Shipping Cost <span class="text-primary">$00.00</span></p> -->
									<h2>Grand Total <span class="text-primary">{{$total}}</span></h2>
								</div>
								<div class="cart-summary-button">
							
								<a href="{{route('checkout')}}" class="checkout-btn c-btn btn--primary">Checkout</a>
							
								<!-- <button class="update-btn c-btn btn-outlined">Update Cart</button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Cart Page End -->

@endsection

@section('scripts')
<!-- <script>
$(document).ready(function(){
	$(".delete").click(function(){
    if(confirm('Do You Real Want To Delete This Item !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'cart-delete/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#cartid'+id).remove();
            }

        });
    }
  });
});
</script> -->
@endsection
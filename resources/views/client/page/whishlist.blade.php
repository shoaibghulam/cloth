@extends('client.layout.master')
@section('title', 'E-Book | Home ')
@section('headname','Dashboard')
@section('content')
<!-- Wishlist Page Start -->
<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
							<li class="breadcrumb-item active">Wishlist</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<div class="cart_area inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
							<!-- Cart Table -->
							<div class="cart-table table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th class="pro-thumbnail">Image</th>
											<th class="pro-title">Product</th>
											<th class="pro-price">Price</th>
											<th class="pro-quantity">Discount</th>
											<th class="pro-subtotal">After Discount</th> 
											<th class="pro-remove">Remove</th>
										</tr>
									</thead>
									<tbody>
									@foreach($whishlistdetail as $whishlistitem)
									
									<tr id="whishlistid{{ $whishlistitem->id }}">
									<td class="pro-thumbnail">
									<a href="#">
									<img src="{{asset('uploads/images/'.$whishlistitem->book->image)}}" alt="Product"></a></td>
											<td class="pro-title"><a href="#">{{$whishlistitem->book->title}}</a></td>
											<td class="pro-price"><span>{{$whishlistitem->book->price}}</span></td>
											<td class="pro-quantity">
												<div class="pro-qty">
													<div class="count-input-block">
													<span class="price-discount">{{$whishlistitem->book->discount}}%</span>
														<!-- <input type="number" class="form-control text-center" value="1"> -->
													</div>
												</div>
											</td>
											<td class="pro-subtotal"><span>{{$whishlistitem->book->price-($whishlistitem->book->discount/100)*$whishlistitem->book->price}}</span></td>
											<td class="pro-remove">
											<button  class="delete" data-id="{{$whishlistitem->id}}"><i class="far fa-trash-alt"></i></button>
											<!-- <a href="#" id="delete" data-id="{{$whishlistitem->id}}"><i class="far fa-trash-alt"></i></a> -->
											</td>
										</tr>
										<!-- <tr>
											<td class="pro-thumbnail"><a href="#"><img
														src="{{asset('c-assets/image/products/product-2.jpg')}}" alt="Product"></a></td>
											<td class="pro-title"><a href="#">Silacon Glasses</a></td>
											<td class="pro-price"><span>$275.00</span></td>
											<td class="pro-quantity">
												<div class="pro-qty">
													<div class="count-input-block">
														<input type="number" class="form-control text-center" value="1">
													</div>
												</div>
											</td>
											<td class="pro-subtotal"><span>$550.00</span></td>
											<td class="pro-remove"><a href="#"><i class="far fa-trash-alt"></i></a></td>
										</tr>
										<tr>
											<td class="pro-thumbnail"><a href="#"><img
														src="{{asset('c-assets/image/products/product-3.jpg')}}" alt="Product"></a></td>
											<td class="pro-title"><a href="#">Easin Glasses</a></td>
											<td class="pro-price"><span>$295.00</span></td>
											<td class="pro-quantity">
												<div class="pro-qty">
													<div class="count-input-block">
														<input type="number" class="form-control text-center" value="1">
													</div>
												</div>
											</td>
											<td class="pro-subtotal"><span>$295.00</span></td>
											<td class="pro-remove"><a href="#"><i class="far fa-trash-alt"></i></a></td>
										</tr>
										<tr>
											<td class="pro-thumbnail"><a href="#"><img
														src="{{asset('c-assets/image/products/product-4.jpg')}}" alt="Product"></a></td>
											<td class="pro-title"><a href="#">Macrox Glasses</a></td>
											<td class="pro-price"><span>$220.00</span></td>
											<td class="pro-quantity">
												<div class="pro-qty">
													<div class="count-input-block">
														<input type="number" class="form-control text-center" value="1">
													</div>
												</div>
											</td>
											<td class="pro-subtotal"><span>$220.00</span></td>
											<td class="pro-remove"><a href="#"><i class="far fa-trash-alt"></i></a></td>
										</tr> -->
										@endforeach
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Cart Page End -->
		@endsection
		@section('scripts')

		<script>
$(document).ready(function(){

$(".delete").click(function(){
    if(confirm('Do You Real Want To Delete This Whishlist !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'whishlist-delete/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#whishlistid'+id).remove();
                location.reload();
            }

        }); 
    }
  });

  
  
});



  




</script>

		


@endsection


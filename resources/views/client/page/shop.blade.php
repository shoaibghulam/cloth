@extends('client.layout.master')
@section('title', 'E-Book | Shop ')
@section('headname','Dashboard')
@section('content')
<style>
	/*.remove-filter{*/
	/*border-radius: 70%;*/
	/*background: #d4d4d4;*/
	/*}*/
</style>
<section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
		@if(session('status'))
        <div class="alert alert-danger">{{session('status')}}</div>
        @endif
<main class="inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 order-lg-2">
					</div>
					<div class="col-lg-9 order-lg-2">
						<div class="row filters">

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9 order-lg-2">
						<div class="shop-toolbar with-sidebar mb--30">
							<div class="row align-items-center">
								<div class="col-lg-2 col-md-2 col-sm-6">
									<!-- Product View Mode -->
									<div class="product-view-mode">
										<a href="#" class="sorting-btn" data-target="grid"><i class="fas fa-th"></i></a>
										<a href="#" class="sorting-btn" data-target="grid-four">
											<span class="grid-four-icon">
												<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
											</span>
										</a>
										<a href="#" class="sorting-btn  active" data-target="list"><i
												class="fas fa-list"></i></a>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6  mt--10 mt-sm--0 ">
								
									{{-- <span class="toolbar-status">
										Showing 1 to 9 of 14 (2 Pages)
									</span> --}}
								</div>
								<div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
									{{-- <div class="sorting-selection">
										<span>Show:</span>
										<select class="form-control nice-select sort-select">
											<option value="" selected="selected">3</option>
											<option value="">9</option>
											<option value="">5</option>
											<option value="">10</option>
											<option value="">12</option>
										</select>
									</div> --}}
								</div>
								<div class="col-xl-5 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
									<div class="sorting-selection">
										<span>Sort By:</span>
										<select class="form-control nice-select sort-select mr-0 wide filter-by">
											<option value="" selected="selected">Default Sorting</option>
											<option data-val="asc" data-id="title">Sort
												By:Name (A - Z)</option>
											<option  data-val="desc" data-id="title">Sort
												By:Name (Z - A)</option>
											{{-- <option data-val="asc" data-id="price">Sort
												By:Price (Low &gt; High)</option>
											<option  data-val="desc" data-id="price">Sort
												By:Price (High &gt; Low)</option>
											<option value="">Sort
												By:Rating (Highest)</option>
											<option value="">Sort
												By:Rating (Lowest)</option>
											<option value="">Sort
												By:Model (A - Z)</option>
											<option value="">Sort
												By:Model (Z - A)</option> --}}
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="shop-toolbar d-none">
							<div class="row align-items-center">
								<div class="col-lg-2 col-md-2 col-sm-6">
									<!-- Product View Mode -->
									<div class="product-view-mode">
										<a href="#" class="sorting-btn active" data-target="grid"><i
												class="fas fa-th"></i></a>
										<a href="#" class="sorting-btn" data-target="grid-four">
											<span class="grid-four-icon">
												<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
											</span>
										</a>
										<a href="#" class="sorting-btn" data-target="list "><i
												class="fas fa-list"></i></a>
									</div>
								</div>
								<div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
									{{-- <span class="toolbar-status">
									{{ $books->links() }}

										Showing 1 to 9 of 14 (2 Pages)
									</span> --}}
								</div>
								<div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
									{{-- <div class="sorting-selection">
										<span>Show:</span>
							

										<select class="form-control nice-select sort-select">
											fo
											<option value="" selected="selected">3</option>
											<option value="">9</option>
											<option value="">5</option>
											<option value="">10</option>
											<option value="">12</option>
										</select>
									</div> --}}
								</div>
								<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
									<div class="sorting-selection">
										<span>Sort By:</span>
										<select class="form-control nice-select sort-select mr-0">
											<option value="" >Default Sorting</option>
											<option value="asc" data-val="title">Sort
												By:Name (A - Z)</option>
											<option value="desc" data-val="title">Sort
												By:Name (Z - A)</option>
											{{-- <option value="asc" data-val="price">Sort
												By:Price (Low &gt; High)</option>
											<option value="desc" data-val="price">Sort
												By:Price (High &gt; Low)</option>

											<option value="">Sort
												By:Rating (Highest)</option>
											<option value="">Sort
												By:Rating (Lowest)</option>
											<option value="">Sort
												By:Model (A - Z)</option>
											<option value="">Sort
												By:Model (Z - A)</option> --}}
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="shop-product-wrap list with-pagination row space-db--30 shop-border">
							
							@if ($books->count()>0)
							
@foreach ($books as $book)
<div class="col-lg-4 col-sm-6">
    <div class="product-card card-style-list">
        <div class="product-grid-content">
            <div class="product-header">
				<a href="{{route('authordetail',['id'=>$book->vendor->id])}}" class="author">
                {{$book->vendor->firstname}} {{$book->vendor->lastname}}
                </a>
            <h3><a href="{{route('productdetail',['book_id'=>$book->id])}}">{{$book->title}}</a></h3>
            </div>
            <div class="product-card--body">
                <div class="card-image">
					<a href="{{route('productdetail',['book_id'=>$book->id])}}"><img src="{{asset("uploads/images/".$book->image)}}" alt="{{$book->title}}" width="170px!important" height="170px!important;"></a>
                    <div class="hover-contents">
                        <a href="{{route('productdetail',['book_id'=>$book->id])}}" class="hover-image">
                            <a href="{{route('productdetail',['book_id'=>$book->id])}}"><img src="{{asset("uploads/images/".$book->image)}}" alt="{{$book->title}}" width="170px!important" height="170px!important;"></a>
                        </a>
                        <div class="hover-btns">
                        <a href="{{route('cart')}}" class="single-btn"> 
                                <i class="fas fa-shopping-basket cart" data-id="{{$book->id}}" data-name="{{$book->name}}" data-image="{{$book->image}}" data-price="{{$book->price}}" data-discount="{{$book->discount}}"></i>
                            </a>
                        <a href="{{route('whishlist')}}" class="single-btn whishlist"  data-id="{{$book->id}}">
                                <i class="fas fa-heart"></i>
                            </a>
                           
                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                class="single-btn">
                                <i class="fas fa-eye" data-id="{{$book->id}}"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price-block">
                    <span class="price">
                        @if ($book->discount>0)
                            
                        ${{$book->price-($book->discount/100)*$book->price}}
                        @else
                        ${{$book->price}}

                        @endif
                    </span>
                    @if ($book->discount>0)
                    <del class="price-old">${{$book->price}}</del>
                    <span class="price-discount">{{$book->discount}}%</span>
                    @endif

                </div>
            </div>
        </div>
        <div class="product-list-content">
            <div class="card-image">
				<a href="{{route('productdetail',['book_id'=>$book->id])}}"> <img src="{{asset("uploads/images/".$book->image)}}" alt="" width="170px" height="170px" ></a>
            </div>
            <div class="product-card--body">
                <div class="product-header">
                    <a href="{{route('authordetail',['id'=>$book->vendor->id])}}" class="author">
                {{$book->vendor->firstname}} {{$book->vendor->lastname}}
                        
                </a>
                <h3><a href="{{route('productdetail',['book_id'=>$book->id])}}" tabindex="0">{{$book->title}}</a></h3>
                </div>
                <article>
                    <h2 class="sr-only">Card List Article</h2>
                    <p>{{substr($book->description,0,20)}}..</p>
                </article>
                <div class="price-block">
                    <span class="price">
                        @if ($book->discount>0)
                            
                        ${{$book->price-($book->discount/100)*$book->price}}
                        @else
                        ${{$book->price}}

                        @endif
                    </span>
                    @if ($book->discount>0)
                    <del class="price-old">${{$book->price}}</del>
                    <span class="price-discount">{{$book->discount}}%</span>
                    @endif
                </div>
                <div class="rating-block">
					@php
						$rating = $book->rating->avg('rating');
					@endphp
                    <span class="fas fa-star {{ $rating>=1?'star_on':'' }}"></span>
                    <span class="fas fa-star {{ $rating>=2?'star_on':'' }}"></span>
                    <span class="fas fa-star {{ $rating>=3?'star_on':'' }}"></span>
                    <span class="fas fa-star {{ $rating>=4?'star_on':'' }}"></span>
                    <span class="fas fa-star {{ $rating>=5?'star_on':'' }}"></span>
                </div>
                <div class="btn-block">
                <a href="javascript:;" class="btn btn-outlined cart"  data-id="{{$book->id}}" data-name="{{$book->name}}" data-image="{{$book->image}}" data-price="{{$book->price}}" data-discount="{{$book->discount}}">Add To Cart</a>
				<a href="javascript:;" class="btn btn-outlined whishlist"  data-id="{{$book->id}}" >Add To Wishlist</a>

		

                <!-- <a href="" class="card-link whishlist" data-id="{{$book->id}}"><i class="fas fa-heart" ></i> Add To
                Wishlist</a>

                <a href="" class="card-link card" data-id="{{$book->id}}" data-name="{{$book->name}}" data-image="{{$book->image}}" data-price="{{$book->price}}" data-discount="{{$book->discount}}"><i class="fas fa-random"></i> Add To
                Cart</a> -->
                </div>
            </div>
        </div>
    </div>
</div>	
@endforeach

@endif  
							
							
						</div>
						<!-- Pagination Block -->
						<div class="row pt--30">
							<div class="col-md-12">
								<div class="pagination-block">
									{{$books->links('client.page.pagination')}}

									{{-- <ul class="pagination-btns flex-center">

										<li><a href="#" class="single-btn prev-btn ">|<i
													class="zmdi zmdi-chevron-left"></i> </a></li>
										<li><a href="#" class="single-btn prev-btn "><i
													class="zmdi zmdi-chevron-left"></i> </a></li>
										<li class="active"><a href="#" class="single-btn">1</a></li>
										<li><a href="#" class="single-btn">2</a></li>
										<li><a href="#" class="single-btn">3</a></li>
										<li><a href="#" class="single-btn">4</a></li>
										<li><a href="#" class="single-btn next-btn"><i
													class="zmdi zmdi-chevron-right"></i></a></li>
										<li><a href="#" class="single-btn next-btn"><i
													class="zmdi zmdi-chevron-right"></i>|</a></li>
									</ul> --}}
								</div>
							</div>
						</div>
						<!-- Modal -->
						<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
							aria-labelledby="quickModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<div class="product-details-modal">
										<div class="row">
											<div class="col-lg-5">
												<!-- Product Details Slider Big Image-->
												<div class="product-details-slider sb-slick-slider arrow-type-two"
													data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-1.jpg')}}" alt="">
													</div>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-2.jpg')}}" alt="">
													</div>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-3.jpg')}}" alt="">
													</div>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-4.jpg')}}" alt="">
													</div>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-5.jpg')}}" alt="">
													</div>
												</div>
												<!-- Product Details Slider Nav -->
												<div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
													data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-1.jpg')}}" alt="">
													</div>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-2.jpg')}}" alt="">
													</div>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-3.jpg')}}" alt="">
													</div>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-4.jpg')}}" alt="">
													</div>
													<div class="single-slide">
														<img src="{{asset('c-assets/image/products/product-details-5.jpg')}}" alt="">
													</div>
												</div>
											</div>
											<div class="col-lg-7 mt--30 mt-lg--30">
												<div class="product-details-info pl-lg--30 ">
													<p class="tag-block">Tags: <a href="#">Movado</a>, <a
															href="#">Omega</a></p>
													<h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
													<ul class="list-unstyled">
														<li>Ex Tax: <span class="list-value"> £60.24</span></li>
														<li>Brands: <a href="#" class="list-value font-weight-bold">
																Canon</a></li>
														<li>Product Code: <span class="list-value"> model1</span></li>
														<li>Reward Points: <span class="list-value"> 200</span></li>
														<li>Availability: <span class="list-value"> In Stock</span></li>
													</ul>
													<div class="price-block">
														<span class="price-new">£73.79</span>
														<del class="price-old">£91.86</del>
													</div>
													<div class="rating-widget">
														<div class="rating-block">
															<span class="fas fa-star star_on"></span>
															<span class="fas fa-star star_on"></span>
															<span class="fas fa-star star_on"></span>
															<span class="fas fa-star star_on"></span>
															<span class="fas fa-star "></span>
														</div>
														<div class="review-widget">
															<a href="#">(1 Reviews)</a> <span>|</span>
															<a href="#">Write a review</a>
														</div>
													</div>
													<article class="product-details-article">
														<h4 class="sr-only">Product Summery</h4>
														<p>Long printed dress with thin adjustable straps. V-neckline
															and wiring under the Dust with ruffles at the bottom
															of the
															dress.</p>
													</article>
													<div class="add-to-cart-row">
														<div class="count-input-block">
															<span class="widget-label">Qty</span>
															<input type="number" class="form-control text-center"
																value="1">
														</div>
														<div class="add-cart-btn">
															<a href="#" class="btn btn-outlined--primary"><span
																	class="plus-icon">+</span>Add to Cart</a>
														</div>
													</div>
													<div class="compare-wishlist-row">
														<a href="#" class="add-link"><i class="fas fa-heart"></i>Add to
															Wish List</a>
														<a href="#" class="add-link"><i class="fas fa-random"></i>Add to
															Compare</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<div class="widget-social-share">
											<span class="widget-label">Share:</span>
											<div class="modal-social-share">
												<a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
												<a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
												<a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
												<a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3  mt--40 mt-lg--0">
						<div class="inner-page-sidebar">
							<!-- Accordion -->
							<div class="single-block">
								<h3 class="sidebar-title">Categories</h3>
								<ul class="sidebar-menu--shop category">
									@if ($book_counts->count()>0)
										@foreach ($book_counts as $book_count)
								<li data-id="{{$book_count->id}}" data-val="category" data-name="{{$book_count->name}}"><a href="javascript:;">{{$book_count->name}} 
										@php
											$count=0;
										@endphp
										@foreach ($book_count->subCategory as $subcategory_book)
										@php
											$count+=$subcategory_book->books_count;
										@endphp
									@endforeach 
									( {{$count}} )</a></li>
											
										@endforeach
									@endif
									{{-- <li><a href="#">Arts & Photography (10)</a></li>
									<li><a href="#">Biographies (16)</a></li>
									<li><a href="#">Business & Money (0)</a></li>
									<li><a href="#">Calendars (6)</a></li>
									<li><a href="#">Children's Books (9)</a></li>
									<li><a href="#">Comics (16)</a></li>
									<li><a href="#">Cookbooks (7)</a></li>
									<li><a href="#">Education (3)</a></li>
									<li><a href="#">House Plants (6)</a></li>
									<li><a href="#">Indoor Living (9)</a></li>
									<li><a href="#">Perfomance Filters (5)</a></li>
										<li><a href="#">Drills (2)</a></li>
										<li><a href="#">Shop (16)</a>
										<ul class="inner-cat-items">
											<li><a href="#">Saws (0)</a></li>
											<li><a href="#">Concrete Tools (7)</a></li>
											<li><a href="#">Sanders (1)</a></li>
										</ul>
									</li> --}}
								</ul>
							</div>
							<!-- Price -->
							<div class="single-block">
								<h3 class="sidebar-title">Fillter By Price</h3>
								<div class="range-slider pt--30">
									<div class="sb-range-slider"></div>
									<div class="slider-price">
										<p>
											<input type="text" id="amount" readonly="">
										</p>
									</div>
								</div>
							</div>
							<!-- Size -->
							{{-- <div class="single-block">
								<h3 class="sidebar-title">Publisher</h3>
								<ul class="sidebar-menu--shop menu-type-2 publisher">
									@if ($publishers->count()>0)
									@foreach($publishers as $publisher)
								<li data-id="{{$publisher->id}}" data-val="publisher" data-name="{{$publisher->name}}"><a href="javascript:;">{{$publisher->name}}<span>({{$publisher->books_count}})</span></a></li>

									@endforeach
									@endif
									
								</ul>
							</div> --}}
							<!-- Color -->
							{{-- <div class="single-block">
								<h3 class="sidebar-title">Languages</h3>
								<ul class="sidebar-menu--shop menu-type-2 language">
									@if ($publishers->count()>0)
									@foreach($languages as $language)
								<li data-id="{{$language->id}}" data-val="language" data-name="{{$language->name}}"><a href="javascript:;">{{$language->name}}<span>({{$language->books_count}})</span></a></li>

									@endforeach
									@endif	
								</ul>
							</div> --}}
							<!-- Promotion Block -->
							<div class="single-block">
								<a href="#" class="promo-image sidebar">
									<img src="{{asset('c-assets/image/others/home-side-promo.jpg')}}" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

@endsection
@section('scripts')
<script>
	
	$(document).ready(function(){
	$(".filter-by").change(function(){
	let id=$(this).find(":selected").data("val");
	let val=$(this).find(":selected").data("id");
	change_url(id,val);
	})
	$(".category li").click(function(){
	
		id=$(this).data('id');
		val=$(this).data('val');
		change_url(id,val);
	})
	$(".language li").click(function(){
	
		id=$(this).data('id');
		val=$(this).data('val');
		change_url(id,val);
	})
	$(".publisher li").click(function(){
	
	id=$(this).data('id');
	val=$(this).data('val');
	change_url(id,val);
})

	function change_url(id,val){
		check_url=location.href;
		prefix=check_url.substring(8, check_url.indexOf(val));
		prefix=prefix[prefix.length -1];
		append=val+"="+id;
		

		let searchParams = new URLSearchParams(window.location.search)
		let param = searchParams.get(val);
		if(param!=null && val!=''){
			
			url1=location.href;
			
			herf=url1.replace(prefix+''+val+'='+param,prefix+''+val+'='+id);
		
	        url=location.href =herf  ;
		}
		else{
		
			var matches = check_url.match(/[a-z\d]+=[a-z\d]+/gi);
		   var count_param = matches? matches.length : 0;
		   if(count_param>0){
	        url=location.href=location.href +"&"+append ;
		   }
		   else{
	        url=location.href=location.href +"?"+append ;

		   }
		}
	}

	let searchParams = new URLSearchParams(window.location.search)
		   let category= searchParams.get("category");
		   let price= searchParams.get("price");
		   let title= searchParams.get("title");
		   let publisher= searchParams.get("publisher");
		   let language= searchParams.get("language");
		   let search= searchParams.get("search");
			if (search!=null) {
				$(".filters").append('<div class="col-12"><button class="remove-filter" data-id="search">Input: '+search+'<span aria-hidden="true" >&times;</span></button></div>');
				
			}
		   if(category!=null){
			   $(".category li").each(function(i,val){
				  cat=$(val).data("id");
				  name=$(val).data('name');
				  if(cat==category){
					$(this).find("a").css('color',"#62ab00");
					$(".filters").append('<div class="col-12"><button class="remove-filter btn btn-outlined--primary" data-id="category">'+name+'<span class="ml-2" aria-hidden="true" >&times;</span></button></div>');

				  }
			   });
		   }
		   if(publisher!=null){
			   $(".publisher li").each(function(i,val){
				  cat=$(val).data("id");
				  name=$(val).data("name");

				  if(cat==publisher){
					$(this).find("a").css('color',"#62ab00");
					$(".filters").append('<div><button class="remove-filter" data-id="publisher">Publisher: '+name+'<span aria-hidden="true" >&times;</span></button></div>');

				  }
			   });
		   }
		   if(language!=null){
			   $(".language li").each(function(i,val){
				  cat=$(val).data("id");
				  name=$(val).data("name");
				  if(cat==language){
					$(this).find("a").css('color',"#62ab00");
					$(".filters").append('<div><button class="remove-filter" data-id="language">Language: '+name+'<span aria-hidden="true" >&times;</span></button></div>');

				  }
			   });
		   }
		   if(title!=null){
			   
			   $(".filter-by option").each(function(i,val){
				  cat=$(val).data("val");
				  val1=$(val).data("id");

				  if(cat==title && val1=='title'){
					$(val).attr('selected',"selected");
					$(val).prop('selected',"selected");

				  }
			   });
		   }
		   

	$(function() {
		
		if (price!=null) {
			split=price.split(",");
			check_min=split[0];
			 check_max=split[1];
		$(".filters").append('<button class="remove-filter" data-id="price">Price='+check_min+'-'+check_max+'<span aria-hidden="true" >&times;</span></button>');

		}
		else{
			check_max="{{$highest_price->Max}}";
			check_min="{{$highest_price->Min}}";
		}
		max1="{{$highest_price->Max}}";
		min1="{{$highest_price->Min}}";
		
		  

		   $(".sb-range-slider").slider({
			   range: true,
			   min:1,
			   max:max1 ,
			   values: [check_min, check_max],
			   slide: function(event, ui) {
				val="price";
			    id=[ui.values[0],ui.values[1]];
				   $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
	              

			   },
			   change:function(event,ui){
				   console.log(event);
				val="price";
			    id=[ui.values[0],ui.values[1]];
	            change_url(id,val);

			   }
		  

		   });
		   $("#amount").val("$" + $(".sb-range-slider").slider("values", 0) +
			   " - $" + $(".sb-range-slider").slider("values", 1));
	   	});
		   $(".single-btn").click(function(event){
			event.preventDefault();

			   val="page";
			   id=$(this).html();
			   change_url(id,val);
		   })
		$(".search-btn").click(function(){
		
			let mobile=$(".web-search").val();
			let web=$(".search-mobile").val();
			if(mobile!=''){
				id=mobile;
			}
			if(web!=''){
				id=web; 
			}
			val="search";
			change_url(id,val);
		})   
		
		$(document).on("click",".remove-filter",function(){
			param=$(this).data("id");
			delete_param(param);
		})  
	function delete_param(param){
	   
		let searchParams = new URLSearchParams(window.location.search)
		   let check= searchParams.get(param);
		   prefix=location.href.substring(8, location.href.indexOf(param));
		   prefix=prefix[prefix.length -1];
		   var matches = location.href.match(/[a-z\d]+=[a-z\d]+/gi);
		   var count_param = matches? matches.length : 0;
			if (check!=null) {
			url1=location.href;
			
			if (prefix=='&') {
				herf=url1.replace(prefix+param+'='+check,"");

			}
			else{
				
				herf=url1.replace(prefix+param+'='+check,"?");
				
			}
			if(count_param==1){
			      url2= location.href.split('?')[0]
				url2=url2.replace('?',"");
				
				url=location.href =url2  ;
				

			}else{
				url=location.href =herf  ;

			}
		
			}
		   
		   }
	})
	
</script>
@endsection
@push('scripts')
	<script>
		
	</script>
@endpush
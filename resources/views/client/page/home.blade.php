@extends('client.layout.master')
@section('title', 'E-Book | Home ')
@section('headname','Dashboard')
@section('content')
<style type="text/css">
    .product-card{
        margin:9%;

    }
</style>
   <!--=================================
        Hero Area
    ===================================== -->
        <section class="hero-area hero-slider-4 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sb-slick-slider" data-slick-setting='{
                                                                    "autoplay": true,
                                                                    "autoplaySpeed": 8000,
                                                                    "slidesToShow": 1,
                                                                    "dots":true
                                                                   }'>
                            @if($slider->count()>0)                                       
                            @foreach($slider as $sliders)

                            <div class="single-slide bg-image bg-overlay--white"
                                data-bg="{{asset('uploads/images/'.$sliders->file)}}">
                                <div class="home-content text-left pl--30">
                                    <div class="row">

                                        <div class="col-lg-5">
                                            <span class="title-small">{{$sliders->heading}}</span>
                                            <h1>{{$sliders->subheading}}.</h1>
                                            <p>{{$sliders->description}}
                                            <br></p>
                                            <a href="{{route('shop')}}" class="btn btn-outlined--pink">
                                            Shop Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            
                            <!--<div class="single-slide bg-image bg-overlay--dark"-->
                            <!--    data-bg="">-->
                            <!--    <div class="home-content text-center">-->
                            <!--        <div class="row justify-content-end">-->
                            <!--            <div class="col-lg-8">-->
                            <!--                <h1 class="v2"></h1>-->
                            <!--                <h2></h2>-->
                            <!--                <a href="{{route('shop')}}" class="btn btn--yellow">-->
                            <!--                    Shop Now-->
                            <!--                </a>-->
                            <!--            </div>-->

                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                           

                        </div>
                    </div>
                </div>
            </div>
        </section>


<!-- =====================================
        Author Profile Slider 
 =========================================-->
 {{-- <section class="bg-light mt-3 section-padding-bottom section-margin">
      <div class="single-block bg-white">
                                <div class="section-title mt-4">
                                    <h2>Authors Profile</h2>
                                </div>
                                <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                                        
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 3,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                                    <!-- div start foreach loop -->
                                    @foreach($authorss as $authorsprofile)
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src='{{asset("uploads/vendors/".$authorsprofile->image)}}' alt="" width="300px" height="150px" style="display: inline-flex;width: 100%;object-fit: fill;height: 15rem;">
                                                    <div class="hover-contents">
                                                        <div class="hover-btns">
                                                            <a class="p-2" href="{{route('authorsprofiledetails',['id'=>$authorsprofile->id])}}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="author">
                                                {{$authorsprofile->firstname}}
                                                </span>
                                                <h3><a>{{$authorsprofile->shopname}}</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- div end foreach loop -->
                                    <!-- <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{asset('c-assets/image/products/product-1.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <div class="hover-btns">
                                                            <a href="" class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <span class="author">
                                                    Apple
                                                </span>
                                                <h3><a href="product-details.html">Apple iPad with Retina Display
                                                        MD510LL/A</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{asset('c-assets/image/products/product-1.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <div class="hover-btns">
                                                            <a href="" class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <span class="author">
                                                    Apple
                                                </span>
                                                <h3><a href="product-details.html">Apple iPad with Retina Display
                                                        MD510LL/A</a></h3>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
 </section> --}}

 <!-- =====================================
        Author Video Slider 
 =========================================-->
 {{-- <section class="bg-light mt-3 section-padding-bottom section-margin">
    <div class="single-block bg-white">
                              <div class="section-title mt-4">
                                  <h2>Authors Video</h2>
                              </div>
                              <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                                      
                                      "autoplaySpeed": 8000,
                                      "slidesToShow": 3,
                                      "dots":true
                                  }' data-slick-responsive='[
                                      {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                      {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                      {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                      {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                  ]'>
                                  @foreach($video as $videolisting)
                                  <div class="single-slide">
                                     
                                    
                                    

                                      <div class="product-card">
                                          <div class="product-card--body">
                                              <div class="card-image">
                                                   <video width="320" height="240" controls>
                                        <source src="{{asset("uploads/vendors/".$videolisting->video)}}" type="video/mp4">
                                        <source src="{{asset("uploads/vendors/".$videolisting->video)}}" type="video/ogg">
                                        Your browser does not support HTML5 video.
                                      </video>
                                                  
                                              </div>
                                              
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                                 
                              </div>
                          </div>
</section> --}}
        <!--=================================
        Home Features Section
    ===================================== -->
        <section class="mb--30">
            <h2 class="sr-only">Feature Section</h2>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Free Shipping Item</h5>
                                <p> Orders over $500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Money Back Guarantee</h5>
                                <p>100% money back</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                            <div class="text">
                                <h5>Cash On Delivery</h5>
                                <p>Lorem ipsum dolor amet</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Help & Support</h5>
                                <p>Call us : + 0123.4567.89</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Category Gallery
    ===================================== -->
        <section class="section-margin">
            <h2 class="sr-only">Category Gallery Section</h2>
            <div class="container">
                <div class="category-gallery-block">
                    <a href="#" class="single-block hr-large">
                        <img src="{{asset('c-assets/image/others/cat-gal-large.png')}}" alt="">
                    </a>
                    <div class="single-block inner-block-wrapper">
                        <a href="#" class="single-image mid-image">
                            <img src="{{asset('c-assets/image/others/cat-gal-mid.png')}}" alt="">
                        </a>
                        <a href="#" class="single-image small-image">
                            <img src="{{asset('c-assets/image/others/cat-gal-small.png')}}" alt="">
                        </a>
                        <a href="#" class="single-image small-image">
                            <img src="{{asset('c-assets/image/others/cat-gal-small-2.jpg')}}" alt="">
                        </a>
                        <a href="#" class="single-image mid-image">
                            <img src="{{asset('c-assets/image/others/cat-gal-mid-2.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Two Column Section
    ===================================== -->
        <section class="section-margin">
            <h1 class="sr-only">Promotion Section</h1>
            <div class="container">
            <div class="row">
            <div class="col-lg-12">
<!-- =====================================
        Main Books Slider 
 =========================================-->
 <section class="bg-light mt-3 section-padding-bottom section-margin">
    <div class="single-block bg-white">
                              <div class="section-title mt-4">
                                  <h2>Author Books</h2>
                              </div>
                              <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                                      
                                      "autoplaySpeed": 8000,
                                      "slidesToShow": 3,
                                      "dots":true
                                  }' data-slick-responsive='[
                                      {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                      {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                      {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                      {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                  ]'>
                                  <!-- div start foreach loop -->
                                  @if ($books->count()>0)
                                  @foreach ($books as $book)
                                  <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    {{$book->subcategory->name}}
                                                </a>
                                            <h3><a href="{{route('productdetail',['book_id'=>$book->id])}}">{{$book->title}}</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                <img src="{{asset("uploads/images/".$book->image)}}" alt="" width="300px" height="150px" style="display: inline-flex;width: 100%;object-fit: fill;height: 15rem;">
                                                    <div class="hover-contents">
                                                        <a href="{{route('productdetail',['book_id'=>$book->id])}}">
                                                <img src="{{asset("uploads/images/".$book->image)}}" alt="" width="300px" height="150px" style="display: inline-flex;width: 100%;object-fit: fill;height: 15rem;">
                                                            
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a href="" class="single-btn cart" data-id="{{$book->id}}" data-name="{{$book->name}}" data-image="{{$book->image}}" data-price="{{$book->price}}" data-discount="{{$book->discount}}"data-id="{{$book->id}}" data-name="{{$book->name}}" data-image="{{$book->image}}" data-price="{{$book->price}}" data-discount="{{$book->discount}}">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a href="" class="single-btn whishlist" data-id="{{$book->id}}">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <!-- <a href="compare.html" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a> -->
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickModal"
                                                                class="single-btn">
                                                                <i class="fas fa-eye" data-id="{{$book->id}}"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">${{$book->price-($book->discount/100)*$book->price}}</span>
                                                    <del class="price-old">${{$book->price}}</del>
                                                    <span class="price-discount">${{$book->discount}}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @endforeach
                                  @endif
                                  
                              </div>
                          </div>
                          
          </section>
            </div>
            </div>
            </div>
        </section>

        <section class="section-margin">
            <div class="container">
                <div class="section-title">
                    <h2>LATEST EVENTS</h2>
                </div>
                <div class="blog-slider sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 2,
                "dots": true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} }
            ]'>
                    
                    @foreach($event as $eventlist)
                    <div class="single-slide">
                        <div class="blog-card">
                            <div class="image">
                                <img src='{{asset("uploads/events/".$eventlist->image)}}' alt="">
                            </div>
                            <div class="content">
                                <div class="content-header">
                                    <div class="date-badge">
                                        <!-- <span class="date">
                                       31
                                        </span>
                                        <span class="month">
                                            Aug
                                        </span> -->
                                        <span class="month">{{$eventlist->eventname}}</span>
                                    </div>
                                    <!-- <h3 class="title"><a href=""></a>
                                    </h3> -->
                                </div>
                                <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a>{{$eventlist->postedby}}</a></p>
                                <article class="blog-paragraph">
                                    <h2 class="sr-only">blog-paragraph</h2>
                                    <p>{{$eventlist->description}}...</p>
                                </article>
                                <a href="{{route('eventdetails',['id'=>$eventlist->id])}}" class="card-link">Read More<i
                                class="fas fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
      
        <!-- Modal --==========================
    Footer
===================================== -->
    </div>
    <!--=================================
  Brands Slider
===================================== -->
    <section class="section-margin">
        <h2 class="sr-only">Brand Slider</h2>
        <div class="container">
            <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <img src="{{asset('c-assets/image/others/brand-1.jpg')}}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{asset('c-assets/image/others/brand-2.jpg')}}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{asset('c-assets/image/others/brand-3.jpg')}}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{asset('c-assets/image/others/brand-4.jpg')}}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{asset('c-assets/image/others/brand-5.jpg')}}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{asset('c-assets/image/others/brand-6.jpg')}}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{asset('c-assets/image/others/brand-1.jpg')}}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{asset('c-assets/image/others/brand-2.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection



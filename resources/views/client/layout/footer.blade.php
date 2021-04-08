@php 
    use App\Models\Admin\Language;
    use App\Models\Admin\Publisher;
    use App\Models\SubCategory;
    use App\Models\Vendor\Book;
    use App\Models\author; 
    use App\Models\category;
    use App\Models\Comment;
    use App\Models\Wishlist;
    use App\Models\Front\Rating;
    use App\Models\Admin\Vendor;
    use App\Models\Admin\Aboutus;
    use App\Models\Admin\Terms;
    use App\Models\Front\Order;
    use App\Models\Front\OrderDetail;
    use App\Models\Admin\Slider;
    use App\Models\Vendor\Video;
    use App\Models\Admin\Event;
    use App\Models\Front\Cookie;
    use App\Models\Admin\logo;
    use App\Models\Admin\StoreInformation;


    $wishlistCount = Wishlist::with('book','user')->count();


    $showCategory = category::with('subCategory')->get();
    if (!empty($showCategory)) {
        $showCategory=$showCategory;
    }else{
        $showCategory='null';
    }
    $information=StoreInformation::first();

    if (!empty($information)) {
        $information=$information;
    }else{
        $information='null';
    }
    $data=['categories'=>$showCategory,'information'=>$information,'wishlistCount'=>$wishlistCount];
    $logo = logo::limit(1)->get();
@endphp
 <!--=================================
    Footer Area
    ===================================== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between  section-padding">
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="brand-footer footer-title">
                            <img src="image/logo--footer.png" alt="">
                        </div>
                        <div class="footer-contact">
                        <p><span class="label">Address:</span><span class="text">@if($data['information']!=null) {{$data['information']->address}} @endif</span></p>
                            <p><span class="label">Phone:</span><span class="text">@if($data['information']!=null) {{$data['information']->phone}} @endif</span></p>
                            <p><span class="label">Email:</span><span class="text">@if($data['information']!=null) {{$data['information']->email}} @endif</span></p>
                        </div>
                    </div>
                </div>
                <!-- <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Information</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="#">Prices drop</a></li>
                            <li><a href="#">New products</a></li>
                            <li><a href="#">Best sales</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Extras</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="#">Delivery</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Stores</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h3>Newsletter Subscribe</h3>
                    </div>
                    <div class="newsletter-form mb--30">
                        <form action="">
                            <input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
                            <button class="btn btn--primary w-100">Subscribe</button>
                        </form>
                    </div>
                    <div class="social-block">
                        <h3 class="title">STAY CONNECTED</h3>
                        <ul class="social-list list-inline">
                            <li class="single-social facebook"><a href="{{route('auth.facebook')}}"><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href="{{route('auth.linkedin')}}"><i class="ion ion-social-linkedin"></i></a></li>
                            <li class="single-social google"><a href="{{route('auth.gmail')}}"><i class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href="#"><i class="ion ion-social-youtube"></i></a></li>
                            {{-- <li class="single-social facebook"><a href="#"><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href="#"><i class="ion ion-social-twitter"></i></a></li>
                            <li class="single-social google"><a href="#"><i
                                        class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href="#"><i class="ion ion-social-youtube"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam
                    vel
                    magna volutpat, posuere eros</p>
                <a href="#" class="payment-block">
                    <img src="{{asset('c-assets/image/icon/payment.png')}}" alt="">
                </a>
                <p class="copyright-text">Copyright © 2020 <a href="#" class="author">Best Dreamers</a>. All Right Reserved.
                    <br>
                    </p>
            </div>
        </div>
    </footer>
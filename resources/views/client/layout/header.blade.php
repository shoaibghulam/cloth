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

<div class="site-header header-4 mb--20 d-none d-lg-block">
            <div class="header-top header-top--style-2">
                <div class="container">
                    <div class="row">
                        
                        <div class="offset-4 col-lg-8 flex-lg-right">
                            <ul class="header-top-list">
                                {{-- <li><a href="javascript:void(0)"><i class="icons-left fas fa-random"></i>My Compare</a> --}}
                                </li>
                                @if(Auth::check()) {{Auth::user()->name}} 

                                <li class="dropdown-trigger language-dropdown"><a href="{{url('/whishlist')}}">
                               
                                <i
                                class="icons-left fas fa-heart abc"></i>
                                <?php
                                $count_wish=0;
                                $whishlistcount = Wishlist::where('user_id',Auth::user()->id)->count();
                                
                                if (!empty($whishlistcount)) {
                                   $count_wish= $whishlistcount;
                                
                                }
                                
                                ?>
                               Whishlist (<span class="count-whishlist">{{$count_wish}}</span>) 

                                </a>
                                @endif
                                </li>
                                @if(Auth::check()) {{Auth::user()->name}} 
                                <li class="dropdown-trigger language-dropdown"><a href="#"><i
                                            class="icons-left fas fa-user"></i>
                                            {{Auth::user()->name}} </a><i class="fas fa-chevron-down dropdown-arrow"></i>
                                    <ul class="dropdown-box">
                                        <li><a href="{{route('myaccount')}}">My Account</a></li>
                                        <li><a href="{{route('logout')}}">Logout</a></li>
                                    </ul>
                                    @endif

                                </li>
                                <li><a href="{{url('/contact')}}"><i class="icons-left fas fa-phone"></i> Contact</a>
                                </li>
                                <li><a href="{{url('/checkout')}}"><i class="icons-left fas fa-share"></i> Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                             <a href="{{url('/')}}" class="site-brand">
                             
                             @foreach($logo as $logos)
                                <img src='{{asset("uploads/admins/logo/".$logos->image)}}' alt="" width="156" height="102">
                             @endforeach
                             
                                <!-- <img src="{{asset('c-assets/image/logo.png')}}" alt="" width="156" height="102"> -->
                            </a>
                            <!--<a href="/"><h2 class="text-success">E-Book Logo</h2></a>-->
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
                                <input type="text" placeholder="Search entire store here" class="web-search">
                                <button class="search-btn">Search</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                        @if(!Auth::check())
                                        <a href="{{url('/login')}}" class="font-weight-bold">Login</a> <br>
                                        <span>or</span><a href="{{url('/login')}}">Register</a>
                                        @endif
                                    </div>
                                    <div class="cart-block">
                                        <?php
                                        $count_books=0;
                                        $total_price=0;
                                        $items = ShoppingCart::all();
                                        if (!empty($items)) {
                                            foreach ($items as $item) {
                                            $count_books++;
                                            $total_price+=$item->price-($item->discount/100)*$item->price;
                                        }
                                        }
                                        ?>
                                        <div class="cart-total">
                                            <span class="text-number cart_qty">
                                            {{$count_books}}
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price cart_total">
                                                {{$total_price}}
                                        
                                            <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>

                                        <div class="cart-dropdown-block abc">
                                        <?php  
										$br=0;
										if($items!=='')
										?>
                                        @foreach($items as $key=> $carts)
                                        @php
                                            $br++;
                                        @endphp
                                        <div class="single-cart-block" id="cartid{{ $carts->__raw_id }}">
                                        <div class="cart-product">
                                        <a href="product-details.html" class="image">
                                        <img src='{{asset("uploads/images/".$carts->image)}}' alt="">
                                        </a>
                                        <div class="content">
                                        <h3 class="title"><a href="product-details.html">{{($carts->name)}} </a>
                                        </h3>
                                        <p class="price"><span class="qty">{{($carts->qty)}} ×</span> {{$carts->price-($carts->discount/100)*$carts->price}}</p>
                                        <button class="cross-btn cartdelete"  data-id="{{$carts->__raw_id}}"><i class="fas fa-times"></i></button>
                                        </div>
                                        </div>
                                        </div>
                                        @if($br==2)
                                        @break
                                        @endif
                                        @endforeach

                                            
                                            <div class=" single-cart-block">
                                            <div class="btn-block">
                                            <a href="{{url('/cart')}}" class="btn">View Cart<i
                                            class="fas fa-chevron-right"></i></a>
                                            <a href="{{url('/checkout')}}" class="btn btn--primary">Check Out <i
                                            class="fas fa-chevron-right"></i></a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom bg-primary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav  primary-nav border">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                    
                                    @if($data['categories'])
                                    @foreach($data['categories'] as $category)
                                        <li class="cat-item has-children">
                                            <a href="#">{{$category->name}}</a>
                                            @if($category->subCategory->count()>0)
                                            <ul class="sub-menu">
                                            @foreach($category->subCategory as $subcategory)
                                            <li><a href="{{route('subcategoriesdetail',['id'=>$subcategory->id])}}">{{$subcategory->name}}</a></li>
                                            @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                        @endif
                                        <!--<li class="cat-item"><a href="#" class="js-expand-hidden-menu">More-->
                                        <!--Categories</a></li>-->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone text-white">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="text">
                                    <p>Free Support 24/7</p>
                                    <p class="font-weight-bold number text-white">+01-202-555-0181</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right main-menu--white  li-last-0">
                                    {{-- <li class="menu-item">
                                        <a href="{{route('authorsprofile')}}">Authors</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('authorsvideo')}}">Videos</a>
                                    </li> --}}
                                    <!-- Shop -->
                                    <li class="menu-item">
                                        <a href="{{url('/shop')}}">Products</a>
                                    </li>
                                    <!-- Blog -->
                                    <li class="menu-item">
                                        <a href="{{route('about')}}">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('termsandcondition')}}">Terms</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{url('/contact')}}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="{{url('/')}}" class="site-brand">
                            @foreach($logo as $logos)

                                <img src='{{asset("uploads/admins/logo/".$logos->image)}}' alt="" width="156" height="102">
                            @endforeach
                            
                            </a>
                            <!--<h2 class="text-success">E-Book Logo</h2>-->
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                        <nav class="category-nav">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                    @if($data['categories'])
                                    @foreach($data['categories'] as $category)
                                        <li class="cat-item has-children">
                                            <a href="#">{{$category->name}}</a>
                                            @if($category->subCategory->count()>0)
                                            <ul class="sub-menu">
                                            @foreach($category->subCategory as $subcategory)
                                                <li><a href="#">{{$subcategory->name}}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                        @endif
                                        <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                                                Categories</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="{{url('/cart')}}" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here" class="search-mobile">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                                <ul class="mobile-menu main-mobile-menu">
                                
                                    <li class="menu-item">
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    {{-- <li class="menu-item">
                                        <a href="{{route('authorsprofile')}}">Authors</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('authorsvideo')}}">Videos</a>
                                    </li> --}}
                                    <!-- Shop -->
                                    <li class="menu-item">
                                        <a href="{{url('/shop')}}">Products</a>
                                    </li>
                                    <!-- Blog -->
                                    <li class="menu-item">
                                        <a href="{{route('about')}}">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('termsandcondition')}}">Terms</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{url('/contact')}}">Contact</a>
                                    </li>
                                </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <nav class="off-canvas-nav">
                        <ul class="mobile-menu menu-block-2">
                            <li class="menu-item-has-children">
                                <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li> <a href="{{url('/cart')}}">USD $</a></li>
                                    <li> <a href="checkout.html">EUR €</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li>Eng</li>
                                    <li>Ban</li>
                                </ul>
                            </li>
                            @if(Auth::check()) {{Auth::user()->name}} 

                            <li class="menu-item-has-children">
                                <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('myaccount')}}">My Account</a></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                </ul>
                                @endif
                            </li>
                        </ul>
                    </nav>
                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="#" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                            <a href="#" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="{{url('/')}}" class="site-brand">
                                <img src="{{asset("uploads/admins/logo/".$logos->image)}}" alt="" width="156" height="102">
                            </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right ">
                                <li class="menu-item">
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    {{-- <li class="menu-item">
                                        <a href="{{route('authorsprofile')}}">Authors</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('authorsvideo')}}">Videos</a>
                                    </li> --}}
                                    <!-- Shop -->
                                    <li class="menu-item">
                                        <a href="{{url('/shop')}}">Products</a>
                                    </li>
                                    <!-- Blog -->
                                    <li class="menu-item">
                                        <a href="{{route('about')}}">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('termsandcondition')}}">Terms</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{url('/contact')}}">Contact</a>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
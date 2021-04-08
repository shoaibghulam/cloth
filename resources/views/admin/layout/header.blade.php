 @php
use App\Models\Admin\Title;
$title1=Title::limit(1)->get();
 @endphp
 
 <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa fa-bars"></i></a></li>

              </ul>
            </div>
            <ul class="nav navbar-nav float-right">
              {{-- <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
              <li class="dropdown dropdown-notification nav-item "><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon fa fa-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a> --}}
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="fa fa-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="fa fa-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="fa fa-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="fa fa-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="fa fa-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{Auth::guard('admin')->user()->name}}</span><span class="user-status">Available</span></div><span><img class="round" src='{{asset("uploads/admins/".Auth::guard("admin")->user()->image)}}' alt="avatar" height="40" width="40"></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{route('admin.profile')}}"><i class="fa fa-pencil"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('admin.change-password')}}"><i class="fa fa-sign-out"></i>Change Password</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav> 
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="">
              <div class="brand-logo">
                {{-- <img src="{{asset('app-assets/images/logo.png')}}" style="height: 29px;width: 42px;margin-top:-25px;"> --}}
               
              </div>
              @foreach ($title1 as $titles)
              <h2 class="brand-text mb-0">{{$titles->title}}</h2></a></li>
              @endforeach
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="fa fa-bars" data-ticon="icon-disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main navmenu" id="main-menu-navigation" data-menu="menu-navigation">
          <!-- <li class="nav-item">
            <a href="orderdetail.php">
              <i class="fa fa-money"></i>
              <span class="menu-title" data-i18n="Order">Orders</span>
            </a>
          </li> -->
          <!--  <li class=" nav-item">
              <a href="#"> 
                <i class="fa fa-file"></i>
                  <span class="menu-title" data-i18n="Reports">Reports</span>
              </a>
                    <ul class="menu-content">
                        <li>
                          <a href="productdetail.php">
                            <i class="fa fa-circle"></i>
                            <span class="menu-item" data-i18n="productdetail">Order Details Report</span></a>
                        </li>
                        <li>
                          <a href="cancelreport.php">
                            <i class="fa fa-circle"></i>
                            <span class="menu-item" data-i18n="Cancelation Reports">Cancelation Reports</span>
                          </a>
                        </li>
                    </ul>
                </li> -->
          
            {{-- <li class="nav-item">
            <a href="{{url('/userlist')}}">
              <i class="fa fa-users"></i>
              <span class="menu-title" data-i18n="Order">User</span>
            </a>
          </li>      --}}
           <li class="nav-item @yield('category-active')">
            <a href="{{route('admin.categorylist')}}">
              <i class="fa fa-file"></i>
              <span class="menu-title" data-i18n="Order">Category</span>
            </a>
          </li>
          <li class="nav-item @yield('sub-category-active')">
            <a href="{{route('admin.subcategorylist')}}">
              <i class="fa fa-file"></i>
              <span class="menu-title" data-i18n="Order">Sub Category</span>
            </a>
          </li>    
          <!-- <li class="nav-item">
            <a href="{{url('/booklist')}}">
              <i class="fa fa-book"></i>
              <span class="menu-title" data-i18n="Order">Books</span>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="{{route('admin.authorlist')}}">
              <i class="fa fa-pencil"></i>
              <span class="menu-title" data-i18n="Order">Author</span>
            </a>
          </li>  -->
          {{-- <li class="nav-item @yield('language-active')">
            <a href="{{route('admin.languages')}}">
              <i class="fa fa-language"></i>
              <span class="menu-title" data-i18n="Order">Language</span>
            </a>
          </li>    --}}
           <!-- <li class="nav-item">
            <a href="{{route('admin.generelist')}}">
              <i class="fa fa-file-text-o"></i>
              <span class="menu-title" data-i18n="Order">Genere</span>
            </a>
          </li>   -->
          {{-- <li class="nav-item @yield('publisher-active')">
            <a href="{{route('admin.publisherlist')}}">
              <i class="fa fa-address-book"></i>
              <span class="menu-title" data-i18n="Order">Publisher</span>
            </a>
          </li> 
          <li class="nav-item @yield('vendor-active')">
            <a href="{{route('admin.vendorlist')}}">
              <i class="fa fa-address-book"></i>
              <span class="menu-title" data-i18n="Order">Vendor</span>
            </a>
          </li> 
          <li class="nav-item @yield('book-active')">
            <a href="{{route('admin.booklist')}}">
              <i class="fa fa-address-book"></i>
              <span class="menu-title" data-i18n="Order">Books</span>
            </a>
          </li>  --}}
           <li class="nav-item @yield('store-info-active')">
            <a href="{{route('admin.storeinformation')}}">
              <i class="fa fa-file-text-o"></i>
              <span class="menu-title" data-i18n="Order">StoreInformation</span>
            </a>
          </li>
          <li class="nav-item @yield('store-title-active')">
            <a href="{{route('admin.title')}}">
              <i class="fa fa-file-text-o"></i>
              <span class="menu-title" data-i18n="Order">StoreTitle</span>
            </a>
          </li>
          <li class="nav-item @yield('store-about-active')">
            <a href="{{route('admin.aboutus-information')}}">
              <i class="fa fa-file-text-o"></i>
              <span class="menu-title" data-i18n="Order">Store AboutUs</span>
            </a>
          </li>
          <li class="nav-item @yield('store-terms-active')">
            <a href="{{route('admin.terms-information')}}">
              <i class="fa fa-file-text-o"></i>
              <span class="menu-title" data-i18n="Order">Store TermsAndConditions</span>
            </a>
          </li>
          <li class="nav-item @yield('store-promotion-active')">
            <a href="{{route('admin.promotion-information')}}">
              <i class="fa fa-file-text-o"></i>
              <span class="menu-title" data-i18n="Order">Store Promotion</span>
            </a>
          </li>
         
          <li class="nav-item @yield('slider-active')">
            <a href="{{route('admin.slider')}}">
              <i class="fa fa-file"></i>
              <span class="menu-title" data-i18n="Order">Slider</span>
            </a>
          </li>
          <li class="nav-item @yield('user-contact-active')">
            <a href="{{route('admin.contact-info')}}">
              <i class="fa fa-file"></i>
              <span class="menu-title" data-i18n="Order">User ContactInfo</span>
            </a>
          </li>
          <li class="nav-item @yield('logo-active')">
            <a href="{{route('admin.logo')}}">
              <i class="fa fa-file"></i>
              <span class="menu-title" data-i18n="Order">Store Logo</span>
            </a>
          </li>
          {{-- <li class="nav-item @yield('event-active')">
            <a href="{{route('admin.event')}}">
              <i class="fa fa-file"></i>
              <span class="menu-title" data-i18n="Order">Event</span>
            </a>
          </li> --}}
           <li class="nav-item">
           <a href="{{route('admin.logout')}}">
              <i class="fa fa-sign-out"></i>
              <span class="menu-title" data-i18n="Order">Log out</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->
   
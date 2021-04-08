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
              <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
              <li class="dropdown dropdown-notification nav-item "><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon fa fa-bell"></i><span class="badge badge-pill badge-primary badge-up total-notifications">0</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white total-notification"> </h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list notifications">
                                  
                                    </li>
                              
                            </ul>
                        </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"></span><span class="user-status">{{Auth::guard('author')->user()->name}}</span></div><span><img class="round" src='{{asset("uploads/authors/".Auth::guard("author")->user()->image)}}' alt="avatar" height="40" width="40"></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href=""><i class="fa fa-pencil"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href=""><i class="fa fa-sign-out"></i>Change Password</a>

                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('author.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
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
              <h2 class="brand-text mb-0">E-Book</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="fa fa-bars" data-ticon="icon-disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
         
          <li class="nav-item">
            <a href="">
              <i class="fa fa-book"></i>
              <span class="menu-title" data-i18n="Order">Author</span>
            </a>
          </li> 
          
           
           <li class="nav-item">
           <a href="{{route('author.logout')}}">
              <i class="fa fa-sign-out"></i>
              <span class="menu-title" data-i18n="Order">Log out</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->
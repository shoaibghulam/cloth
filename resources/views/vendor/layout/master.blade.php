<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>@yield('title')</title>
  <!-- <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html"> -->
  <!-- <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/logo.png"> -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
  <link  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.min.css')}}">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/card-analytics.min.css')}}">
  <!-- END: Page CSS-->
  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/ag-grid/ag-grid.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/ag-grid/ag-theme-material.css')}}">
  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/aggrid.min.css')}}">
  <!-- END: Page CSS-->
  <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/card-analytics.css')}}">
    <!-- END: Page CSS-->

  <!--  -->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
  <!-- END: Custom CSS-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script>
  $('#myselect').change(
    function () {
      $('#myselect').css("background", $("select option:selected").css("background-color"));
    });
  </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <div id="preloader"></div>

  @include('vendor.layout.header')

  <!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
       
        @yield('content')
      
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-close" href="#"><i class="fa fa-close"></i></a><a class="customizer-toggle" href="#">
  <i class="fa fa-cog spin"></i></a><div class="customizer-content p-2">
    <h4 class="text-uppercase mb-0">Theme Customizer</h4>
    <small>Customize & Preview in Real Time</small>
    <hr>
    <!-- Menu Colors Starts -->
    <div id="customizer-theme-colors">
      <h5>Menu Colors</h5>
      <ul class="list-inline unstyled-list">
        <li class="color-box bg-primary selected" data-color="theme-primary"></li>
        <li class="color-box bg-success" data-color="theme-success"></li>
        <li class="color-box bg-info" data-color="theme-info"></li>
        <li class="color-box bg-warning" data-color="theme-warning"></li>
        <li class="color-box bg-dark" data-color="theme-dark"></li>
      </ul>
    </div>
    <!-- Menu Colors Ends -->
    <hr>
    <!-- Theme options starts -->
    <h5 class="mt-1">Theme Layout</h5>
    <div class="theme-layouts">
      <div class="d-flex justify-content-start">
        <div class="mx-50 lidht">
          <fieldset>
            <div class="vs-radio-con vs-radio-primary">
              <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="" checked>
              <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
              </span>
              <span class="">Light</span>
            </div>
          </fieldset>
        </div>
        <div class="mx-50 dark">
          <fieldset>
            <div class="vs-radio-con vs-radio-primary">
              <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="dark-layout">
              <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
              </span>
              <span class="">Dark</span>
            </div>
          </fieldset>
        </div>
        <div class="mx-50 semi-dark">
          <fieldset>
            <div class="vs-radio-con vs-radio-primary">
              <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="semi-dark-layout">
              <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
              </span>
              <span class="">Semi Dark</span>
            </div>
          </fieldset>
        </div>
      </div>
    </div>
    <!-- Theme options starts -->
    <hr>

    <!-- Collapse sidebar switch starts -->
    <div class="collapse-sidebar d-flex justify-content-between">
      <div class="collapse-option-title">
        <h5 class="pt-25 collapse_sidebar">Collapse Sidebar</h5>
        <h5 class="pt-25 collapse_menu d-none">Collapse Menu</h5>
      </div>
      <div class="collapse-option-switch">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
          <label class="custom-control-label" for="collapse-sidebar-switch"></label>
        </div>
      </div>
    </div>
    <!-- Collapse sidebar switch Ends -->
    <hr>

    <!-- Navbar colors starts -->
    <div id="customizer-navbar-colors">
      <h5>Navbar Colors</h5>
      <ul class="list-inline unstyled-list">
        <li class="color-box bg-white border selected" data-navbar-default=""></li>
        <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
        <li class="color-box bg-success" data-navbar-color="bg-success"></li>
        <li class="color-box bg-info" data-navbar-color="bg-info"></li>
        <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
        <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
      </ul>
      <hr>
    </div>
    <!-- Navbar colors starts -->
    <!-- Navbar Type Starts -->
    <div id="navbar-type">
      <h5 class="navbar_type">Navbar Type</h5>
      <h5 class="menu_type d-none">Menu Type</h5>
      <div class="navbar-type d-flex justify-content-start">
        <div class="mx-50">
          <fieldset>
            <div class="vs-radio-con vs-radio-primary">
              <input type="radio" name="navbarType" value="false" id="navbar-hidden">
              <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
              </span>
              <span class="">Hidden</span>
            </div>
          </fieldset>
        </div>
        <div class="mx-50">
          <fieldset>
            <div class="vs-radio-con vs-radio-primary">
              <input type="radio" name="navbarType" value="false" id="navbar-static">
              <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
              </span>
              <span class="">Static</span>
            </div>
          </fieldset>
        </div>
        <div class="mx-50">
          <fieldset>
            <div class="vs-radio-con vs-radio-primary">
              <input type="radio" name="navbarType" value="false" id="navbar-sticky">
              <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
              </span>
              <span class="">Sticky</span>
            </div>
          </fieldset>
        </div>
        <div class="mx-50">
          <fieldset>
            <div class="vs-radio-con vs-radio-primary">
              <input type="radio" name="navbarType" value="false" id="navbar-floating" checked>
              <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
              </span>
              <span class="">Floating</span>
            </div>
          </fieldset>
        </div>
      </div>
      <hr>
    </div>
    <!-- Navbar Type Starts -->

    <!-- Footer Type Starts -->
    <h5>Footer Type</h5>
    <div class="footer-type d-flex justify-content-start">
      <div class="mx-50">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="footerType" value="false" id="footer-hidden">
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Hidden</span>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="footerType" value="false" id="footer-static" checked>
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Static</span>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="footerType" value="false" id="footer-sticky">
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Sticky</span>
          </div>
        </fieldset>
      </div>
    </div>
    <!-- Footer Type Ends -->
    <hr>

    <!-- Hide Scroll To Top Starts-->
    <div class="hide-scroll-to-top d-flex justify-content-between py-25">
      <div class="hide-scroll-title">
        <h5 class="pt-25">Hide Scroll To Top</h5>
      </div>
      <div class="hide-scroll-top-switch">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="hide-scroll-top-switch">
          <label class="custom-control-label" for="hide-scroll-top-switch"></label>
        </div>
      </div>
    </div>
    <!-- Hide Scroll To Top Ends-->
  </div>

</div>
<!-- End: Customizer-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('vendor.layout.footer')


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<!-- END: Page Vendor JS-->
<script src="{{ asset('app-assets/js/scripts/ag-grid/ag-grid.min.js')}}"></script>
<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{ asset('app-assets/js/core/app.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/components.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/customizer.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/footer.min.js')}}"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js')}}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/datatables/datatable.min.js')}}"></script>
<!-- END: Page JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<!-- END: Page Vendor JS-->
 <!-- BEGIN: Dashboard JS-->
    <script src="{{asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

      $(".total-notifications").click(function(){
        
        $.ajax({
          url:"{{route('vendor.read-notification')}}",
          type:"get",
          success:function(res){
            if (typeof res.message!='undefined') {
              $(".total-notifications").empty();
              $(".total-notification").empty();              
            }
          }
        })
      });
      $.ajax({
        url:"{{route('vendor.vendor-notifications')}}",
        type:"get",
        success:function(res){
          data_length=res.notifications.length;
          data=res.notifications;
          unread=0;
        if(data_length>0){
          $(data).each(function(i,val){
            if(val.read_at==null){
              unread++;
            } 
            route="{{route('vendor.order.list')}}";
            $(".notifications").append('<a class="d-flex justify-content-between" href='+route+'><div class="media d-flex align-items-start"><div class="media-left"><i class="fa fa-plus-square font-medium-5 primary"></i></div><div class="media-body"><h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> '+val.message+' From '+val.sender_name+'</small></div><small><time class="media-meta" datetime="2015-06-11T18:29:20+08:00"></time></small></div> </a>')
          })
          $(".total-notifications").html(unread);
          $(".total-notification").html(" New "+ unread);

        }
        }
      })

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var pusher = new Pusher('d7e7e57a6931e6dc484e', {
        cluster: 'ap2'
      });
  
      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        current_id="{{Auth::guard('vendor')->user()->id}}";
        console.log(current_id);
        console.log(data.reciever_id);

        if (current_id==data.reciever_id) {
            $(".notifications").append('<a class="d-flex justify-content-between" href='+route+'><div class="media d-flex align-items-start"><div class="media-left"><i class="fa fa-plus-square font-medium-5 primary"></i></div><div class="media-body"><h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> '+data.message+' From '+data.sender_name+'</small></div><small><time class="media-meta" datetime="2015-06-11T18:29:20+08:00"></time></small></div> </a>')
            check_not= parseInt($(".total-notifications").html());
              check=check_not+1;
              
                    $(".total-notifications").html(check);
                    $(".total-notification").html(" New "+ check);
        }
      });
    </script>

    @yield('scripts')
    <!-- END: Dashboard JS-->
</body>
<!-- END: Body-->
</html>
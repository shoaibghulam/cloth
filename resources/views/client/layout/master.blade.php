<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('c-assets/css/plugins.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('c-assets/css/main.css')}}" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    
    

        <style>
        body {
            overflow-x: hidden;
        }

        .preloader {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background: white;
            z-index: 99999999;
            width: 100%;
            opacity: 0.7;
        }

        #preloader-logo {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        .loading-msg {
            width: 100%;
            font-size: 0.75em;
            color: #555;
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translate(-50%, 50%);
            text-align: center;
        }

        .spinner {
            width: 80px;
            height: 80px;
            border: 2px solid #f3f3f3;
            border-top: 3px solid #2489CE;
            border-radius: 100%;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            animation: spin 1s infinite ease;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        #loading-msg {
            width: 100%;
            position: absolute;
            left: 0;
            bottom: 25px;
            text-align: center;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #333;
            font-size: 0.8em;
        }

        body {
            overflow: hidden;
        }

       

        
    </style>
</head>

<body>

    <div class="preloader">
        <div class="spinner"></div>
        <span id="loading-msg"></span>
    </div>

    <div class="site-wrapper" id="top">
        @include('client.layout.header')
        @yield('content')
        @include('client.layout.footer')
    </div>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('c-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('c-assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('c-assets/js/custom.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
  </script>

    <script>
        $(function(e){
            $(".preloader").hide();
            $("body").css("overflow", "scroll");
            $("body").css("overflow-x", "hidden");
            
            console.log("Hello World")
          });
    </script>

<script>
         $(document).ready(function(){
             //Whishlist
            $('.whishlist').click(function(e){
                id=$(this).data("id");
               

               // alert(id);
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              $.ajax({
                  url: "{{ route('whishlist-process') }}",
                  method: 'post',
                  data: {
                    "_token": "{{ csrf_token() }}",
                    id:id
                  },
                  success: function(result){
                    if (typeof result.success!='undefined') {
                  swal("God Job!", "Whishlist Successfully Added !", "success");
                  whishlist=parseInt($(".count-whishlist").html());
               $(".count-whishlist").html(whishlist++);
                    }    if (typeof result.already!='undefined') {
                  swal("Warning", "Already In Whishlist !", "error");
                 
                    }
                    if (typeof result.error!='undefined'){
                  swal("Login First", "You Must Login First...!", "error");
                  window.location.replace("{{route('login')}}");

                    }

        
                  }

               });
            });

            
            });

</script>

<script>
$(document).ready(function(){
    $('.cart').click(function(e){     
    id=$(this).data("id");
    name=$(this).data("name");
    image=$(this).data("image");
    price=$(this).data("price");
    discount=$(this).data("discount");
                 
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              $.ajax({
                  url: "{{ route('cart-process') }}",
                  method: 'post',
                  data: {
                    "_token": "{{ csrf_token() }}",
                    id:id,name:name,image:image,price:price,discount:discount
                  },
                  success: function(result){
                    if(typeof result.success!='undefined'){
                        total=$(".cart_total").html();
                        total=parseInt(total) + + result.total;
                        $(".cart_total").html(total);

                        total=$(".cart_qty").html();
                        total=parseInt(total);
                        $(".cart_qty").html(total+1);
                        //swal('Book Successfully Added In Cart');
                        swal("Good job!", "Book Successfully Added In Cart!", "success");

                        
                    } 
                    if(typeof result.message!='undefined'){
                       // console.log(result.message);
                       swal("Sorry!", "Already Added In Cart!", "warning");
                        
                    }    
                  }
                  });
               });

            

});
</script>



<script>
$(document).ready(function(){
	$(".cartdelete").click(function(){
        if(confirm('Do You Real Want To Delete This Book Form Cart !'))
        {
        id=$(this).data("id");
    
      //id=$(this).data("id");
        $.ajax({
            url:'cart-delete/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {   
                $('#cartid'+id).remove();
                location.reload();

            }

        });
        }
    
  });
}); 
</script>
<script>
    $(document).ready(function(){
    
        $(".fa-eye").click(function(){
        //alert($('.img1').attr('src'));

        id=$(this).data("id");
      
        $.get('edit-eye/'+id,function(cat){
        
        $('.id').val(cat.id);
        $('.img1').attr('src');  
    
        $('.tag').text(cat.name);
        $('.publishers').text(cat.isbn);
        $('.titles').text(cat.title);
        $('.price1').text(cat.price - (cat.discount/100)*cat.price);
        $('.price2').text(cat.price);
        $('.descp').text(cat.description);
        $('.abc').modal('show');
    
    
    
      });
      });
    });
    </script>
    <script>
        var url      = window.location.href;
        check= url.includes('shop');
        if (check==false) {
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
		append="?"+val+"="+id;

        route="{{route('/')}}";
        route=route+"/shop"+append;
        
        window.location.replace(route);
        
    }) 
        }
        	
    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
@yield('scripts')
</body>
</html>
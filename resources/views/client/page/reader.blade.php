@section('content')
<style>
    #canvas_container {
        width: 800px;
        height: 450px;
        overflow: auto;
    }

   #canvas_container {
    background: #333;
    text-align: center;
    border: solid 3px;
    /*width: 100%;*/
    /*height:50%;*/
   
   }
   .green{
       margin-left:150px;
      
   }
    .site-header.header-4.mb--20.d-none.d-lg-block {
    display: none !important;
}
.sticky-init.fixed-header.common-sticky.sticky-header {
    display: none;
}
.row.justify-content-between.section-padding {
    display: none;
}
footer.site-footer {
    display: none;
}
   /*#pdf_renderer{*/
   /*    width:100%;*/
   /*}*/
/*   viewer-download-controls#downloads {*/
/*    display: none !important;*/
/*}*/

/*cr-icon-button {*/
/*    --cr-icon-button-fill-color: var(--pdf-toolbar-text-color);*/
/*    margin: 0;*/
/*    display: none;*/
/*}*/

#buttons {
    display: none !important;
    
    
}
#toolbar {
    background-color: var(--pdf-toolbar-background-color);
    box-shadow: var(--cr-elevation-2);
    color: var(--pdf-toolbar-text-color);
    display: flex;
    height: 48px;
    padding: 0 16px;
    position: relative;
    display: none !important;
}


</style>
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

@if(session('danger'))
<div class="alert alert-danger">{{session('danger')}}</div>
@endif
<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
							<li class="breadcrumb-item active">Reader</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<div class="page-section inner-page-sec-padding">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
        
        <form action="{{route('cookie/set')}}" method="post">
        @csrf
        
        <input class="form-control page_no" id="current_page" style="width: 89%;" name="pageno" value="{{$page_no}}" placeholder="Enter Page No" type="number"/>
        
        <input type="hidden" name="id" value="{{$id}}">
        <button type="submit" value="Bookmark" class="btn btn--primary"><i class="fas fa-bookmark"></i></button>
        </form>
        
 
          </div>
      </div>
  
  <div class="row">
    <div class="col-lg-2" style="margin-top: 13rem;">
   <button class="btn btn--primary " id="go_previous">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span></button>

    </div>
   
    <div class="col-lg-8">
    <canvas id="pdf_renderer" ></canvas>
    </div>

    <div class="col-lg-2" style="margin-top: 13rem;">
    <button class="btn btn--primary " id="go_next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span></button>
    </div>
  </div>
</div>
</div>


		
		
	
		                              
@endsection
@section('scripts')
<script>
$(document).ready(function(){
  $(".abc").click(function(){
    alert("Text: " + $(".page_no").val());

   //alert();
  });
  //alert("here");
//   var desiredPage = 
//         document.getElementById('current_page').valueAsNumber;
                          
//         if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
//             myState.currentPage = desiredPage;
//             document.getElementById("current_page").value = desiredPage;
//             render();
//         }
});


</script>

<script>
var myState = {
    pdf: null,
    currentPage: document.getElementById('current_page').valueAsNumber,
    zoom: 1
}

pdfjsLib.getDocument("{{asset('/uploads/books/').'/'.$book->book->attachment}}").then((pdf) => {

    myState.pdf = pdf;
    render();

});

function render() {
    myState.pdf.getPage(myState.currentPage).then((page) => {
  
        var canvas = document.getElementById("pdf_renderer");
        var ctx = canvas.getContext('2d');

        var viewport = page.getViewport(myState.zoom);

        canvas.width = viewport.width;
        canvas.height = viewport.height;

        
  
        page.render({
            canvasContext: ctx,
            viewport: viewport
        });
    });
}

document.getElementById('go_previous').addEventListener('click', (e) => {
    if(myState.pdf == null || myState.currentPage == 1) 
      return;
    myState.currentPage -= 1;
    document.getElementById("current_page").value = myState.currentPage;
    render();
});



document.getElementById('go_next').addEventListener('click', (e) => {
   
    if(myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages) 
    @extends('client.layout.master')

@section('title', 'E-Book | Home ')
@section('headname','Dashboard')

       return;
    myState.currentPage += 1;
    document.getElementById("current_page").value = myState.currentPage;
    render();
});

document.getElementById('current_page').addEventListener('keypress', (e) => {
    if(myState.pdf == null) return;
  
    // Get key code
    var code = (e.keyCode ? e.keyCode : e.which);
  
    // If key code matches that of the Enter key
    if(code == 13) {
        var desiredPage = 
        document.getElementById('current_page').valueAsNumber;
                          
        if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
            myState.currentPage = desiredPage;
            document.getElementById("current_page").value = desiredPage;
            render();
        }
    }
});

document.getElementById('zoom_in').addEventListener('click', (e) => {
    if(myState.pdf == null) return;
    myState.zoom += 0.5;
    render();
});

document.getElementById('zoom_out').addEventListener('click', (e) => {
    if(myState.pdf == null) return;
    myState.zoom -= 0.5;
    render();
});

</script>
@endsection
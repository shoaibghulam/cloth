@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('slider-active', 'active')

@section('headname','Dashboard')
@section('content')
<style type="text/css">
  .dt-buttons.btn-group {
    display: none;
}
</style>
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
  @endif
    </div>
  </div>
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Slider</h4>
                   
                    <button class="btn-primary add-new">Add New Slide<i class="fa fa-plus"></i></button>
                </div>
                <div class="card-content">
                  
               
                    <div class="card-body card-dashboard">  
                    <div class="table-responsive">
                      <table class="text-dark table table-striped dataex-html5-selectors">
                          <thead>
                              <tr>
                                <th>Publisher ID</th>
                                <th>Image</th>
                                <th> Heading </th>
                                <th> Subheading </th>
                                <th> Action </th>
                              </tr>
                  </thead>
                  <tbody>
                    @if ($sliders->count()>0)
                    @foreach ($sliders  as $slider )
                  <tr>
               <td>{{ $slider->id }}</td>
                    <td><img src="{{asset('uploads/images/'.$slider->file)}}" alt="" width="50px" height="50px"></td>
                    <td>{{$slider->heading}}</td>
                    <td>{{$slider->subheading}}</td>

                  <td colspan="4" class="center">
                  <button  class="btn btn-sm btn-success edit" data-id="{{$slider->id}}" data-heading="{{$slider->heading}}" data-subheading="{{$slider->subheading}}" data-description="{{$slider->description}}"><i
                  class="fa fa-pencil"></i></button>

                  <button class="btn btn-sm btn-danger delete" data-id="{{$slider->id}}" ><i
                  class="fa fa-trash-o"></i></button>
                  </button>
                  </td>
                  </tr>
                  @endforeach
                
                  </tbody>
                  </table>
                  </div>
                 

                
                   @endif

              
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- Add Category Modal -->
 <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('admin.slider-process')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                        
                      <div class="col-md-3">
                        <label class="text-dark">Heading</label>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                          <input type="hidden"  name="id" value="" class="id" value="{{old('id')}}">
                          <input type="text" class="form-control heading" placeholder="Heading" name="heading"  value="{{old('heading')}}" >
                          <span class="text-danger message">{{$errors->first('heading')}}</span>
                             
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-3">
                        <label class="text-dark">Sub Heading</label>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                          
                          <input type="text" class="form-control subheading" placeholder="Sub Heading" name="subheading"  value="{{old('subheading')}}" >
                          <span class="text-danger message">{{$errors->first('subheading')}}</span>
                             
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-3">
                        <label class="text-dark">Description</label>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                          
                          <input type="text" class="form-control description" placeholder="Desciption" name="description"  value="{{old('description')}}" >
                          <span class="text-danger message">{{$errors->first('description')}}</span>
                             
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-3">
                        <label class="text-dark">Image</label>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                          
                          <input type="file" class="form-control" name="file" >
                          <span class="text-danger">{{$errors->first('file')}}</span>
                             
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-8">
                         <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light float-right">Submit</button>
                         <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light float-right">Reset</button>
                     </div>
                     
                 </div>
                    </form>   
                  </div>
                </div>
              </div>
            </div>

          

@endsection
@section('scripts')
<script>
  check="{{old('error')}}";
  
  if (check!='') {
  $("#exampleModalScrollable").modal("show");
  }
$(".add-slide").click(function(){
    var clone = $('.original').last().clone();
            $(clone).find("input").val("");
           $(clone).find("textarea").val("");
			$('.clone').append(clone);
            $(".btn-danger").show();
})
$(".rem-slide").click(function(){
$(".clone .original").last().remove();
var clone_length = $('.original').length;
if(clone_length<=1){
    $(".btn-danger").hide();
}

})
$(document).on('click',".edit",function(){
  $(".heading").val($(this).data("heading"));
  $(".id").val($(this).data("id"));

  $(".subheading").val($(this).data("subheading"));
  $(".description").val($(this).data("description"));

  $("#exampleModalScrollable").modal("show");
})
$(document).on('click',".add-new",function(){
  $(".message").html("");
  $(".heading").val("");
  $(".id").val("");

  $(".subheading").val("");
  $(".description").val("");

  $("#exampleModalScrollable").modal("show");
});
$(document).on('click',".delete",function(){
  id=$(this).data("id");
  $.ajax({
    url:"{{route('admin.delete-slider')}}",
    type:'post',
    data:{id:id,'_token':"{{csrf_token()}}"},
    success:function(res){
      console.log(res);
    }
  })
});
</script>
@endsection
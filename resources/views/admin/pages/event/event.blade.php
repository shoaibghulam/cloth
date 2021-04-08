@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('event-active', 'active')
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
                    <h4 class="card-title">Event Details</h4>
                   
                    
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Event</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>Event ID</th>
                                      <th>Event Name</th>
                                      <th>Description</th>

                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                       @foreach($event as $eventlist)
                        <tr id="eventid{{ $eventlist->id }}">
                        <td>{{$eventlist->id}}</td>
                        <td>{{$eventlist->eventname}}</td>
                        <td>{{$eventlist->description}}</td>

                        <td colspan="4" class="center">
                        
                        <button  class="btn btn-sm btn-success edit" data-id="{{$eventlist->id}}"><i
                        class="fa fa-pencil"></i></button>

                        <button class="btn btn-sm btn-danger delete" data-id="{{$eventlist->id}}" ><i
                        class="fa fa-trash-o"></i></button>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- Add Category Modal -->
<div class="modal fade abc" id="exampleModalScrollable" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                  <form class="form" action="{{ route('admin.event.process') }}" method="post" enctype="multipart/form-data">
                  @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Image</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           
                                        <input type="hidden"  name="id" class="id" value="">

                                        <input type="file" id="first-name-column" class="form-control" placeholder="" name="image" required value="{{old('image')}}">
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Event Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           
                                        <input type="hidden"  name="id" class="id" value="">

                                        <input type="text" id="first-name-column" class="form-control" placeholder="Event Name" name="eventname" required value="{{old('eventname')}}">
                                        <span class="text-danger">{{$errors->first('eventname')}}</span>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Posted By</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           
                                        <input type="hidden"  name="id" class="id" value="">

                                        <input type="text" id="first-name-column" class="form-control" placeholder="Posted By" name="postby" required value="{{Auth::guard('admin')->user()->name}}" readonly>
                                        <span class="text-danger">{{$errors->first('postby')}}</span>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Description</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           
                                        <input type="hidden"  name="id" class="id" value="">
                                        <textarea type="text" id="first-name-column" class="form-control" placeholder="Description" name="description" required value="{{old('description')}}">{{old('description')}}</textarea>
                                        <!-- <input type="text" id="first-name-column" class="form-control" placeholder="Description" name="description" required value="{{old('description')}}"> -->
                                        <span class="text-danger">{{$errors->first('description')}}</span>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-12 ">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light float-right">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light float-right">Reset</button>
                                    </div>
                                </div>
                            </div>
                        
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Add Category Modal -->



            <!-- Edit Category Modal -->
             <!-- Modal -->
            <div class="modal fade abc" id="exampleModalScrollable1" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                    <br>
                     <form action="{{route('admin.event.update')}}" class="form"  method="post" enctype="multipart/form-data">
                     @csrf
                     
                     <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Image</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           
                                        <input type="hidden" name="id" class="id" value="">

                                        <input type="file" id="first-name-column" class="form-control image" placeholder="" name="edit_image"  value="{{old('edit_image')}}">
                                        <span class="text-danger">{{$errors->first('edit_image')}}</span>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Event Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           

                                        <input type="text" id="first-name-column" class="form-control eventname" placeholder="Event Name" name="edit_eventname" required value="{{old('edit_eventname')}}">
                                        <span class="text-danger">{{$errors->first('edit_eventname')}}</span>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Posted By</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           
                                        

                                        <input type="text" id="first-name-column" class="form-control postby" placeholder="Posted By" name="edit_postby" required value="{{Auth::guard('admin')->user()->name}}" readonly>
                                        <span class="text-danger">{{$errors->first('edit_postby')}}</span>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Description</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           
                                       
                                        <textarea type="text" id="first-name-column" class="form-control desc" placeholder="Description" name="edit_description" required value="{{old('edit_description')}}">{{old('edit_description')}}</textarea>
                                        <!-- <input type="text" id="first-name-column" class="form-control" placeholder="Description" name="description" required value="{{old('description')}}"> -->
                                        <span class="text-danger">{{$errors->first('edit_description')}}</span>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-12 ">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light float-right">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light float-right">Reset</button>
                                    </div>
                                </div>
                            </div>
                        
                  </form>
                        
                  </div>
              </div>
            </div>
            <!-- End Edit Category Modal -->

            <!-- Order Details Modal -->

@endsection
@section('scripts')
<script>

$(document).ready(function(){ 
  check="{{old('eventname')}}";
  check_id="{{old('id')}}";
  if (check!="" && check_id=='') {
    
      $("#exampleModalScrollable").modal("show");
    }
    

    if (check_id!="") {
      $(".id").val(check_id);
      $("#exampleModalScrollable1").modal("show");
    }
  $(document).on("click",".delete",function(){
    if(confirm('Do You Real Want To Delete This Event !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'event-delete/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#eventid'+id).remove();
            }

        })
    }
  })
  $(document).on("click",".edit",function(){
    id=$(this).data("id");
    $.get('event-edit/'+id,function(event){
    $(".message").html("");
    $('.id').val(event.id);
    // $('.image').val(event.image);
    $('.eventname').val(event.eventname);
    $('.desc').val(event.description);
    $(".message").html("");
    $('#exampleModalScrollable1').modal('show');



  });
  })
  
  
});



  




</script>
@endsection

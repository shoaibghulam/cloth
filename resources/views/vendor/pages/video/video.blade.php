@extends('vendor.layout.master')
@section('title', 'E-Book | Video')
@section('headname','Dashboard')
@section('content')
<style type="text/css">
  .dt-buttons.btn-group {
    display: none;
  }
  label.text-white.bg-danger{
    padding: 4px 13px;
  }
  label.text-white.bg-success{
    padding: 5px;
  }
  label.text-white.bg-success{
    padding: 5px 8px;
  }
  label.text-white.bg-warning{
    padding: 5px 9px;
  }
  .abc{
    color: #62ab00!important;
  }
</style>
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Video Listing</h4>
           <button type="button" data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-sm btn-success">
                      <i class="fa fa-plus"></i>
                    </button>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="text-dark table table-striped dataex-html5-selectors" id="listtable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Status</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                @foreach($videolist as $videolisting)
                <tr id="videoid{{ $videolisting->id }}">
                  <td>{{$videolisting->id}}</td>
                  <td><iframe width="200" height="100" src="{{asset("uploads/vendors/".$videolisting->video)}}" frameborder="0"></iframe></td>
                  <td>
                  <label class="bg-success text-white">{{$videolisting->status}}</label>
                  </td>
                  <td colspan="4" class="center">
                    <button type="button" data-toggle="modal" data-target="#exampleModalScrollable1" class="btn btn-sm btn-success edit" data-id="{{$videolisting->id}}">
                      <i class="fa fa-pencil"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-danger delete" data-id="{{$videolisting->id}}">
                      <i class="fa fa-trash-o"></i>
                    </button>
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
</section>
<!-- Order Details Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalScrollableTitle">Add Video</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <br>
      <form class="form" action="{{route('vendor.video-process')}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-body">
          <div class="row">
            <div class="col-md-3">
              <label class="text-dark"> Upload Video </label>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input type="file" name="video" required value="{{old('video')}}">
                <span class="text-danger">{{$errors->first('video')}}</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label class="text-dark"> Status </label>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input type="hidden" value="id" name="">
                <select class="form-control" name="status" required>
                  <option value="NaN">Select Status</option>
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                  
                </select>
                <span class="text-danger">{{$errors->first('status')}}</span>

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
<!-- Order Details Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Video</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <br>
       <form class="form" action="{{route('vendor.video.update')}}" method="post">
        @csrf
        <div class="form-body">
          <div class="row">
            <div class="col-md-3">
              <label class="text-dark"> Upload Video </label>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input type="hidden"  name="id" class="id" value="">
                <input type="file" class="edit_video" name="video">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label class="text-dark"> Status </label>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input type="hidden" value="id" name="">
                <select class="form-control edit_status" name="edit_status">
                  <option value="">Select Status</option>
                  <option value="1" >Enable</option>
                  <option value="0" >Disable</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-12 ">
            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light float-right">Submit</button>
            <!-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light float-right">Reset</button> -->
          </div>
        </div>
      	</div>

      </form>

  </div>
</div>
</div>
</div>
<!-- Order Details Modal -->
@endsection

@section('scripts')
<script>
$(document).ready(function(){
  check="{{old('video')}}";

check_id="{{old('id')}}";
if (check!="" && check_id=='') {
  $("#exampleModalScrollable").modal("show");
}


if (check_id!="") {
  $(".id").val(check_id);
  $("#exampleModalScrollable1").modal("show");
}
});

$(document).on("click",".delete",function(){
    if(confirm('Do You Real Want To Delete This Video !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'video/delete/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#videoid'+id).remove();
            }

        })
    }
  })

  $(document).on("click",".edit",function(){
    id=$(this).data("id");
    $.get('video/edit/'+id,function(videoss){
    // console.log(cat);
    $('.id').val(videoss.id);
    $('.edit_video').val(videoss.video);
    $('.edit_status').val(videoss.status);
    $(".edit-message").html("");
    $('#exampleModalScrollable1').modal('show');
  });
  })
</script>

@endsection

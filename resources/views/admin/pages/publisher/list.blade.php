@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('publisher-active', 'active')

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
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Publisher Details</h4>
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Publisher</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>Publisher ID</th>
                                      <th> Name </th>
                                      <th> Company </th>
                                      <th> Action </th>
                                    </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $publisher)
                        <tr id="pubid{{ $publisher->id }}">
                        <td>{{$publisher->id}}</td>
                        <td>{{$publisher->name}}</td>
                        <td>{{$publisher->company}}</td>
                        <td colspan="4" class="center">
                        <button  class="btn btn-sm btn-success edit" data-id="{{$publisher->id}}"><i
                        class="fa fa-pencil"></i></button>

                        <button class="btn btn-sm btn-danger delete" data-id="{{$publisher->id}}" ><i
                        class="fa fa-trash-o"></i></button>
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
    </div>
</section>
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Publisher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                 <form action="{{route('admin.create-publisher-process')}}" class="form"  method="post">
                 @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark"> Publisher Name </label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            
                                        <input type="text"  class="form-control" placeholder="Publisher Name" name="publishername" required value="{{old('publishername')}}">
                                            @error('publishername')
                                            <span class="control-label " style="color:red;">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark"> Company </label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text"  class="form-control" placeholder="Company Name" name="companyname" required value="{{old('companyname')}}">
                                        @error('companyname')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror 

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
            <div class="modal fade abc" id="exampleModalScrollable1" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Publisher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                    <br>
                     <form action="{{route('admin.update-publisher-process')}}" class="form"  method="post">
                     @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Publisher Name </label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="hidden"  name="id" class="id" value="">
                                        <input type="text" class="form-control publisher" placeholder="Publisher Name" name="publishername_edit" value="{{old('publishername_edit')}}" required>
                                        @error('publishername_edit')
                                        <span class="control-label message" style="color:red;">{{ $message }}</span>
                                        @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark"> Company </label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text"  class="form-control company" placeholder="Company Name" name="companyname_edit" value="{{old('companyname_edit')}}" required>
                                        @error('companyname_edit')
                                        <span class="control-label message" style="color:red;">{{ $message }}</span>
                                        @enderror 

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
            <!-- Order Details Modal -->
            <script>
$(document).ready(function(){
   check="{{old('companyname')}}";
    check_id="{{old('id')}}";
    

    if (check!="" && check_id=='') {
      $("#exampleModalScrollable").modal("show");
    }
    

    if (check_id!="") {
      $(".id").val(check_id);
      $("#exampleModalScrollable1").modal("show");
    }
  $(document).on("click",".delete",function(){
    if(confirm('Do You Real Want To Delete This Publisher !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'delete-publisher/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#pubid'+id).remove();
            }

        })
    }
  })
  $(document).on("click",".edit",function(){
    id=$(this).data("id");
    $.get('edit-publisher/'+id,function(pub){
    // console.log(cat);
    $(".message").html("");
    $('.id').val(pub.id);
    $('.publisher').val(pub.name);
    $('.company').val(pub.company);
    $('.abc').modal('show');



  });
  })
  
  
});



  




</script>
@endsection

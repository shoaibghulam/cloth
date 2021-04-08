@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
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
                    <h4 class="card-title">Author Details</h4>
                   
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Author</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>Author ID</th>
                                      <th>First Name </th>
                                      <th>Last Name </th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach($data as $author)
                        <tr id="authid{{ $author->id }}">
                        <td>{{$author->id}}</td>
                        <td>{{$author->firstName}}</td>  
                        <td>{{$author->lastName}}</td>     
   
                        <td colspan="4" class="center">
                        <button  class="btn btn-sm btn-success edit" data-id="{{$author->id}}"><i
                        class="fa fa-pencil"></i></button>

                        <button class="btn btn-sm btn-danger delete" data-id="{{$author->id}}" ><i
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
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Author</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                 <form class="form" action="{{ route('admin.create-author-process') }}" method="post">
                 @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">First Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Author First Name" name="firstname" >
                                            @error('firstname')
                                            <span class="control-label" style="color:red;">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Last Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Author Last Name" name="lastname" >
                                            @error('lastname')
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Author</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                    <br>
                     <form action="{{route('admin.update-author-process')}}" class="form"  method="post" >
                     @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">First Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="hidden"  name="id" class="id" value="">
                                        <input type="text"  class="form-control first_name" placeholder="Author First Name" name="fname" id="fname" required>
                                        @error('fname')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror 
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Last Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text"  class="form-control last_name" placeholder="Author Last Name" name="lname" id="lname" required>
                                            @error('lname')
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
            <!-- Order Details Modal -->
<script>
$(document).ready(function(){
  check1="{{('firstname,lastname')}}";
  //check_id1="{{('id')}}";


  if (check1!="") {
      $("#exampleModalScrollable").modal("show");
    }
  $(".delete").click(function(){
    if(confirm('Do You Real Want To Delete This Author !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'delete-author/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#authid'+id).remove();
            }

        })
    }
  })
  $(".edit").click(function(){
    id=$(this).data("id");
    $.get('edit-author/'+id,function(author){
    // console.log(cat);
    $('.id').val(author.id);
    $('.first_name').val(author.firstName);
    $('.last_name').val(author.lastName);
    $('.abc').modal('show');



  });
  })
  
  
});



  




</script>
@endsection

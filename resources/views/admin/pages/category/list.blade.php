@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('category-active', 'active')
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
                    <h4 class="card-title">Category Details</h4>
                   
                    
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Category</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>Category ID</th>
                                      <th>Category Name </th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach($data as $category)
                        <tr id="catid{{ $category->id }}">
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td colspan="4" class="center">
                        <!-- <button type="button" data-toggle="modal" data-target="#exampleModalScrollable1" class="btn btn-sm btn-success">
                        <i class="fa fa-pencil"></i>
                        </button> -->
                         
                        <!-- <button type="button" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash-o"></i>
                        </button> -->
                        <button  class="btn btn-sm btn-success edit" data-id="{{$category->id}}"><i
                        class="fa fa-pencil"></i></button>

                        <button class="btn btn-sm btn-danger delete" data-id="{{$category->id}}" ><i
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                  <form class="form" action="{{ route('admin.create-category-process') }}" method="post">
                  @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Category Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <!-- <input type="hidden" value="id" name=""> -->
                                            <input type="hidden"  name="id" class="id" value="">

                                        <input type="text" id="first-name-column" class="form-control" placeholder="Category Name" name="category" required value="{{old('category')}}">
                                        <span class="text-danger">{{$errors->first('category')}}</span>
                                           
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                    <br>
                     <form action="{{route('admin.update-category-process')}}" class="form"  method="post" >
                     @csrf
                     
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Category Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="hidden"  name="id" class="id" value="">
                                        <input type="text"  class="form-control category"  placeholder="Category Name" name="category_edit" id="category"  value="{{old('category')}}" required="">
                                        <span class="text-danger message">{{$errors->first('category_edit')}}</span>
                                          
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
  check="{{old('category')}}";
  check_id="{{old('id')}}";
  if (check!="" && check_id=='') {
    
      $("#exampleModalScrollable").modal("show");
    }
    

    if (check_id!="") {
      $(".id").val(check_id);
      $("#exampleModalScrollable1").modal("show");
    }
  $(document).on("click",".delete",function(){
    if(confirm('Do You Real Want To Delete This Category !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'delete-category/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#catid'+id).remove();
            }

        })
    }
  })
  $(document).on("click",".edit",function(){
    id=$(this).data("id");
    $.get('edit-category/'+id,function(cat){
    $(".message").html("");
    $('.id').val(cat.id);
    $('.category').val(cat.name);
    $(".message").html("");
    $('#exampleModalScrollable1').modal('show');



  });
  })
  
  
});



  




</script>
@endsection

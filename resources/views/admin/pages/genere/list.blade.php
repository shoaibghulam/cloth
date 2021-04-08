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
                    <h4 class="card-title">Genere Details</h4>
                    
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Genere</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>Genere ID</th>
                                      <th> Name </th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach($data as $genre)
                        <tr id="genid{{ $genre->id }}">
                        <td>{{$genre->id}}</td>
                        <td>{{$genre->name}}</td>
                        <td colspan="4" class="center">

                        <button  class="btn btn-sm btn-success edit" data-id="{{$genre->id}}"><i
                        class="fa fa-pencil"></i></button>

                        <button class="btn btn-sm btn-danger delete" data-id="{{$genre->id}}" ><i
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Genere</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                 <form class="form" action="{{ route('admin.create-genre-process') }}" method="post">
                 @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark"> Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text" id="first-name-column" class="form-control" placeholder="Genere Name" name="generename" value="{{old('generename')}}" required>
                                            <span class="text-danger">{{$errors->first('generename')}}</span>

                                          
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Genere</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                    <br>
                     <form action="{{route('admin.update-genre-process')}}" class="form"  method="post">
                     @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark"> Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="hidden"  name="id" class="id" value="">
                                        <input type="text" class="form-control generename" placeholder="Genere Name" name="generename_edit" id="generename"  value="{{old('generename_edit')}}">
                                            <span class="text-danger message">{{$errors->first('generename_edit')}}</span>
                                        
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

  
  check="{{old('generename')}}";
    check_id="{{old('id')}}";
  if (check!="" && check_id=='') {
      $("#exampleModalScrollable").modal("show");
    }
    

    if (check_id!="") {
      $(".id").val(check_id);
      $("#exampleModalScrollable1").modal("show");
    }
  $(document).on("click",".delete",function(){
    if(confirm('Do You Real Want To Delete This Genre !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'delete-genre/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#genid'+id).remove();
            }

        })
    }
  })
  $(document).on("click",".edit",function(){
    id=$(this).data("id");
    $.get('edit-genre/'+id,function(gen){
    $(".message").html("");
    $('.id').val(gen.id);
    $('.generename').val(gen.name);
    $('.abc').modal('show');



  });
  })
  
  
});



  




</script>

@endsection

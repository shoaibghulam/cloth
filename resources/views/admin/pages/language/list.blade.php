@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('language-active', 'active')

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
               
                    <h4 class="card-title">Language Details</h4>
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Language</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>Language ID</th>
                                      <th> Name </th>
                                      <th> Code </th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if (!empty($languages['languages']))
                                  @foreach ($languages['languages'] as $language)
                                      
                                  <tr>
                                  <td>{{$language->id}}</td>
                                  <td>{{$language->name}}</td>
                                  <td>{{$language->language_code}}</td>

                        
                                    <td colspan="4" class="center">
                                    <button type="button"  class="btn btn-sm btn-success edit" data-id="{{$language->id}}">
                                        <i class="fa fa-pencil"></i>
                                      </button>
                                     
                                       <button type="button" class="btn btn-sm btn-danger delete" data-id="{{$language->id}}">
                                        <i class="fa fa-trash-o"></i>
                                      </button>
                                    </td>
                                  </tr>
                                  @endforeach
                                  
                                  @endif
                               
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                  <form class="form" method="POST" action="{{route('admin.addlanguage')}}">
                    
                    @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark"> Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Language Name" name="name" value="{{old('name')}}" required>
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Code</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text" id="first-name-column" class="form-control" placeholder="For Example:en" name="language_code" value="{{old('language_code')}}" required>
                                        <span class="text-danger">{{$errors->first('language_code')}}</span>

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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Update Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                    <br>
                    <form class="form" method="POST" action="{{route('admin.updatelanguage')}}">
                     
                      @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark"> Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" class="id" name="id" value="">
                                        <input type="text" id="first-name-column" class="form-control name" placeholder="Language Name" name="name_edit" value="{{old('name_edit')}}" required>
                                            <span class="text-danger edit-message">{{$errors->first('name')}}</span>
                                        
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Code</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text" id="first-name-column" class="form-control language_code" placeholder="Language Code" name="language_code_edit" value="{{old('language_code_edit')}}" required>
                                            <span class="text-danger edit-message">{{$errors->first('language_code_edit')}}</span>
                                        
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
@endsection
@section('scripts')
<script>
  $(document).ready(function(){

    
    check="{{old('name')}}";
    check_id="{{old('id')}}";
    

    if (check!="" && check_id=='') {
      $("#exampleModalScrollable").modal("show");
    }
    

    if (check_id!="") {
      $(".id").val(check_id);
      $("#exampleModalScrollable1").modal("show");
    }
    $(document).on("click","button.edit",function(){
      id=$(this).data("id");
      $.ajax({
        headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
        url:"{{route('admin.editlanguage')}}",
        type:"post",
        data:{id:id},
        success:function(res){
         $(".edit-message").html("");

          $(".name").val(res.name);
          $(".language_code").val(res.language_code);
          $(".id").val(res.id);
      $("#exampleModalScrollable1").modal("show");


        }
      })
    })

    $(document).on("click","button.delete",function(){
      
      id=$(this).data("id");
      $.ajax({
        headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
        url:"{{route('admin.deletelanguage')}}",
        type:"post",
        data:{id:id},
        success:function(res){
          console.log(res);
          location.reload();
        }
      })
    })
  })
</script>
@endsection

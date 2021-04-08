@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('sub-category-active', 'active')
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
                    <h4 class="card-title">Sub Category Details</h4>
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Sub Category</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>Sub Category ID</th>
                                      <th>Category Name</th>

                                      <th>Sub Category Name </th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach($subcategories as $subcat)
                        <tr id="subcatid{{ $subcat->id }}">
                        <td>{{$subcat->id}}</td>
                        <td>{{$subcat->categoryy->name}}</td>

                        <td>{{$subcat->name}}</td>
                        <td colspan="4" class="center">
                        <button  class="btn btn-sm btn-success edit" data-id="{{$subcat->id}}"><i
                        class="fa fa-pencil"></i></button>

                        <button class="btn btn-sm btn-danger delete" data-id="{{$subcat->id}}" ><i
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

 <!-- Add Sub Category Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Sub Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                 <form class="form"action="{{route('admin.create-subcat-process')}}" method="post">
                  @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Select Category</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" >
                                            <select class="form-control" name="category"  required>
                                            <option disabled selected value="">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if(!empty(old('category')) && old('category')==$category->id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                            </select>
                                            <span class="text-danger">{{$errors->first('category')}}</span>

                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Sub Category</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text" id="first-name-column" class="form-control" placeholder="Sub Category" name="sub_cat" required value="{{old('sub_cat')}}" >
                                            <span class="text-danger">{{$errors->first('sub_cat')}}</span>

                                           
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
            <!-- End Add Sub Category Modal -->



            <!-- Edit Sub Category Modal -->
             <!-- Modal -->
            <div class="modal fade abc" id="exampleModalScrollable1" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Sub Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                    <br>
                     <form action="{{route('admin.update-subcat-process')}}" class="form"  method="post">
                     @csrf
                     
                            <div class="form-body">
                            <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Select Category</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                            <select class="form-control category" name="category_edit" required >
                                            <option disabled selected value="">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if(!empty(old('category_edit')) && old('category_edit')==$category->id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                            </select>
                                            <span class="text-danger edit-message">{{$errors->first('edit_category')}}</span>

                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                
                                    <div class="col-md-3">
                                      <label class="text-dark">Sub Category Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    
                                        <div class="form-group">
                                        <input type="hidden"  name="id" class="id" value="">
                                        <input type="text"  class="form-control sub_cat"  placeholder="Sub Category Name" name="sub_cat_edit" id="category" required value="{{old('sub_cat_edit')}}">
                                        <span class="text-danger edit-message">{{$errors->first('sub_cat_edit')}}</span>


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
            <!-- start webpushr code -->
            {{-- <script>
              (function(w,d, s, id) {if(typeof(w.webpushr)!=='undefined') return;w.webpushr=w.webpushr||function(){(w.webpushr.q=w.webpushr.q||[]).push(arguments)};var js, fjs = d.getElementsByTagName(s)[0];js = d.createElement(s); js.id = id;js.async=1;js.src = "https://cdn.webpushr.com/app.min.js";fjs.parentNode.appendChild(js);}(window,document, 'script', 'webpushr-jssdk'));webpushr('setup',{'key':'BJeUtq1c_f0uIHlOIMtICojubo-5uEybQA5KLvj-iUQFrDXA0aSQDHpdcmm6Rm-a3nIpaj_kaMTZ4wbBl1PCzhA' ,'integration':'popup' });
              webpushr('attributes',{"E-mail" : "harisahmedshaikh12@gmail.com"});
              </script> --}}
           <!-- end webpushr code -->
            <script>
$(document).ready(function(){
  check="{{old('sub_cat')}}";

    check_id="{{old('id')}}";
  if (check!="" && check_id=='') {
      $("#exampleModalScrollable").modal("show");
    }
    

    if (check_id!="") {
      $(".id").val(check_id);
      $("#exampleModalScrollable1").modal("show");
    }

  $(document).on("click",".delete",function(){
    if(confirm('Do You Real Want To Delete This Sub Category !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'delete-subcat/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#subcatid'+id).remove();
            }

        })
    }
  })
  $(document).on("click",".edit",function(){
    id=$(this).data("id");
    $.get('edit-subcat/'+id,function(subCat){
    // console.log(cat);
    $('.id').val(subCat.id);
    $('.category').val(subCat.category_id);
    $('.sub_cat').val(subCat.name);
    $(".edit-message").html("");
    $('#exampleModalScrollable1').modal('show');
  });
  })
  
  
});



  




</script>


@endsection

@extends('vendor.layout.master')
@section('title', 'E-Book | Book')
@section('headname','Book')
@section('content')
<style type="text/css">
  .dt-buttons.btn-group {
    display: none;
}
</style>

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Book Details</h4>
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Book</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Book Name </th>
                                      <th>Category</th>
                                    
                                    {{-- <th>Language</th> --}}
                                    
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @if ($books->count()>0)
                                 @foreach ($books as $book)
                                     
                                 <tr>
                                 <td>{{$book->id}}</td>
                                 <td>{{$book->name}}</td>
                                 <td>{{$book->subcategory->name}}</td>
                                
                                 {{-- <td>{{$book->language->name}}</td> --}}
                                
                                  <td colspan="4" class="center">
                                  <button type="button"  class="btn btn-sm btn-success edit" data-id="{{$book->id}}">
                                      <i class="fa fa-pencil"></i>
                                    </button>
                                   
                                  <a href="{{route('vendor.book.delete',['id'=>$book->id])}}" class="btn btn-sm btn-danger">
                                      <i class="fa fa-trash-o"></i>
                                  </a>
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
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br>
      <form class="form" action="{{route('vendor.add-book')}}" enctype="multipart/form-data" method="POST">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                         
                          @csrf
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                
                              
                               
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                      <div class="col-md-3">
                      <label class="text-dark">Publisher</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <select class="form-control" name="publisher" required>
                                  <option value="">Select Publisher</option>
                                  @if ($publishers->count()>0)
                                  @foreach ($publishers as $publisher)
                                  <option value="{{$publisher->id}}">{{$publisher->company}}</option>
                                  <option value="{{ $publisher->id }}" @if(!empty(old('publisher')) && old('publisher')==$publisher->id) selected @endif>{{ $publisher->company }}</option>

                                      
                                  @endforeach
                                  
                                  @endif
                                </select>
                                <span class="text-danger"> {{$errors->first('publisher')}}</span>

                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Language</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <select class="form-control" name="language" required>
                                  <option value="">Select Language</option>
                                  @if ($languages->count()>0)
                                  @foreach ($languages as $language)
                                  <option value="{{$language->id}}">{{$language->name}} ({{$language->language_code}})</option>
                    <option value="{{ $language->id }}" @if(!empty(old('language')) && old('language')==$language->id) selected @endif>{{ $language->name }} ({{$language->language_code}})</option>

                                      
                                  @endforeach
                                  
                                  @endif
                                </select>
                                <span class="text-danger"> {{$errors->first('language')}}</span>

                            </div>
                        </div>
                    </div> --}}
                
                    

                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Category</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <select class="form-control category" name="category" required>
                                  <option value="">Select Category</option>
                                  @if ($categories->count()>0)
                                  @foreach ($categories as $category)
                                <!--<option value="{{$category->id}}">{{$category->name}} </option>-->
                        <option value="{{ $category->id }}" @if(!empty(old('category')) && old('category')==$category->id) selected @endif>{{ $category->name }}</option>

                                      
                                  @endforeach
                                  
                                  @endif
                                </select>
                                <span class="text-danger"> {{$errors->first('category')}}</span>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">SubCategory</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <select class="form-control subcategory" name="subcategory" required>
                                  
                                      
                                  
                                </select>
                                <span class="text-danger"> {{$errors->first('subcategory')}}</span>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">ISBN Number</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter ISBN Number" name="isbn" required  value="{{old('isbn')}}">
                               <span class="text-danger"> {{$errors->first('isbn')}}</span>
                            
                              </div>
                        </div>
                    </div> --}}
                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Price $</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <input type="text" class="form-control" placeholder="Enter Price" name="price" required value="{{old('price')}}">
                               <span class="text-danger"> {{$errors->first('price')}}</span>
                            
                              </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Discount Rate %</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <input type="number" class="form-control" placeholder="Enter Discount Amount" name="discount"  value="{{old('discount')}}">
                               <span class="text-danger"> {{$errors->first('discount')}}</span>
                            
                              </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Title</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <input type="text" class="form-control" placeholder="Enter Title" name="title" required value="{{old('title')}}">
                               <span class="text-danger"> {{$errors->first('title')}}</span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Name</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <input type="text" class="form-control" placeholder="Enter Name" name="name" required value="{{old('name')}}">
                               <span class="text-danger"> {{$errors->first('name')}}</span>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Published Date</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                               <input type="date" class="form-control"name="published_date" required value="{{old('published_date')}}">
                               <span class="text-danger"> {{$errors->first('published_date')}}</span>

                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Cover Image</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <input type="file" class="form-control" name="cover_image" required value="{{old('cover_image')}}" accept="image/*">
                                <span class="text-danger"> {{$errors->first('cover_image')}}</span>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Attachment</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <input type="file" class="form-control" name="attachment" required value="{{old('attachment')}}"  accept="application/pdf">
                                <span class="text-danger"> {{$errors->first('attachment')}}</span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Demo Pages</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="demo_pages" required value="{{old('demo_pages')}}">
                                <span class="text-danger"> {{$errors->first('demo_pages')}}</span>
                
                              </div>
                        </div>
                    </div> --}}
                    <!-- <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Max:Stock</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="max_stock" required value="{{old('max_stock')}}">
                                <span class="text-danger"> {{$errors->first('max_stock')}}</span>
                
                              </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Minimum:Stock</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="min_stock" required value="{{old('min_stock')}}">
                                <span class="text-danger"> {{$errors->first('min_stock')}}</span>
                
                              </div>
                        </div>
                    </div> -->
                    <div class="row">
                      <div class="col-md-3">
                          <label class="text-dark">Description</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <textarea class="form-control" name="description" required>{{old('description')}}</textarea>
                                <span class="text-danger"> {{$errors->first('description')}}</span>

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
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
        <br>
        <form class="form" action="{{route('vendor.book.update')}}" enctype="multipart/form-data" method="POST" class="edit">
          <div class="form-body">
              <div class="row">
                  <div class="col-md-3">
                    @csrf
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          
                         
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Publisher</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                         <select class="form-control e_publisher" name="e_publisher" required>
                            <option value="">Select Publisher</option>
                            @if ($publishers->count()>0)
                            @foreach ($publishers as $publisher)
                          <option value="{{$publisher->id}}" @if(!empty(old('publisher')) && old('publisher')==$publisher->id) selected @endif>{{$publisher->company}}</option>
                                
                            @endforeach
                            
                            @endif
                          </select>
                          <span class="text-danger"> {{$errors->first('e_publisher')}}</span>

                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Language</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                         <select class="form-control e_language" name="e_language" required>
                            <option value="">Select Language</option>
                            @if ($languages->count()>0)
                            @foreach ($languages as $language)
                          <option value="{{$language->id}}" @if(!empty(old('e_language')) && old('e_language')==$language->id) selected @endif>{{$language->name}} ({{$language->language_code}})</option>
                                
                            @endforeach
                            
                            @endif
                          </select>
                          <span class="text-danger"> {{$errors->first('e_language')}}</span>

                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">SubCategory</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                         <select class="form-control e_subcategory" name="e_subcategory" required>
                            <option value="">Select SubCategory</option>
                            @if ($subcategories->count()>0)
                            @foreach ($subcategories as $subcategorie)
                          <option value="{{$subcategorie->id}}" @if(!empty(old('e_subcategory')) && old('e_subcategory')==$subcategorie->id) selected @endif >{{$subcategorie->name}} </option>
                                
                            @endforeach
                            
                            @endif
                          </select>
                          <span class="text-danger"> {{$errors->first('e_subcategory')}}</span>

                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">ISBN Number</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                      <input type="text" class="form-control e_isbn" placeholder="Enter ISBN Number" name="e_isbn" required  value="{{old('e_isbn')}}">
                         <span class="text-danger"> {{$errors->first('e_isbn')}}</span>
                      
                        </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Price</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                         <input type="text" class="form-control e_price" placeholder="Enter Price" name="e_price" required value="{{old('e_price')}}">
                         <span class="text-danger"> {{$errors->first('e_price')}}</span>
                      
                        </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Discount Rate</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                         <input type="number" class="form-control e_discount" placeholder="Enter Discount Amount" name="e_discount"  value="{{old('e_discount')}}">
                         <span class="text-danger"> {{$errors->first('e_discount')}}</span>
                      
                        </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Book Title</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                        <input type="hidden" value="" class="id" name="id">
                         <input type="text" class="form-control e_title" placeholder="Enter Book Title" name="e_title" required value="{{old('e_title')}}">
                         <span class="text-danger"> {{$errors->first('e_title')}}</span>

                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Book Name</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                         <input type="text" class="form-control e_name" placeholder="Enter Book Name" name="e_name" required value="hi">
                         <span class="text-danger"> {{$errors->first('e_name')}}</span>

                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Published Date</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                         <input type="date" class="form-control e_published_date" name="e_published_date" required value="{{old('e_published_date')}}">
                         <span class="text-danger"> {{$errors->first('e_published_date')}}</span>

                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Cover Image</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          <input type="file" class="form-control" name="e_cover_image"  value="{{old('e_cover_image')}}">
                          <span class="text-danger"> {{$errors->first('e_cover_image')}}</span>

                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Attachment</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          <input type="file" class="form-control" name="e_attachment"  value="{{old('e_attachment')}}" accept="application/pdf">
                          <span class="text-danger"> {{$errors->first('e_attachment')}}</span>

                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Demo Pages</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          <input type="number" class="form-control e_demo_pages" name="e_demo_pages" required value="{{old('e_demo_pages')}}">
                          <span class="text-danger"> {{$errors->first('e_demo_pages')}}</span>
          
                        </div>
                  </div>
              </div>
              <!-- <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Max:Stock</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          <input type="number" class="form-control e_max_stock" name="e_max_stock" required value="{{old('e_max_stock')}}">
                          <span class="text-danger"> {{$errors->first('e_max_stock')}}</span>
          
                        </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Minimum:Stock</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          <input type="number" class="form-control e_min_stock" name="e_min_stock" required value="{{old('e_min_stock')}}">
                          <span class="text-danger"> {{$errors->first('e_min_stock')}}</span>
          
                        </div>
                  </div>
              </div> -->
              <div class="row">
                <div class="col-md-3">
                    <label class="text-dark">Description</label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          <textarea class="form-control e_description" name="e_description" required>{{old('e_description')}}</textarea>
                          <span class="text-danger"> {{$errors->first('e_description')}}</span>

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
    // check_name="{{old('name')}}";
    
    // if (check_name!="") {
    //   $("#exampleModalScrollable").modal("show");
    // }
    $(".edit").click(function(){
      id=$(this).data("id");
      $.ajax({
        url:"{{route('vendor.book.edit')}}",
        data:{id:id,"_token":"{{csrf_token()}}"},
        type:"post",
        success:function(res){
          data=res.book;
          $(".e_author option").each(function(i,val){
            if($(val).val()){
              $(val).attr("selected",true);
            }
          })
          $(".e_publisher option").each(function(i,val){
            if($(val).val()){
              $(val).attr("selected",true);
            }
          })
          $(".e_language option").each(function(i,val){
            if($(val).val()){
              $(val).attr("selected",true);
            }
          })
          $(".e_subcategory option").each(function(i,val){
            if($(val).val()){
              $(val).attr("selected",true);
            }
          })  
          $(".e_isbn").val(data.isbn);
          $(".e_name").val(data.name);
          $(".e_title").val(data.title);
          $(".e_price").val(data.price);
          $(".e_discount").val(data.discount);
          $(".e_description").val(data.description);
          
          $(".e_demo_pages").val(data.demo_pages);
          $(".e_published_date").val(data.published_date);
          $(".id").val(data.id);


      $("#exampleModalScrollable1").modal("show");

        }
      });
    });
    $(".category").change(function(){
      id=$(this).val();
      $.ajax({
        url:"{{route('vendor.change-subcategory')}}",
        data:{id:id,"_token":"{{csrf_token()}}"},
        type:"post",
        success:function (res){
          $(".subcategory").empty();
          if(res!=null){
            $(".subcategory").append('<option value="">Select SubCategory</option>');

          $(res).each(function(i,val){
            
            $(".subcategory").append('<option value='+val.id+'>'+val.name+'</option>');
          })
          }
          else{
            $(".subcategory").append('<option value="">SubCategory Not Found</option>');

          }
        }
      })
    })
  })
</script>
@endsection



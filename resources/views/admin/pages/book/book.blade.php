@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('book-active', 'active')

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
                                      <th>Author Name</th>
                                      <th>Language</th>
                                      <th>Status</th>
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
                                 <td>{{$book->vendor->firstname}} {{$book->vendor->lastname}}</td>
                                 <td>{{$book->language->name}}</td>
                                 <td><select class="status" data-id="{{$book->id}}">
                                  <option value="pending" @if($book->status=='pending') selected @endif>Pending</option>
                                  <option value="published" @if($book->status=='published') selected @endif>Published</option>
                                  <option value="declined" @if($book->status=='declined') selected @endif>Declined</option>


                                </select></td>
                                  <td colspan="4" class="center">
                                  <button type="button"  class="btn btn-sm btn-success edit" data-id="{{$book->id}}">
                                      <i class="fa fa-pencil"></i>
                                    </button>
                                   
                                  <a href="{{route('vendor.book.delete',['id'=>$book->id])}}" class="btn btn-sm btn-danger">
                                      <i class="fa fa-trash-o"></i>
                                  </a>
                                <button type="button" class="btn btn-sm view" data-src="{{asset("uploads/books/".$book->attachment)}}">
                                    <i class="fa fa-eye"></i>

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
<div class="modal fade" id="view-demo" tabindex="-1" role="dialog" 
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
                  <iframe src="" width="100%" height="500px" class="view-src">
                  </iframe>
                </div>
            
      </form>
      </div>
    </div>
  </div>
</div>


<!-- Order Details Modal -->
 <!-- Modal -->

<!-- Order Details Modal -->
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    check_name="{{old('name')}}";
    
    if (check_name!="") {
      $("#exampleModalScrollable").modal("show");
    }
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
          $(".e_min_stock").val(data.min_stock);
          $(".e_max_stock").val(data.max_stock);
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
    $(".status").change(function(){
      id=$(this).data("id");
      val=$(this).val();
      
      $.ajax({
        url:"{{route('admin.change-book-status')}}",
        data:{id:id,val:val,"_token":"{{csrf_token()}}"},
        type:"post",
        success:function(res){
          console.log(res);
        }
      })
    })
    $(".view").click(function(){
      src=$(this).data("src");
      $("#view-demo").modal("show");
      $(".view-src").attr("src",src);
    })
  })
</script>
@endsection



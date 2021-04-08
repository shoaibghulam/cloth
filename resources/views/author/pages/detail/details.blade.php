@extends('author.layout.master')
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
                    <h4 class="card-title">Author Details</h4>
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Author</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                      
                                    
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                     
                                 <tr>
                                 <td></td>
                                 
                                
                                  <td colspan="4" class="center">
                                  <button type="button"  class="btn btn-sm btn-success edit" data-id="">
                                      <i class="fa fa-pencil"></i>
                                    </button>
                                   
                                  <a href="" class="btn btn-sm btn-danger">
                                      <i class="fa fa-trash-o"></i>
                                  </a>
                                  </td>
                                </tr>
                               


                                
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
      <form class="form" action="" enctype="multipart/form-data" method="POST">
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
        <form class="form" action="" enctype="multipart/form-data" method="POST" class="edit">
</form>
            
      </div>
  </div>
</div>
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
        url:"",
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
        url:"",
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



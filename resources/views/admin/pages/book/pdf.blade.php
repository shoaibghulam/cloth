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
                                      <th>ID</th>
                                      <th>Book Name </th>
                                      <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                                    
                                  
                                 <tr>
                        <td>
                      {{$books->id}}
                       
    
                        </td>
                    <td>{{$books->name}}</td>
                    <td>

                    <iframe src="{{asset($books->demo)}}#toolbar=0" width="100%" height="500px">
                        </iframe>
                    </td>
                      </tr>
                
                                </tbody>
                            </table>
                        </div>
                        <form class="form" action="{{ route('admin.add-pdf') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                       <div class="form-body">
                                           <div class="row">
                                               <div class="col-md-3">
                                                 <label class="text-dark"> Name</label>
                                               </div>
                                               <div class="col-md-6 col-12">
                                                   <div class="form-group">
                                                       
                                                   <input type="file" id="first-name-column" class="form-control" placeholder="Genere Name" name="file"  >
                                                       <span class="text-danger">{{$errors->first('file')}}</span>
           
                                                     
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
    </div>
</section>

              

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
  $(".delete").click(function(){
    if(confirm('Do You Real Want To Delete This Genre !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'/delete-genre/'+id, 
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
  $(".edit").click(function(){
    id=$(this).data("id");
    $.get('edit-genre/'+id,function(gen){
    // console.log(cat);
    $('.id').val(gen.id);
    $('.generename').val(gen.name);
    $('.abc').modal('show');



  });
  })
  
  
});



  




</script>

@endsection

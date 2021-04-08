@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('user-contact-active', 'active')

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
                    <h4 class="card-title">User Contact Informations</h4>
                   
                    
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>User ID</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Message</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contact as $usercontact)
                        <tr id="">
                        <td>{{$usercontact->id}}</td>
                        <td>{{$usercontact->name}}</td>
                        <td>{{$usercontact->email}}</td>
                        <td> 
                        <button class="text-right btn btn-primary text-white show" data-id="{{$usercontact->id}}" data-toggle="modal" data-target="#exampleModalScrollable">Read Message</button>
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Show Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                  <form class="form" method="post">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Message</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <!-- <input type="hidden" value="id" name=""> -->
                                            <!-- <input type="hidden"  name="id" class="id" value=""> -->
                                            <input type="hidden"  name="id" class="id" value="">


                                        <p class="message"></p>
                                        <!-- <input type="text"  name="id" class="message" value=""> -->


                                           
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="row">
                                   <div class="col-12 ">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light float-right">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light float-right">Reset</button>
                                    </div>
                                </div> -->
                            </div>
                        
                  </form>
                  </div>
                </div>
              </div>
            </div>


@endsection

@section('scripts')
<script>
$(document).ready(function(){
  $(document).on("click",".show",function(){

    id=$(this).data("id")
   // alert(id);
    $.get('show-contact-info/'+id,function(cat){
    //$(".message").html("");
    $('.id').val(cat.id);
    $('.message').html(cat.message);
   // $(".message").html("");
    $('#exampleModalScrollable').modal('show');



  });

});
});
</script>

@endsection


@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('vendor-active', 'active')

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
                    <h4 class="card-title">Vendor Details</h4>
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Vendor</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>Vendor ID</th>
                        
                                      <th>Image</th>
                                      <th>First Name </th>
                                      <th>Last Name</th>
                                      <th>Shop Name</th>
                                      <th>Email</th>
                                      <th>Phone No</th> 
                                      <th>Action</th>
                                    </tr>
                        </thead>
                         <tbody>
                        @foreach($data as $vendor)
                       
                        <tr id="venid{{ $vendor->id }}">
                        <td>{{$vendor->id}}</td>
                        <td><img src="{{asset ('/uploads/vendors/' . $vendor->image)}}" style="height:50px; width: 50px;"></td>
                        <td>{{$vendor->firstname}}</td>
                        <td>{{$vendor->lastname}}</td>
                        <td>{{$vendor->shopname}}</td>
                        <td>{{$vendor->email}}</td>
                        <td>{{$vendor->phoneno}}</td>
                      
                        <td>
                        <button  class="btn btn-sm btn-success edit" data-id="{{$vendor->id}}"><i
                        class="fa fa-pencil"></i></button>

                        <button class="btn btn-sm btn-danger delete" data-id="{{$vendor->id}}" ><i
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                  <form class="form" action="{{ route('admin.create-vendor-process') }}" method="post" enctype="multipart/form-data">
                   @csrf
                            <div class="form-body">
                            {{-- <div class="row">
                                    <div class="col-md-3">
                                    <label class="text-dark">Role ID</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           
                                            <input type="number" class="form-control" placeholder="Role ID" name="role">
                                            <span class="text-danger">{{$errors->first('sub_cat')}}</span>

                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">First Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                        <input type="text" class="form-control" placeholder="First Name" name="fname" required value="{{old('fname')}}">
                                            <span class="text-danger">{{$errors->first('fname')}}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Last Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name" name="lname" required value="{{old('lname')}}">
                                        <span class="text-danger">{{$errors->first('lname')}}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Shop Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Shop Name" name="shopname" required value="{{old('shopname')}}">
                                        <span class="text-danger">{{$errors->first('shopname')}}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Email</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required value="{{old('email')}}">
                                        <span class="text-danger">{{$errors->first('email')}}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Password</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="pass" required value="{{old('pass')}}">
                                        <span class="text-danger">{{$errors->first('pass')}}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Phone No</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Phone No" name="phone" required value="{{old('phone')}}">
                                        <span class="text-danger">{{$errors->first('phone')}}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Image</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="file" class="form-control" placeholder="" name="img" accept="image/*" required>
                                        <span class="text-danger">{{$errors->first('img')}}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Status</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <select class="form-control" name="status" required>
                                        <option value="">Select Status</option>

                                        <option value="1" @if(!empty(old('status')) && old('status')==1 ) selected @endif>Active</option>
                                        <option value="0" @if(!empty(old('status')) && old('status')==0 ) selected @endif>InActive</option>
                                        </select>
                                        <span class="text-danger">{{$errors->first('status')}}</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Bio</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <textarea type="text" class="form-control" name="bio"></textarea>
                                        <!-- <input type="file" class="form-control" placeholder="" name="img" accept="image/*" required> -->
                                        <span class="text-danger">{{$errors->first('bio')}}</span>

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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                    <br>
                  <form class="form" action="{{route('admin.update-vendor-process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="form-body">
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="text-dark">First Name</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input type="hidden" class='id' name="id">
                                    <input type="text" class="form-control firstname" placeholder="First Name" name="fname_edit" required value="{{old('fname_edit')}}">
                                        <span class="text-danger message">{{$errors->first('fname')}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <label class="text-dark">Last Name</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                    <input type="text" class="form-control lastname" placeholder="Last Name" name="lname_edit" required value="{{old('lname_edit')}}">
                                    <span class="text-danger message">{{$errors->first('lname')}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <label class="text-dark">Shop Name</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                    <input type="text" class="form-control shopname" placeholder="Shop Name" name="shopname_edit" required value="{{old('shopname_edit')}}">
                                    <span class="text-danger message">{{$errors->first('shopname_edit')}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <label class="text-dark">Email</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                    <input type="email" class="form-control email" placeholder="Email" name="email_edit" required value="{{old('email_edit')}}">
                                    <span class="text-danger message">{{$errors->first('email_edit')}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <label class="text-dark">Password</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                    <input type="password" class="form-control pass" placeholder="Password" name="pass_edit" required value="{{old('pass_edit')}}">
                                    <span class="text-danger message">{{$errors->first('pass_edit')}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <label class="text-dark">Phone No</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                    <input type="number" class="form-control phone" placeholder="Phone No" name="phone_edit" required value="{{old('phone_edit')}}">
                                    <span class="text-danger message">{{$errors->first('phone_edit')}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <label class="text-dark">Image</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                    <input type="file" class="form-control" placeholder="" name="img" accept="image/*">
                                    <span class="text-danger message">{{$errors->first('img')}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <label class="text-dark">Status</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                    <select class="form-control status_edit" name="status_edit" required>
                                    <option value="">Select Status</option>

                                    <option value="1" @if(!empty(old('status_edit')) && old('status_edit')==1 ) selected @endif >Active</option>
                                    <option value="0" @if(!empty(old('status_edit')) && old('status_edit')==0) selected @endif>InActive</option>
                                    </select>
                                    <span class="text-danger message">{{$errors->first('status_edit')}}</span>

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

  check="{{old('email')}}";

check_id="{{old('id')}}";
if (check!="" && check_id=='') {
  $("#exampleModalScrollable").modal("show");
}


if (check_id!="") {
  $(".id").val(check_id);
  $("#exampleModalScrollable1").modal("show");
}

  $(".delete").click(function(){
    if(confirm('Do You Real Want To Delete This Vendor !'))
    {
      id=$(this).data("id");
        $.ajax({
            url:'delete-vendor/'+id, 
            type:'GET',
            data:{
                _token:$('input[name=_token]').val()

            },
            success:function(response)
            {
                $('#venid'+id).remove();
            }

        })
    }
  })
  $(".edit").click(function(){
    
    id=$(this).data("id");
    $.get('edit-vendor/'+id,function(vendor){
   // var src = $(this).children('img').first().attr('src');
    //console.log(src);
    

    $(".message").html("");
    $('.id').val(vendor.id);
    $('.role').val(vendor.role_id);
    $('.firstname').val(vendor.firstname);
    $('.lastname').val(vendor.lastname);
    $('.shopname').val(vendor.shopname);
    $('.email').val(vendor.email);
    $('.pass').val(vendor.password);
    $('.phone').val(vendor.phoneno);
    
    //alert(src);
    $('.img [type=file]').val(vendor.image);
    $(".status_edit option").each(function(i,val){
      if($(val).val()==vendor.status){
        $(val).attr("selected","selected");
      }
    })
    $('.status').val(vendor.status);

    $('.abc').modal('show');





  });
  })
  
  
});



  




</script>
@endsection

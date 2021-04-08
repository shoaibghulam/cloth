@extends('vendor.layout.master')
@section('title', 'E-Book | Book')
@section('headname','Book')
@section('content')
<style type="text/css">
  .dt-buttons.btn-group {
    display: none;
}
</style>
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                
                    <h4 class="card-title">Profile Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                    <form class="form" action="{{route('vendor.update-profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="form-body">
                            <div class="row">
                                    <div class="col-md-3">
                                    @php $user=Auth::guard('vendor')->user(); @endphp
                                        </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="hidden"  name="id" value="{{$user->id}}">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">First Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control firstname" placeholder="First Name" name="fname" value="{{$user->firstname}}">
                                            @error('fname')
                                            <span class="control-label" style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Last Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text" class="form-control lastname" placeholder="Last Name" name="lname" value="{{$user->lastname}}">
                                        @error('lname')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Shop Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="text" class="form-control shopname" placeholder="Shop Name" name="shopname" value="{{$user->shopname}}">
                                        @error('shopname')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Email</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="email" class="form-control email" placeholder="Email" name="email" value="{{$user->email}}">
                                        @error('email')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Phone No</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="number" class="form-control phone" placeholder="Phone No" name="phone" value="{{$user->phoneno}}">
                                        @error('phone')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Image</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="file"  class="form-control img" placeholder="" name="image" value="{{$user->image}}" accept="image/*">
                                        @error('image')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Bio</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <textarea class="form-control" name="bio">{{$user->bios}}</textarea>

                                        @error('bio')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Bio</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <textarea class="form-control"></textarea>                                      
                                        </div>
                                    </div>
                                
                                
                            </div> -->
                            <div class="row">
                                   <div class="col-12 ">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light float-right">Submit</button>
                                    </div>
                                </div>
                        
                  </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Order Details Modal -->
 <!-- Modal -->

<!-- Order Details Modal -->
@endsection
@section('scripts')

@endsection



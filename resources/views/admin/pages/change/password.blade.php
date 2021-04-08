@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('headname','Dashboard')
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
                
                    <h4 class="card-title">Change Password Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                    <form class="form" action="{{route('admin.change-password-process')}}" method="post">
                    @csrf
                            <div class="form-body">
                            <div class="row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Current Password</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Current Password" name="currentpassword">
                                            @error('currentpassword')
                                            <span class="control-label" style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row"> 
                                    <div class="col-md-3">
                                        <label class="text-dark">Current Password</label>
                                      </div>
                                      <div class="col-md-6 col-12">
                                          <div class="form-group">
                                          <input type="password" class="form-control" placeholder="Confirm Password" name="current_password" required>
                                          @error('current_password')
                                          <span class="control-label" style="color:red;">{{ $message }}</span>
                                          @enderror
                                          </div>
                                      </div>
                                  </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">New Password</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="hidden" name="id" value="">

                                        <input type="password" class="form-control lastname" placeholder="New Password" name="newpassword" required>
                                        @error('newpassword')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">Confirm Password</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required>
                                        @error('confirmpassword')
                                        <span class="control-label" style="color:red;">{{ $message }}</span>
                                        @enderror
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
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        let searchParams = new URLSearchParams(window.location.search)
        let token= searchParams.get("token");
    
        $("#token").val(token);
    })
</script>
@endsection
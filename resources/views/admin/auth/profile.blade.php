@extends('admin.layout.master')
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
                    <form class="form" action="{{route('admin.profile-update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="form-body">
                            <div class="row">
                                    <div class="col-md-3">
                                    @php $user=Auth::guard('admin')->user() @endphp

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <input type="hidden"  name="id" value="">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name" name="name" value="{{$user->name}}">
                                            @error('name')
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
                                            <input type="email" class="form-control" placeholder="First Name" name="email" value="{{$user->email}}">
                                            @error('email')
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
                                            <input type="file" class="form-control" placeholder="" name="image" value="{{$user->image}}" accept="image/*">
                                            @error('image')
                                            <span class="control-label" style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="row">
                                   <div class="col-12 ">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light float-right">Submit</button>
                                        <!-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light float-right">Reset</button> -->
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



<!-- Order Details Modal -->
 <!-- Modal -->

<!-- Order Details Modal -->
@endsection
@section('scripts')

@endsection



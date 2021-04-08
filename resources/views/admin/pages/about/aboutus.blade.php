@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('store-about-active', 'active')

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
                    <h4 class="card-title">Store About Us</h4>
                   
                    
                </div>
                <div class="card-content">
                   
                <form action="{{route('admin.aboutus-information-process')}}" method="post">
                @csrf
                    <div class="card-body card-dashboard">
                        <!-- <div class="row">
                            @csrf
                            <div class="col-md-3">
                              <label class="text-dark">Phone Number</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                <input type="hidden" @if(!empty($information)) value="{{$information->id}}" @endif name="id">
                                <input type="text" class="form-control" placeholder="Category Name" name="phone" @if(!empty($information)) value="{{$information->phone}}" @endif>
                                <span class="text-danger">{{$errors->first('phone')}}</span>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <label class="text-dark">Email</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                
                                <input type="text" class="form-control" placeholder="Category Name" name="email"  @if(!empty($information)) value="{{$information->email}}" @endif>
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                   
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-3">
                            <label class="text-dark">About Us</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                <input type="hidden" name="id" @if(!empty($about)) value="{{$about->id}}" @endif> 
                                <textarea name="aboutus" class="form-control">{{$about->about}}</textarea>
                                <span class="text-danger">{{$errors->first('aboutus')}}</span>
                                   
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
</section>

 <!-- Add Category Modal -->


          

@endsection

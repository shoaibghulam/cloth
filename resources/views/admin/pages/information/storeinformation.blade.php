@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('store-info-active', 'active')

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
                    <h4 class="card-title">Store Information</h4>
                   
                    
                </div>
                <div class="card-content">
                   
                <form action="{{route('admin.informationprocess')}}" method="post">
                    <div class="card-body card-dashboard">
                        <div class="row">
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
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <label class="text-dark">Address</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                
                                <textarea name="address" class="form-control">@if(!empty($information)) {{$information->address}} @endif</textarea>
                                <span class="text-danger">{{$errors->first('address')}}</span>
                                   
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

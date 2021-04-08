@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
@section('store-promotion-active', 'active')

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
                    <h4 class="card-title">Promotion Information</h4>
                   
                    
                </div>
                <div class="card-content">
                   
                <form action="{{route('admin.promotion-information-process')}}" method="post">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            @csrf
                            <div class="col-md-3">
                              <label class="text-dark">Promotion Code</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                <input type="hidden" @if(!empty($promotiondetail)) value="{{$promotiondetail->id}}" @endif name="id">
                                <input type="text" class="form-control" placeholder="Promotion Code" name="promotioncode" @if(!empty($promotiondetail)) value="{{$promotiondetail->promotioncode}}" @endif>
                                <span class="text-danger">{{$errors->first('promotioncode')}}</span>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <label class="text-dark">Start Date</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                
                                <input type="date" class="form-control" placeholder="Start Date" name="startdate" @if(!empty($promotiondetail)) value="{{$promotiondetail->startdate}}" @endif>
                                <span class="text-danger">{{$errors->first('startdate')}}</span>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <label class="text-dark">End Date</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                
                                <input type="date" class="form-control" placeholder="End Date" name="enddate" @if(!empty($promotiondetail)) value="{{$promotiondetail->enddate}}" @endif>
                                <span class="text-danger">{{$errors->first('enddate')}}</span>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <label class="text-dark">Discount</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                
                                <input type="number" class="form-control" placeholder="Discount" name="discount" @if(!empty($promotiondetail)) value="{{$promotiondetail->discount}}" @endif>
                                <span class="text-danger">{{$errors->first('discount')}}</span>
                                   
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

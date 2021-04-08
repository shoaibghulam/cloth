@extends('vendor.layout.master')
@section('title', 'E-Book | Order')
@section('headname','Dashboard')
@section('content')
<style type="text/css">
  .dt-buttons.btn-group {
    display: none;
  }
  label.text-white.bg-danger{
    padding: 4px 13px;
  }
  label.text-white.bg-success{
    padding: 5px;
  }
  label.text-white.bg-success{
    padding: 5px 8px;
  }
  label.text-white.bg-warning{
    padding: 5px 9px;
  }
  .abc{
    color: #62ab00!important;
  }
</style>
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Order Details</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="text-dark table table-striped dataex-html5-selectors1" id="listtable">
                <thead>
                  <tr>
                    <th>Order Detail ID</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Total</th>
                    <!-- <th>Action</th> -->

                  </tr>
                </thead>
                <tbody>
                @php $total=0; @endphp

                @foreach($orderdetails->orderdetail as $details)
                
                <tr>
                  <td>{{$details->id}}</td>
                  <td>{{$details->price}}</td>
                  <td>{{$details->discount}}</td>
                  <td>{{$details->price-($details->discount/100)*$details->price}} @php $total+=$details->price-($details->discount/100)*$details->price @endphp</td>

                  
                  <!-- <td colspan="4" class="center">
                    <button type="button" data-toggle="modal" data-target="#exampleModalScrollable1" class="btn btn-sm btn-success">
                      <i class="fa fa-pencil"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-danger">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td> -->
                </tr>
                @endforeach
               
              </tbody>
            </table>
            <div class="col-lg-6 col-12 d-flex" style="float: right"> 

            <div class="cart-summary">
								<div class="cart-summary-wrap">
									<h4><span>Detail Summary</span></h4>
									<!-- <p>Sub Total <span class="text-primary">{{$total}}</span></p> -->
									<!-- <p>Shipping Cost <span class="text-primary">$00.00</span></p> -->
									<h2>Grand Total : <span class="text-primary abc">{{$total}}</span></h2>
								</div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- Order Details Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalScrollableTitle">Add Order</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <br>
      <form class="form">
        <div class="form-body">
          <div class="row">
            <div class="col-md-3">
              <label class="text-dark"> Status </label>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input type="hidden" value="id" name="">
                <select class="form-control">
                  <option value="NaN">Select Status</option>
                  <option value="dispatch">Dispatch</option>
                  <option value="pending">Pending</option>
                  <option value="delivered">Delivered</option>
                  <option value="completed">Completed</option>
                </select>
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
@endsection

@section('scripts')
<script>
$('#listtable').DataTable({"paging":   false,
        "ordering": false,
        "info":     false})
</script>
@endsection

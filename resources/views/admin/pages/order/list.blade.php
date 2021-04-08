@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
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
              <table class="text-dark table table-striped dataex-html5-selectors">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Book Name</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1001</td>
                  <td>Urdu Book </td>
                  <td>12</td>
                  <td>12000 USD</td>
                  <td>2000 USD</td>
                  <td>
                    <label class="text-white bg-success">Delivered</label>
                  </td>
                  <td colspan="4" class="center">
                    <button type="button" data-toggle="modal" data-target="#exampleModalScrollable1" class="btn btn-sm btn-success">
                      <i class="fa fa-pencil"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-danger">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>1001</td>
                  <td>Urdu Book </td>
                  <td>12</td>
                  <td>12000 USD</td>
                  <td>2000 USD</td>
                  <td>
                    <label class="text-white bg-success">Dispatch</label>
                  </td>
                  <td colspan="4" class="center">
                    <button type="button" data-toggle="modal" data-target="#exampleModalScrollable1" class="btn btn-sm btn-success">
                      <i class="fa fa-pencil"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-danger">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>1001</td>
                  <td>Urdu Book </td>
                  <td>12</td>
                  <td>12000 USD</td>
                  <td>2000 USD</td>
                  <td>
                    <label class="text-white bg-danger">Cancel</label>
                  </td>
                  <td colspan="4" class="center">
                    <button type="button" data-toggle="modal" data-target="#exampleModalScrollable1" class="btn btn-sm btn-success">
                      <i class="fa fa-pencil"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-danger">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>1001</td>
                  <td>Urdu Book </td>
                  <td>12</td>
                  <td>12000 USD</td>
                  <td>2000 USD</td>
                  <td>
                    <label class="text-white bg-warning">Pending</label>
                  </td>
                  <td colspan="4" class="center">
                    <button type="button" data-toggle="modal" data-target="#exampleModalScrollable1" class="btn btn-sm btn-success">
                      <i class="fa fa-pencil"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-danger">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
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

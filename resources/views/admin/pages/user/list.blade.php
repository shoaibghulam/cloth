@extends('admin.layout.master')
@section('title', 'E-Book Dashboard')
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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Details</h4>
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add User</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>User ID</th>
                                      <th>User Name </th>
                                      
                                      <th>User Email</th>
                                      <th>User Address</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <tr>
                        <td>
                        1001
                        </td>
                        <td>John Doe</td>
                        <td>john@gmail.com</td>
                        <td>XYZ House No 123 Location City</td>
                        <!-- <td>0900-786232</td> -->
                       
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
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit User</h5>
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
                                      <label class="text-dark">User Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                            <input type="text" id="first-name-column" class="form-control" placeholder="User Name" name="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">User Email</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name-column" class="form-control" placeholder="User Email" name="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">User Address</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <textarea class="form-control"></textarea>
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
            <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add User</h5>
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
                                      <label class="text-dark">User Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                            <input type="text" id="first-name-column" class="form-control" placeholder="User Name" name="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">User Email</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name-column" class="form-control" placeholder="User Email" name="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                      <label class="text-dark">User Address</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <textarea class="form-control"></textarea>
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

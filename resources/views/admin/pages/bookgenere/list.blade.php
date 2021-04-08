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
                    <h4 class="card-title">Book Genere Details</h4>
                    <button class="text-right btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalScrollable">Add Book Genere</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="text-dark table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Genere Name </th>
                                      <th>Book Name </th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <tr>
                        <td>
                        1001
                        </td>
                        <td>John </td>
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Genere</h5>
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
                                      <label class="text-dark">Genere Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                           <select class="form-control">
                                             <option value="">Select Here</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Book Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                            <select class="form-control">
                                             <option value="">Select Here</option>
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
            </div>


            <!-- Order Details Modal -->
             <!-- Modal -->
            <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Genere</h5>
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
                                      <label class="text-dark">Genere Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                           <select class="form-control">
                                             <option value="">Select Here</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                      <label class="text-dark">Book Name</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" value="id" name="">
                                            <select class="form-control">
                                             <option value="">Select Here</option>
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

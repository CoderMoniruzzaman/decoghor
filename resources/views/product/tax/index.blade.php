@extends('layouts/master')

@section('content')
  <!-- Errors tost message start-->
  <div class="container tost">
    <div class="row">
      <div class="col-lg-4 ml-auto tost_message">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <div class="button">
              <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
        @endif
      </div>
    </div>
  </div>
  <!-- Errors tost message end-->

  <!-- Tax part start-->
  <div class="container-fluid" id="product">
      <div class="row justify-content-center">
          <div class="col-md-12">

              <div class="card">
                  <div class="card-header card-header-info align-item flex">
                      <!-- Tax Heading-->
                      <div>
                        <h3>Tax List</h3>
                      </div>
                      <ul>
                          <li>
                            <!-- Tax Search-->
                            <form action="" class="form-search">
                              <div class="input-group">
                                  <input type="search" name="search" class="form-control" placeholder="Type text..." required="required">
                                  <span class="input-group-btn">
                                      <button class="search-button-one" type="submit"><i class="ti-search"></i></button>
                                  </span>
                              </div>
                            </form>
                          </li>
                          <!-- Tax modal button-->
                          <li>
                            <a href="#formModal" class="button-one" data-toggle="modal"><i class="ti-plus mr-2"></i>Add New TAx
                            </a>
                          </li>
                          <!-- modal part start -->
                          <div class="modal fade" id="formModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Create Tax</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Tax form -->
                                    <form class="row" action="{{route('tax.store')}}" method="post"enctype="multipart/form-data">
                                    @csrf
                                    <!-- Tax form input-->  
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                          <label>Tax Name</label>
                                          <input type="text" name="tax_name" class="form-control" placeholder="Enter Tax Name">
                                        </div>
                                    </div>
                                     <!-- Tax form input-->  
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                          <label>TAX-%</label>
                                            <input type="number" name="tax" class="form-control " placeholder="example->7%">
                                        </div>
                                    </div>
                                    <!-- Tax form submit button -->  
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="submit" class="button-one" >
                                      </div>
                                    </div>
                                  </form>
                                  <!-- Tax form end -->  
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- modal -part End -->
                      </ul>
                  </div>
                  <!-- Tax view table start-->
                  <div class="card-body">
                      <div class="table-responsive">
                        <!-- Tax table start-->
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th >#</th>
                              <th>Tax Type Name</th>
                              <th >Tax</th>
                              <th >Status</th>
                              <th >Tax Created</th>
                              <th >Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($taxes as $tax)
                            <tr>
                              <th >1</th>
                              <td>{{ $tax->tax_name }}</td>
                              <td>{{ $tax->tax }}%</td>
                              <td>
                                <a href="{{ url('change/status/tax') }}/{{ $tax->id }}">
                                  <button type="submit"
                                    class="<?php if ($tax->tax_status == 1): echo "btn btn-sm btn-success"; ?>
                                    <?php else:   echo "btn btn-sm btn-danger"; ?>
                                    <?php endif; ?>">
          
                                    <?php if ($tax->tax_status == 1): echo "Active"; ?>
                                    <?php else:   echo "Deactive"; ?>
                                    <?php endif; ?>
                                  </button>
                                </a>
                              </td>
                              <td>
                                {{ $tax->created_at->format('d-M-Y h:i:s A') }}
                                <br>
                                {{ $tax->created_at->diffForHumans() }}
                              </td>
                              <td>
                                <a href="javascripts:void(0)" data-taxid="{{$tax->id}}" data-taxname="{{$tax->tax_name}}" data-tax="{{$tax->tax}}" data-toggle="modal" data-target="#editModal" class="btn-sm btn-info mr-1 text-white"><i class="ti-pencil-alt"></i></a>
                                <a href="javascripts:void(0)" data-taxid="{{$tax->id}}" data-toggle="modal" data-target="#deleteModal" class="btn-sm btn-danger "><i class="ti-trash"></i></a>
                              </td>
                            </tr>
                            @empty
                            <tr class="text-center text-danger">
                              <td colspan="12">No Data Available</td>
                            </tr>
                            @endforelse
                          </tbody>
                      </table>
                      <!-- Tax table end-->
                    </div>
                  </div>
                  <!-- Tax view table end-->
                  <!-- Edit modal part start -->
                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="category-quickview" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Unit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <form class="row" action="{{route('tax.update','edit')}}" method="post"enctype="multipart/form-data">
                          @csrf
                          {{method_field('put')}}
                          <div class="modal-body">
                            <input type="hidden" name="tax_id" id="tax_id">
                            <!-- Tax form input-->  
                            <div class="col-lg-12">
                              <div class="form-group">
                                  <label>Tax Name</label>
                                  <input type="text" name="tax_name" id="tax_name" class="form-control" placeholder="Enter Tax Name">
                                </div>
                            </div>
                             <!-- Tax form input-->  
                            <div class="col-lg-12">
                              <div class="form-group">
                                  <label>TAX-%</label>
                                    <input type="number" name="tax" id="tax" class="form-control " placeholder="example->7%">
                                </div>
                            </div>
                            <!-- tax form submit button -->  
                            <div class="col-md-12">
                              <div class="form-group">
                                  <button type="submit" class="button-one">Update</button>
                              </div>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                  </div>
                <!--Edit modal part End -->
                <!-- Delete modal part start -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="category-quickview" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content delete-modal">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete confirmation</h5>
                          
                        </div>
                        <form class="row" action="{{route('tax.destroy','delete')}}" method="post">
                          @csrf
                          {{method_field('delete')}}
                          <div class="modal-body text-center">
                            <input type="hidden" name="tax_id" id="tax_id" value="">
                            <!-- tax form submit button -->  
                            <div class="col-md-12">
                              <div class="delete-alert-icon">
                                <i class="ti-alert text-danger"></i>
                              </div>
                              <div class="alert alert-danger " role="alert">
                                <p> Are you sure?you want to delete it.</p>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-danger">Yes,delete it</button>
                              <button type="button" class="btn btn-success" data-dismiss="modal">cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
                <!-- delete -part End -->
              </div>
          </div>
      </div>
  </div>
  <!-- Tax part start-->
@endsection

<!-- Tax custom javascripts start-->
@section('scripts')

<script type="text/javascript" defer>
  document.addEventListener('DOMContentLoaded', function () {
  "use strict";

  $('#editModal').on('show.bs.modal', function (event) {
    var a = $(event.relatedTarget) 
    var taxName = a.data('taxname')
    var Tax = a.data('tax')
    var taxId = a.data('taxid') 
    var modal = $(this)
    modal.find('.modal-body #tax_id').val(taxId);
    modal.find('.modal-body #tax_name').val(taxName);
    modal.find('.modal-body #tax').val(Tax);

  });

  $('#deleteModal').on('show.bs.modal', function (event) {
    var a = $(event.relatedTarget) 
    var taxId = a.data('taxid') 
    var modal = $(this)
    modal.find('.modal-body #tax_id').val(taxId);    
  });


  });

</script>
@endsection
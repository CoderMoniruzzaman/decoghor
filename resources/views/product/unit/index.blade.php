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

  <!-- Unit part start-->
  <div class="container-fluid" id="product">
      <div class="row justify-content-center">
          <div class="col-md-12">

              <div class="card">
                  <div class="card-header card-header-info align-item flex">
                      <!-- Unit Heading-->
                      <div>
                        <h3>Unit List</h3>
                      </div>
                      <ul>
                          <li>
                            <!-- Unit Search-->
                            <form action="" class="form-search">
                              <div class="input-group">
                                  <input type="search" name="search" class="form-control" placeholder="Type text..." required="required">
                                  <span class="input-group-btn">
                                      <button class="search-button-one" type="submit"><i class="ti-search"></i></button>
                                  </span>
                              </div>
                            </form>
                          </li>
                          <!-- Unit modal button-->
                          <li>
                            <a href="#formModal" class="button-one" data-toggle="modal"><i class="ti-plus mr-2"></i>Add New Unit
                            </a>
                          </li>
                          <!-- modal -part start -->
                          <div class="modal fade" id="formModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Create Unit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Unit form -->
                                    <form class="row" action="{{route('unit.store')}}" method="post"enctype="multipart/form-data">
                                    @csrf
                                    <!-- Unit form input-->  
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                          <label>Unit Code</label>
                                          <input type="text" name="unit_code" class="form-control" placeholder="Enter Unit Code" required>
                                        </div>
                                    </div>
                                     <!-- Unit form input-->  
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                          <label>Unit </label>
                                          <input type="text" name="unit" class="form-control" placeholder="kg/litter" required>
                                        </div>
                                    </div>
                                    <!-- Unit form submit button -->  
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="submit" class="button-one" >
                                      </div>
                                    </div>
                                  </form>
                                  <!-- Unit form end -->  
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- modal -part End -->
                      </ul>
                  </div>
                  <!-- Unit view table start-->
                  <div class="card-body">
                      <div class="table-responsive">
                        <!-- Unit table start-->
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th >#</th>
                              <th>Unit Code</th>
                              <th >Unit</th>
                              <th >Unit Status</th>
                              <th >Unit Created</th>
                              <th >Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($units as $unit)
                            <tr>
                            <th >{{ ++$u }}</th>
                              <td>{{ $unit->unit_code }}</td>
                              <td>{{ $unit->unit }}</td>
                              <td>
                                <a href="{{ url('change/status/unit') }}/{{ $unit->id }}">
                                  <button type="submit"
                                    class="<?php if ($unit->unit_status == 1): echo "btn btn-sm btn-success"; ?>
                                    <?php else:   echo "btn btn-sm btn-danger"; ?>
                                    <?php endif; ?>">
          
                                    <?php if ($unit->unit_status == 1): echo "Active"; ?>
                                    <?php else:   echo "Deactive"; ?>
                                    <?php endif; ?>
                                  </button>
                                </a>
                              </td>
                              <td>
                                {{ $unit->created_at->format('d-M-Y h:i:s A') }}
                                <br>
                                {{ $unit->created_at->diffForHumans() }}
                              </td>
                              <td>
                                <a href="javascripts:void(0)" data-unitid="{{$unit->id}}" data-unitcode="{{$unit->unit_code}}" data-unit="{{$unit->unit}}" data-toggle="modal" data-target="#editModal" class="btn-sm btn-info mr-1 text-white"><i class="ti-pencil-alt"></i></a>
                                <a href="javascripts:void(0)" data-unitid="{{$unit->id}}" data-toggle="modal" data-target="#deleteModal" class="btn-sm btn-danger "><i class="ti-trash"></i></a>
                              </td>
                            </tr>
                            @empty
                            <tr class="text-center text-danger">
                              <td colspan="12">No Data Available</td>
                            </tr>
                            @endforelse
                          </tbody>
                      </table>
                      <!-- Unit table end-->
                    </div>
                  </div>
                  <!-- Unit view table end-->
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
                        <form class="row" action="{{route('unit.update','edit')}}" method="post"enctype="multipart/form-data">
                          @csrf
                          {{method_field('put')}}
                          <div class="modal-body">
                            <input type="hidden" name="unit_id" id="unit_id" value="">
                            <!-- Unit form input-->  
                            <div class="col-lg-12">
                              <div class="form-group">
                                  <label>Unit Code</label>
                                  <input type="text" name="unit_code" id="unit_code" class="form-control">
                                </div>
                            </div>
                            <!-- Unit form input-->  
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <label>Unit </label>
                                  <input type="text" name="unit" id="unit" class="form-control" >
                                </div>
                            </div>
                            <!-- Unit form submit button -->  
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
                        <form class="row" action="{{route('unit.destroy','delete')}}" method="post">
                          @csrf
                          {{method_field('delete')}}
                          <div class="modal-body text-center">
                            <input type="hidden" name="unit_id" id="unit_id" value="">
                            <!-- Unit form submit button -->  
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
  <!-- Unit part start-->
@endsection

<!-- Unit custom javascripts start-->
@section('scripts')

<script type="text/javascript" defer>
  document.addEventListener('DOMContentLoaded', function () {
  "use strict";

  $('#editModal').on('show.bs.modal', function (event) {
    var a = $(event.relatedTarget) 
    var unitCode = a.data('unitcode')
    var Unit = a.data('unit')
    var unitId = a.data('unitid') 
    var modal = $(this)
    modal.find('.modal-body #unit_id').val(unitId);
    modal.find('.modal-body #unit_code').val(unitCode);
    modal.find('.modal-body #unit').val(Unit);

  });

  $('#deleteModal').on('show.bs.modal', function (event) {
    var a = $(event.relatedTarget) 
    var unitId = a.data('unitid') 
    var modal = $(this)
    modal.find('.modal-body #unit_id').val(unitId);    
  });


  });

</script>

@endsection

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

  <!-- Category part start -->
  <div class="container-fluid" id="product">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info align-item flex">
                    <div>
                      <h3>Category List </h3>
                    </div>
                    <ul>
                      <li>
                        <!-- Category Search-->
                        <form action="" class="form-search">
                          <div class="input-group">
                              <input type="search" name="search" class="form-control" placeholder="Type text..." required="required">
                              <span class="input-group-btn">
                                  <button class="search-button-one" type="submit"><i class="ti-search"></i></button>
                              </span>
                          </div>
                        </form>
                      </li>
                      <!-- Category modal button-->
                      <li>
                        <button type="button" name="create_record" id="create_record" class="button-one"><i class="ti-plus mr-2"></i>Add New Category
                        </button>
                      </li>
                      <!-- modal -part start -->
                      <div class="modal fade" id="formModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- Category form -->
                              <form class="row" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="modal-body">
                                  @include('product.category.form')
                                  <!-- Category form submit button -->  
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <input type="submit" class="button-one" >
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <!-- Category form end -->  
                          </div>
                        </div>
                      </div>
                      <!-- modal -part End -->
                    </ul>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- Category table start-->
                    <table class="table table-bordered" id="brand_table">
                      <!-- Category table head-->
                      <thead>
                        <tr>
                          <th >Serial</th>
                          <th>Brand Name</th>
                          <th>Brand Thumbnails/icon image</th>
                          <th>Brand Status</th>
                          <th>Brand Created Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <!-- Category table body-->
                      <tbody>
                        @forelse($categoreies as $category)
                        <tr>
                          <th >{{ ++$i }}</th>
                          <td>{{ $category->category_name }}</td>
                          <td>
                            <div class="card" style="width: 5rem;">
                              <img class="card-img-top" src="{{ asset('uploads/ProductImages/CategoryImages/') }}/{{ $category->category_image }}" alt="Card image cap">
                            </div>
                          </td>
                          <td>
                            <a href="{{ url('change/status/category') }}/{{ $category->id }}">
                              <button type="submit"
                                class="<?php if ($category->category_status == 1): echo "btn btn-sm btn-success"; ?>
                                <?php else:   echo "btn btn-sm btn-danger"; ?>
                                <?php endif; ?>">
      
                                <?php if ($category->category_status == 1): echo "Active"; ?>
                                <?php else:   echo "Deactive"; ?>
                                <?php endif; ?>
                              </button>
                            </a>
                          </td>
                          <td>
                            {{ $category->created_at->format('d-M-Y h:i:s A') }}
                            <br>
                            {{ $category->created_at->diffForHumans() }}
                          </td>
                          <td>
                          <a href="javascripts:void(0)" data-toggle="modal" data-target="#editModal" class="btn-sm btn-info mr-1 text-white" data-categoryid="{{$category->id}}" data-mytitle="{{$category->category_name}}" data-myimage="{{ asset('uploads/ProductImages/CategoryImages/') }}/{{ $category->category_image }}" ><i class="ti-pencil-alt pr-1"></i>Update</a>
                          <a href="javascripts:void(0)" data-mytitle="{{$category->category_name}}" data-categoryid="{{$category->id}}" data-toggle="modal" data-target="#deleteModal" class="btn-sm btn-danger" ><i class="ti-trash pr-1"></i>Delete</a>
                          </td>
                        </tr>
                        @empty
                        <tr class="text-center text-danger">
                          <td colspan="12">No Data Available</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                    <!-- Category table end-->

                    <!-- Edit modal part start -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="category-quickview" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          <form class="row" action="{{route('category.update','edit')}}" method="post"enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}
                            <div class="modal-body">
                              <input type="hidden" name="cat_id" id="cat_id" value="">
                              @include('product.category.form')
                              <!-- Category form submit button -->  
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="submit" class="button-one" >
                                </div>
                              </div>
                            </div>
                          </form>
                          </div>
                      </div>
                    </div>
                  <!-- Edit modal part End -->
                  <!-- Delete modal part start -->
                  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="category-quickview" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content delete-modal">
                          <div class="modal-header">
                            <h5 class="modal-title">Delete confirmation</h5>
                          </div>
                          <form class="row" action="{{route('category.destroy','delete')}}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <div class="modal-body text-center">
                              <input type="hidden" name="cat_id" id="cat_id" value="">
                              <!-- Category form submit button -->  
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
                  <!-- delete modal part End -->
                  </div>
                </div>
                <!-- Category view table end-->
              </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Category part end-->


@endsection
<!-- custom javascripts start-->
@section('scripts')

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
  "use strict";
    $('#create_record').click(function(){
      $('#formModal').modal('show');
  });
 
  $('#editModal').on('show.bs.modal', function (event) {
    var a = $(event.relatedTarget) 
    var title = a.data('mytitle')
    var myImageId = a.data('myimage')
    var CategoryId = a.data('categoryid') 
    var modal = $(this)
    modal.find('.modal-body #cat_id').val(CategoryId);
    modal.find('.modal-body #category_name').val(title);
    modal.find('.modal-body #myImage').attr("src", myImageId);
  });

  $('#deleteModal').on('show.bs.modal', function (event) {
    var a = $(event.relatedTarget) 
    var cateId = a.data('categoryid') 
    var title = a.data('mytitle')
    var modal = $(this)
    modal.find('.modal-body #cat_id').val(cateId);
    modal.find('.modal-body #category_name').val(title);
        
  });


  });

</script>
@endsection
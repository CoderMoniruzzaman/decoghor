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


  <!--Sub-Category part start -->
  <div class="container-fluid" id="product">
     <div class="row justify-content-center">
          <div class="col-md-12">
            <!--Sub-Category card part start -->
            <div class="card">
                <div class="card-header card-header-info align-item flex">
                    <div>
                      <h3>Sub Category List</h3>
                    </div>
                    <ul>
                        <li>
                          <form action="" class="form-search">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control" placeholder="Type text..." required="required">
                                <span class="input-group-btn">
                                    <button class="search-button-one" type="submit"><i class="ti-search"></i></button>
                                </span>
                            </div>
                          </form>
                        </li>
                      <li>
                        <a  href="#formModal" class="button-one" name="create_record" data-toggle="modal"><i class="ti-plus mr-2"></i>Add New Sub Category</a>
                        <!-- modal -part start -->
                          <div class="modal fade" id="formModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Create Sub Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <!--Sub-Category insert form -->
                                    <form class="row" action="{{ route('subcategory.store')}} " method="post"enctype="multipart/form-data">
                                    @csrf
                                    <!--Sub-Category form item -->
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                          <label>Sub Category Name</label>
                                          <input type="text" name="sub_category_name" class="form-control" placeholder="Enter Category Name">
                                        </div>
                                    </div>
                                    <!--Sub-Category form item -->
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                          <label >Sub Category Thumbnails/Icon Image</label>
                                          <input type="file" name="sub_category_image" class="form-control ">
                                        </div>
                                    </div>
                                    <!--Sub-Category form item -->
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label >Select Parent Category</label>
                                        <select class="form-control" name="category_id" id="category_id" required>
                                          <option value="">Select Parent Category</option>
                                          @foreach($categoreies as $category)
                                          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                          @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <!--Sub-Category form button -->
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="submit" class="button-one" >
                                      </div>
                                    </div>
                                  </form>
                                  <!--Sub-Category form end -->
                                  </div>
                                </div>
                            </div>
                          </div>
                        <!-- modal -part End -->
                      </li>
                    </ul>
                </div>
                <!--Sub-Category table part satrt-->
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th >#</th>
                            <th>Sub Category Name</th>
                            <th>Sub Category Thumbnails/icon image</th>
                            <th>Sub Category Status</th>
                            <th>Sub Category Created Time</th>
                            <th>Parent category</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($subcategoreies as $subcategory)
                          <tr>
                            <th >1</th>
                            <td>{{ $subcategory->sub_category_name }}</td>
                            <td>
                             
                                <div class="card" style="width: 5rem;">
                                  <img class="card-img-top" src="{{ asset('uploads/ProductImages/SubCategoryImages/') }}/{{ $subcategory->sub_category_image }}" alt="Card image cap">
                                </div>
                             
                            </td>
                            <td>
                              <a href="{{ url('change/status/subcategory') }}/{{ $subcategory->id }}">
                                <button type="submit"
                                  class="<?php if ($subcategory->sub_category_status == 1): echo "btn btn-sm btn-success"; ?>
                                  <?php else:   echo "btn btn-sm btn-danger"; ?>
                                  <?php endif; ?>">
        
                                  <?php if ($subcategory->sub_category_status == 1): echo "Active"; ?>
                                  <?php else:   echo "Deactive"; ?>
                                  <?php endif; ?>
                                </button>
                              </a>
                            </td>
                            <td>
                              {{ $subcategory->created_at->format('d-M-Y h:i:s A') }}
                              <br>
                              {{ $subcategory ->created_at->diffForHumans() }}
                            </td>
                            <td>
                              {{ $subcategory ->relationcategory->category_name }}
                            </td>
                            <td>

                              <a href="javascripts:void(0)" data-subcategoryid="{{$subcategory->id}}" data-subname="{{$subcategory->sub_category_name}}" data-subimage="{{ asset('uploads/ProductImages/SubCategoryImages/') }}/{{ $subcategory->sub_category_image }}" data-subcatpid="{{$subcategory->category_id}}" data-categorypid="{{$subcategory ->relationcategory->category_name}}" data-toggle="modal" data-target="#editModal" class="btn-sm btn-info mr-1 text-white"><i class="ti-pencil-alt"></i></a>

                              <a href="javascripts:void(0)" data-subcategoryid="{{$subcategory->id}}" data-toggle="modal" data-target="#deleteModal" class="btn-sm btn-danger"><i class="ti-trash"></i></a>

                            </td>
                          </tr>
                          @empty
                          <tr class="text-center text-danger">
                            <td colspan="12">No Data Available</td>
                          </tr>
                         @endforelse
                        </tbody>
                      </table>
                    </div>
                </div>
                <!--Sub-Category table part end -->
            </div>
            <!--Sub-Category card part end -->
            <!--Edit modal -part start -->
            <div class="modal fade" id="editModal">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Sub Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!--Sub-Category insert form -->
                      <form class="row" action="{{ route('subcategory.update','edit')}} " method="post"enctype="multipart/form-data">
                      @csrf
                      {{method_field('put')}}
                      <!--Sub-Category form item -->
                      <div class="col-lg-12">
                        <div class="form-group">
                            <label>Sub Category Name</label>
                            <input type="hidden" name="subcat_id" id="subcat_id">
                            <input type="text" name="sub_category_name" id="sub_category_name" class="form-control" placeholder="Enter Category Name">
                          </div>
                      </div>
                      <!--Sub-Category form item -->
                      <div class="col-lg-12">
                        <div class="form-group">
                            <label >Sub Category Thumbnails/Icon Image</label>
                            <input type="file" name="sub_category_image" class="form-control ">
                            <img id="sub_Image" class="img-fuild pt-2" src="" alt="" width="100">
                          </div>
                      </div>
                      <!--Sub-Category form item -->
                      <div class="col-lg-12">
                        <div class="form-group" id="sub_category_select">
                          <label >Select Parent Category</label>
                          <select class="form-control" name="category_id" id="editcategory_id" required>
                            <option id="pa_category_id" value="">Edit Parents category</option>
                            @foreach($categoreies as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                          </select>
                          </div>
                      </div>
                      <!--Sub-Category form button -->
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" class="button-one" >
                        </div>
                      </div>
                    </form>
                    <!--Sub-Category form end -->
                    </div>
                  </div>
              </div>
            </div>
          <!--edit modal part End -->

          <!-- Delete modal part start -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="category-quickview" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content delete-modal">
                  <div class="modal-header">
                    <h5 class="modal-title">Delete confirmation</h5>
                    
                  </div>
                  <form class="row" action="{{route('subcategory.destroy','delete')}}" method="post" id="category_form">
                    @csrf
                    {{method_field('delete')}}
                    <div class="modal-body text-center">
                      <input type="hidden" name="subcat_id" id="subcat_id" value="">
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
          <!-- delete -part End -->

        </div>
      </div>
  </div>
  <!--Sub-Category part start -->
@endsection

@section('scripts')

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
  "use strict";
  $('#editModal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var subName = a.data('subname')
      var subImageId = a.data('subimage')
      var subcatpId = a.data('subcatpid')
      var SubcategoryId = a.data('subcategoryid')
      var paCategoryId = a.data('categorypid') 
      var modal = $(this)
      modal.find('.modal-body #subcat_id').val(SubcategoryId);
      modal.find('.modal-body #sub_category_name').val(subName);
      modal.find('.modal-body #sub_Image').attr("src", subImageId);
      modal.find('.modal-body #pa_category_id').attr("value", subcatpId);
      modal.find('.modal-body #pa_category_id').html(paCategoryId);
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
    var a = $(event.relatedTarget) 
    var SubcategoryId = a.data('subcategoryid') 
    var modal = $(this)
    modal.find('.modal-body #subcat_id').val(SubcategoryId);
  });

  $('#category_id').select2();
  $('#editcategory_id').select2();

  });
</script>
@endsection

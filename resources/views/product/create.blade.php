@extends('layouts/master')

@section('content')
<div class="container-fluid" id="product">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- Product header -->
                <div class="card-header card-header-info align-item flex">
                    <div>
                      <h3>Add Product </h3>
                    </div>
                    <ul>
                      <li><a href="{{ url('/product')}}" class="button-one"><i class="ti-list mr-2"></i>Product List</a></li>
                    </ul>
                </div>
                <!-- Product card body -->
                <div class="card-body">
                    <!-- Product form -->
                    <form class="row" method="POST" action="{{url('/product/store')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Product input field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name"  class="form-control  @error('product_name') is-invalid @enderror" placeholder="Enter Product Name">
                                @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="number" name="product_price" class="form-control  @error('product_price') is-invalid @enderror" placeholder="0">
                                @error('product_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Sales Price</label>
                                <input type="number" name="product_sales" class="form-control @error('product_sales') is-invalid @enderror" placeholder="0">
                                @error('product_sales')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product alert Quantity</label>
                                <input type="number" name="product_alert" class="form-control @error('product_alert') is-invalid @enderror" placeholder="0">
                                @error('product_alert')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control @error('category') is-invalid @enderror" name="category_id" id="category_id">
                                    <option  value="">-- Select Category --</option>
                                    @foreach($categoreies as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>The category name field is required </strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sub Category Name</label>
                                <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="subcategory_id" >
                                    <option  value="">-- Select Sub Category --</option>
                                    @foreach($subcategoreies as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>The sub category name field is required </strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Product input field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Brand Name</label>
                                <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id" id="brand_id">
                                    <option  value="">-- Select Brand --</option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>The Brand name field is required </strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <!-- Product input field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Tax</label>
                                <select class="form-control @error('tax_id') is-invalid @enderror" name="tax_id" id="tax_id" >
                                    <option  value="">-- Select Tax --</option>
                                    @foreach($taxes as $tax)
                                    <option value="{{ $tax->id }}">{{ $tax->tax }}%</option>
                                    @endforeach
                                </select>
                                @error('tax_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>The Tax field is required </strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Total Products</label>
                                <input type="number" name="product_unit" class="form-control @error('product_unit') is-invalid @enderror" placeholder="0">
                                @error('product_unit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Product Unit</label>
                                <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" id="unit_id">
                                    <option  value="">-- Select Unit --</option>
                                    @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->unit}}</option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>The Unit field is required </strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Upload Product Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('product_image') is-invalid @enderror" id="customFile" name="product_image">
                                    @error('product_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>The product image is required </strong>
                                        </span>
                                    @enderror
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <small class="form-text text-muted">image size must be 320X480</small>
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Upload Product Preview Images</label>
                                <input type="file"  class="form-control @error('product_mulimg') is-invalid @enderror" name="product_mulimg[]"  multiple="multiple" >
                                @error('product_mulimg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>The Product Preview image must be one is required </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product input field -->
                        <div class="col-md-12 mt-1">
                            <div class="form-group">
                                <textarea name="product_description"  class="form-control" id="editor1"  rows="7"></textarea>
                            </div>
                        </div>
                        
                        <!-- Product input field -->
                        <div class="col-md-12">
                            <div class="form-check">
                                <input type="checkbox" value="1" name="product_status" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Publish This Product now</label>
                              </div>
                        </div>
                        <!-- Product submit button field -->
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="button-one">Submit</button>
                        </div>
                    </form>
                    <!-- Product form end-->
                </div>
                <!-- Product card body -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript" defer>
  document.addEventListener('DOMContentLoaded', function () {
    "use strict";


    $("#customFile").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('#category_id').select2();
    $('#subcategory_id').select2();
    $('#brand_id').select2();
    $('#unit_id').select2();
    $('#tax_id').select2();

    $('#editor1').summernote({
        placeholder: 'Type your product decription............',
        dialogsFade: true,
        tabsize: 2,
        focus: false,
        height: 220,
        toolbar: [
          ['style', ['style']],
          ['fontsize', ['fontsize']],
          ['font', ['bold', 'underline','strikethrough','subscript','superscript' ,'italic','clear']],
          ['fontname', ['fontname']],
          ['height', ['height']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link','hr']],
          ['view', ['fullscreen', 'help','undo','redo']]
        ]
    });



  });
</script>
@endsection
@extends('layouts/master')

@section('content')
<div class="container-fluid product-edit" id="product" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- Product header -->
                <div class="card-header card-header-info align-item flex">
                    <div>
                      <h3>Edit Product </h3>
                    </div>
                    <ul>
                      <li><a href="{{ url('/product')}}" class="button-one"><i class="ti-list mr-2"></i>Product List</a></li>
                    </ul>
                </div>
                <!-- Product card body -->
                <div class="card-body">
                    <!-- Product form -->
                    <form class="row" method="POST" action="{{ url('/product/update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-3">
                            <input type="hidden" name="id" value="{{ $old_infos->id }}">
                            <div class="row">
                                <!-- Product input field -->

                                <div class="col-md-12">
                                    <div class="edit-img">
                                        <img  class="card-img-top" src="{{ asset('uploads/ProductImages/Productphoto/') }}/{{ $old_infos->product_image }}" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Image edit</label>
                                        <input type="file"  name="product_image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="row">
                                <!-- Product input field -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name"  class="form-control" value="{{ $old_infos->product_name }}">
                                    </div>
                                </div>

                                <!-- Product input field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="number" name="product_pricez" class="form-control" value="{{ $old_infos->product_price }}">
                                    </div>
                                </div>

                                <!-- Product input field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Sales Price</label>
                                        <input type="number" name="product_sale" class="form-control" value="{{ $old_infos->product_sales }}">
                                    </div>
                                </div>

                                <!-- Product input field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product alert Quantity</label>
                                        <input type="number" name="product_alert" class="form-control" value="{{ $old_infos->product_alert }}">
                                    </div>
                                </div>

                                <!-- Product input field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option  value="{{ $old_infos->category_id }}">{{$old_infos ->relationcategory->category_name}}</option>
                                            @foreach($categoreies as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Product input field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Category Name</label>
                                        <select class="form-control" name="subcategory_id" id="subcategory_id" >
                                            <option  value="{{ $old_infos->subcategory_id }}">{{$old_infos ->relationsubcategory->sub_category_name}}</option>
                                            @foreach($subcategoreies as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- Product input field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Brand Name</label>
                                        <select class="form-control" name="brand_id" id="brand_id">
                                            <option  value="{{ $old_infos->brand_id }}">{{$old_infos ->relationbrand->brand_name}}</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Product input field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Tax</label>
                                        <select class="form-control" name="tax_id" id="tax_id" >
                                            <option  value="{{ $old_infos->tax_id }}">{{$old_infos ->relationtax->tax }}%</option>
                                            @foreach($taxes as $tax)
                                            <option value="{{ $tax->id }}">{{ $tax->tax }}%</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                 <!-- Product input field -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Products</label>
                                        <input type="number" name="product_unit" class="form-control" placeholder="0" value="{{ $old_infos->product_unit}}">
                                    </div>
                                </div>
                                <!-- Product input field -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product Unit</label>
                                        <select class="form-control" name="unit_id" id="unit_id">
                                            <option  value="{{ $old_infos->unit_id }}">{{$old_infos ->relationunit->unit }}</option>
                                            @foreach($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product input field -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="product_description"  class="form-control" id="editor2"  rows="7">{!! $old_infos->product_description !!}</textarea>
                            </div>
                        </div>

                        <!-- Product input field -->
                        @if($multiple_photos)
                        @foreach($multiple_photos as $multiple_photo)

                        <div class="col-lg-2">
                          <div class="card">
                              <img src="{{ asset('uploads/ProductImages/ProductSlider') }}/{{ $multiple_photo }}" alt="" class="img-fluid">
                              <div class="card-body">
                                <div class="form-group">
                                    <input type="file" name="product_mulimg[]" class="form-control">
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="submit" class="btn btn-light btn-sm" formaction="{{ url('edit/product/single')}}/{{ $multiple_photo }}/{{$old_infos->id}}"><i class="ti-pencil-alt mr-1"></i>Update</button>
                                  <a href="{{ url('delete/product/single')}}/{{ $multiple_photo }}/{{$old_infos->id}}" class="btn btn-danger btn-sm"><i class="ti-trash mr-1"></i>Delete</button></a>
                                  </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- Product input field -->
                        <div class="col-lg-2">
                            <div class="card">
                                <img src="{{ asset('uploads/ProductImages/ProductSlider/defaultmulimage.png')}}" alt="{{ asset('uploads/ProductImages/ProductSlider/defaultmulimage.png')}}" class="img-fluid">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="file" name="photo_name_new[]" class="form-control"  multiple="">
                                    </div>
                                    <label for="">Upload New Preview image</label>
                                </div>
                            </div>
                        </div>
                        <!-- Product input field -->
                        <div class="col-md-12 mt-2">
                            <div class="form-check">
                                <input type="checkbox" value="1" name="product_status" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Publish This Product now</label>
                              </div>
                        </div>
                        <!-- Product submit button field -->
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="button-one">Update</button>
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
    $('#category_id').select2();
    $('#subcategory_id').select2();
    $('#brand_id').select2();
    $('#unit_id').select2();
    $('#tax_id').select2();

    $('#editor2').summernote({
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
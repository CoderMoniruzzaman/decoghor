@extends('layouts/master')

@section('content')
  <!--Product part start -->
  <div class="container-fluid product" id="product">
    <div class="row justify-content-center">
         <div class="col-md-12">
           <!--Product card part start -->
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
                     <a  href="{{url('product/create')}}" class="button-one" ><i class="ti-plus mr-2"></i>Add New Product</a>
                       
                     </li>
                   </ul>
               </div>
               <!--Product table part satrt-->
               <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-bordered">
                       <thead>
                         <tr>
                           <th >#</th>
                           <th>Product Name</th>
                           <th>Product Image</th>
                           <th>Product Description</th>
                           <th>Product Price</th>
                           <th>Sale Price</th>
                           <th>Category</th>
                           <th>Sub Category</th>
                           <th>Brand</th>
                           <th>Tax/Vat</th>
                           <th>Unit/Piece</th>
                           <th>Alert Quantity</th>
                           <th>Product Status</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                        @forelse($products as $product)
                         <tr>
                         <th >{{++$i}}</th>
                            <td>{{$product->product_name}}</td>
                            <td><img class="card-img-top"src="{{ asset('uploads/ProductImages/Productphoto/') }}/{{ $product->product_image }}" alt="Card image cap"></td>
                            <td>{!! Str::limit($product->product_description, 20) !!}</td>
                            <td>{{$product->product_price}}$/tk</td>
                            <td>{{$product->product_sales}}$/tk</td>
                            <td>{{$product->relationcategory->category_name }}</td>
                            <td>{{$product->relationsubcategory->sub_category_name }}</td>
                            <td>{{$product->relationbrand->brand_name }}</td>
                            <td>{{$product->relationtax->tax_name}}{{$product ->relationtax->tax }}%</td>
                            <td>{{$product->product_unit}}{{$product ->relationunit->unit }}</td>
                            <td>{{$product->product_alert }}</td>
                            <td> 
                              <a href="{{ url('change/status/product') }}/{{ $product->id }}">
                                <button type="submit"
                                    class="
                                    @if ($product->product_status == 1)btn btn-sm btn-success
                                    @else  btn btn-sm btn-danger
                                    @endif">
                                    @if ( $product->product_status == 1) 
                                    Published
                                    @else Unpublished
                                    @endif
                                </button>
                              </a>
                            </td>
                            <td>
                              <a href="{{url('product/view')}}/{{ $product->id }}"class="btn-sm btn-light"><i class="ti-eye"></i></a>
                              <a href="{{url('product/edit')}}/{{ $product->id }}"class="btn-sm btn-light"><i class="ti-pencil-alt"></i></a>
                              <a href="javascripts:void(0)"class="btn-sm btn-light"><i class="ti-trash"></i></a>
                            </td>
                         </tr>
                         @empty
                            <tr class="text-center text-danger">
                              <td colspan="14">No Data Available</td>
                            </tr>
                          @endforelse
                       </tbody>
                     </table>
                   </div>
               </div>
               <!--Product table part end -->
           </div>
           <!--Product card part end -->
  
       </div>
     </div>
 </div>
 <!--Product part start -->
@endsection
@section('scripts')

@endsection
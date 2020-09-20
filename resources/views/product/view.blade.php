@extends('layouts/master')

@section('content')
  <!--product view part start -->
  <div class="container-fluid product_view" id="product">
    <!-- Page-Title breadcrumb-->
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('product')}}">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product_info->product_name}}</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center">
                        <a href="#" class="button-one " id="Dash_Date">
                            <i class="ti-trash align-self-center icon-xs ml-1"></i>
                            <span>Trash</span>
                        </a>
                        <a href="{{ url('change/status/product') }}/{{ $product_info->id }}" class="button-one " id="Dash_Date">
                            @if ( $product_info->product_status == 1) 
                                <span>Published</span>
                            @else <span>Unpublished</span>
                            @endif
                        </a>
                        <a href="{{ url('/product/edit') }}/{{ $product_info->id }}" class="button-one " id="Dash_Date">
                            <i class="ti-pencil-alt align-self-center icon-xs ml-1"></i>
                            <span>Edit This Product</span>
                        </a>
                    </div><!--end col-->  
                </div><!--end row-->                                                              
            </div><!--end page-title-box-->
        </div>
    </div>
    <!-- page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="product-view-main">
                <div class="container">
                    <div class="row flex justify-content-center">
                        <div class="col-lg-5 ml-auto">
                            <div class="left-side">
                                <div class="imgBox">
                                    <img id="imgBoxh" class="card-img-top" src="{{ asset('uploads/ProductImages/Productphoto/') }}/{{ $product_info->product_image }}" alt="Card image cap">
                                </div>
                                
                                <div class="preview-img">
                                    <div class=" thumb">
                                        <div class="thumb-slider">
                                            <img src="{{ asset('uploads/ProductImages/Productphoto/') }}/{{ $product_info->product_image }}" alt="" onclick="myFunction(this)">
                                        </div>
                                        @foreach ($multiple_photos as $multiple_photo)
                                        <div class="thumb-slider">
                                            <img src="{{ asset('uploads/ProductImages/ProductSlider/') }}/{{ $multiple_photo }}" alt="" onclick="myFunction(this)">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 d-flex align-items-center">
                            <div class="right-side">
                                <div class="product-details">
                                    <div class="product_name">
                                        <h5>{{ $product_info->product_name}}</h5>
                                    </div>
                                    <div class="product_price">
                                        <span class="price">$45.00</span>
                                        {{-- <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div> --}}
                                    </div>
                                    <div class="product-description">
                                        <h4>Product Decription</h4>
                                        <span>
                                           {!! $product_info->product_description !!}
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="prodcut-info">
                                        <ul class="product-meta">
                                            <li><span>Code</span>:<a href="#">BE45VGRT</a></li>
                                            <li><span>Vat</span>:<a href="#">{{$product_info ->relationtax->tax_name}}({{$product_info ->relationtax->tax }}%)</a></li>
                                            <li><span>Unit</span>:<a href="#">{{$product_info ->product_unit}} ({{$product_info ->relationunit->unit }})</a></li>
                                            <li><span>Category</span>:<a href="#">{{$product_info->relationcategory->category_name}}</a></li>
                                            <li><span>SubCategory</span>:<a href="#">{{$product_info->relationsubcategory->sub_category_name }}</a></li>
                                            <li><span>Brand</span>:<a href="#">{{$product_info->relationbrand->brand_name}}</a></li>
                                            <li><span>Status</span>:<a href="#">In a stack</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <!--product view part start -->
@endsection
@section('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        "use strict";
        $('.thumb').slick({
            centerMode: true,
            centerPadding: '60px',
            dots: false,
            speed: 500,
            slidesToShow: 3,
            prevArrow: '<i class="ti-arrow-left client-left-arrow"></i>',
            nextArrow: '<i class="ti-arrow-right client-right-arrow"</i>',
            responsive: [
                {
                breakpoint: 1199,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
                },
                {
                breakpoint: 992,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
                },

                {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
                },

                {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
                },

                {
                breakpoint: 320,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
                }
            ]
        });

    });
    function myFunction(smallImg){
           var fullImg = document.getElementById("imgBoxh");
           fullImg.src = smallImg.src;
    }

</script>
@endsection
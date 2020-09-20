<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\productmodel\Brand;
use Alert;
use Image;
use Redirect,Response;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Brand view index page
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'DESC')->get();
        return view('product/brand/index',compact('brands'))->with('i',(request()->input('page',1)-1)*8);
    }
    
    // Brand Insert
    public function store(Request $request)
    {
        $validator = $request->validate([ 
            'brand_name' => 'required|unique:brands,brand_name',
        ]);
        if($validator){
            $last_inserted_id = Brand::insertGetId([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);

            if($request->hasFile('brand_image',)){
                $photo_to_upload = $request->brand_image;
                $filename = $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();
                Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/brandImages/'.$filename));
                Brand::find($last_inserted_id)->update([
                'brand_image' => $filename,
                ]);
            }
            toast('Brand have been created succesfully ','success');
        }
        return redirect('brand');
    }
    
    // Edit Brand
    public function update(Request $request)
    {
        if($request->hasFile('brand_image')){
            if (Brand::find($request->brand_id)->brand_image == 'branddefault.jpg') {
              $photo_to_upload = $request->brand_image;
              $filename = $request->brand_id.".".$photo_to_upload->getClientOriginalExtension();
              Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/brandImages/'.$filename));
              Brand::find($request->brand_id)->update([
                'brand_image' => $filename,
              ]);
            }
            else {
              $delete_this_file = Brand::find($request->brand_id)->brand_image;
              unlink(base_path('public/uploads/ProductImages/brandImages/'.$delete_this_file));
              $photo_to_upload = $request->brand_image;
              $filename = $request->brand_id.".".$photo_to_upload->getClientOriginalExtension();
              Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/brandImages/'.$filename));
              Brand::find($request->brand_id)->update([
                'brand_image' => $filename,
              ]);
            }
        }
          Brand::find($request->brand_id)->update([
            'brand_name' => $request->brand_name,
          ]);
          toast('Brand have been updated ','info');
          return redirect('brand');
    }

    // Status change Brand
    public function changestatus($id)
    {
        if ($brands = Brand::find($id)->brand_status) {
            Brand::findOrFail($id)->update([
                'brand_status' => 0,
          ]);
          toast('Brand Status Deactivated ','warning');
        }
        else {
            Brand::findOrFail($id)->update([
                'brand_status' => 1,
          ]);
          toast('Brand Status Activated ','success');
        }
        return redirect('brand');
    }

    public function destroy(Request $request)
    {
        if ($delete_this = Brand::findOrFail($request->brand_id)->brand_image == 'branddefault.jpg') {
            Brand::findOrFail($request->brand_id)->Delete();
        }
        else {
        $delete_this = Brand::findOrFail($request->brand_id)->brand_image;
        unlink(base_path('public/uploads/ProductImages/brandImages/'.$delete_this));
        Brand::findOrFail($request->brand_id)->Delete();
        }        
        toast('Brand has been deleted ','warning');
        return redirect('brand');
    }
}

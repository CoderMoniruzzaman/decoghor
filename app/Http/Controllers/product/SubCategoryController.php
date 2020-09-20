<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Image;
use Carbon\Carbon;
use App\productmodel\SubCategory;
use App\productmodel\Category;
use Redirect,Response;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $subcategoreies = SubCategory::all();
        $categoreies = Category::orderBy('created_at', 'DESC')->get();
        return view('product/subcategory/index',compact('categoreies','subcategoreies'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([ 
            'sub_category_name' => 'required|unique:sub_categories,sub_category_name',
            'category_id' => 'required',
        ]);

        if($validator){
        $last_inserted_id = SubCategory::insertGetId([
            'sub_category_name' => $request->sub_category_name,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now()
        ]);

        if($request->hasFile('sub_category_image',)){
            $photo_to_upload = $request->sub_category_image;
            $filename = $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/SubCategoryImages/'.$filename));
            SubCategory::find($last_inserted_id)->update([
            'sub_category_image' => $filename,
            ]);
        }
        toast('Sub Category have been created succesfully ','success');
        }

        return redirect('subcategory');
    }

    // Status change SubCategory
    public function changestatus($id)
    {
        if (SubCategory::find($id)->sub_category_status) {
            SubCategory::findOrFail($id)->update([
                'sub_category_status' => 0,
          ]);
          toast('SubCategory Status Deactivated ','warning');
        }
        else {
            SubCategory::findOrFail($id)->update([
                'sub_category_status' => 1,
          ]);
          toast('SubCategory Status Activated ','success');
        }
        return redirect('subcategory');
    }

    public function update(Request $request)
    {
        if($request->hasFile('sub_category_image')){
            if (SubCategory::find($request->subcat_id)->sub_category_image == 'subcategorydefault.jpg') {
              $photo_to_upload = $request->sub_category_image;
              $filename = $request->subcat_id.".".$photo_to_upload->getClientOriginalExtension();
              Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/SubCategoryImages/'.$filename));
              SubCategory::find($request->subcat_id)->update([
                'sub_category_image' => $filename,
              ]);
            }
            else {
              $delete_this_file = SubCategory::find($request->subcat_id)->sub_category_image;
              unlink(base_path('public/uploads/ProductImages/SubCategoryImages/'.$delete_this_file));
              $photo_to_upload = $request->sub_category_image;
              $filename = $request->subcat_id.".".$photo_to_upload->getClientOriginalExtension();
              Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/SubCategoryImages/'.$filename));
              SubCategory::find($request->subcat_id)->update([
                'sub_category_image' => $filename,
              ]);
            }
          }
          SubCategory::find($request->subcat_id)->update([
            'sub_category_name' => $request->sub_category_name,
            'category_id' => $request->category_id,
          ]);
          toast('Category have been updated','info');
          return redirect('subcategory');
    }

    
    public function destroy(Request $request)
    {
        if ($delete_this = SubCategory::findOrFail($request->subcat_id)->sub_category_image == 'subcategorydefault.jpg') {
            SubCategory::findOrFail($request->subcat_id)->Delete();
        }
        else {
        $delete_this = SubCategory::findOrFail($request->subcat_id)->sub_category_image;
        unlink(base_path('public/uploads/ProductImages/SubCategoryImages/'.$delete_this));
        SubCategory::findOrFail($request->subcat_id)->Delete();
        }        
        toast('SubCategory has been deleted ','warning');
        return redirect('subcategory');
    }
}
